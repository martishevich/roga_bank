<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 11/22/18
 * Time: 2:38 PM
 */

namespace App\Http\Controllers;

use App\Components\AddUserHelper;
use App\Phone_user;
use App\Mail_user;
use App\Status_user;
use App\Status_card;
use App\Transaction;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Account_card;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Components\HelpAccountCard;
use App\Currency;
use App\User_status;
use App\Card_status;
use App\Http\Requests\StoreCreatePost;
use App\User_salt;
use App\ConfirmationCode;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function loginAdmin(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'login' => 'required|max:30|exists:admins',
                'password' => 'required '
            ];
            $this->validate($request, $rules);
            $loginOk = Admin::where('login', '=', $_POST['login'])->first();
            $request->session()->put('idAdmin', $loginOk->id);
            if ($_POST['login'] == $loginOk->login && $_POST['password'] == $loginOk->password) {
                return redirect()->action('AdminController@adminPage');
            }
        }
        return view('admin.loginAdmin');
    }

    public function adminPage(Request $request)
    {
        $value = $request->session()->all();
        $loginOk = Admin::find($value['idAdmin']);
        if (isset($_POST['submit'])) {
            $request->session()->forget('idAdmin');
            return redirect()->action('AdminController@loginAdmin');
        }

        if (isset($_POST['create'])) {
            return redirect()->action('AdminController@createUser');
        }
        if (isset($_POST['search'])) {
            $search = User::search();
        }

        return view('admin.adminPage', compact('loginOk', 'value', 'search'));
    }

    public function createUser(StoreCreatePost $request)
    {
        if ($request->isMethod('post')) {

            $fields = Input::get('result');
            if ($fields == 'citizen') {
                $rules = $request->validate([
                    'login' => 'required',
                    'lastName' => 'required|alpha',
                    'firstName' => 'required|alpha',
                    'middleName' => 'present',
                    'numberPassport' => ['required', 'regex:/^[А-Я]{2}[0-9]{7}/u'],
                    'identificationNumber' => 'required|size:14',
                    'phone' => 'required|min:9',
                    'mail' => 'required|email',
                    'birthday' => 'required|date|after:1910/01/01|before:' . date("Y-m-d", strtotime("-18 year", microtime(true)))
                ]);
            } else {
                $rules = $request->validate([
                    'login' => 'required',
                    'lastName' => 'required|alpha',
                    'firstName' => 'required|alpha',
                    'middleName' => 'present',
                    'numberPassport' => 'required',
                    'identificationNumber' => 'required',
                    'phone' => 'required|min:9',
                    'mail' => 'required|email',
                    'birthday' => 'required|date|after:1910/01/01|before:' . date("Y-m-d", strtotime("-18 year", microtime(true)))
                ]);
            }


            User::addUser($_POST);
            $user = User::latest()->first();
            Phone_user::addPhone($_POST['phone'], 1, $user->id);
            Mail_user::addMail($_POST['mail'], 1, $user->id);
            Account_card::addAccountCard($_POST['firstName'], $_POST['lastName'], $_POST['currency'], $user->id);
            ConfirmationCode::addCode(AddUserHelper::createCode(), $user->id);
            User_status::addUserStatus($user->id, 2, 'user tratment');
            User_status::addUserStatus($user->id, 1, 'user registred');
            Card_status::addCardStatus($user->id, 1, 'card make');
            Card_status::addCardStatus($user->id, 2, 'maked');
            User_salt::addSalt($user->id);

            $objDemo = new \stdClass();
            $objDemo->password = User::$pass;
            $objDemo->first_name = $user->firstName;
            Mail::to($user->mail['0']->mail)->send(new UserRegistered($objDemo));

            return redirect()->action('AdminController@adminPage');

        }
        return view('admin.createUser');
    }

    public function showCreateUser(Request $request)
    {
        return view('admin.createUser');
    }

    public function show($id)
    {
        $user = User::find($id);
        if (isset($_POST['block'])) {
            Card_status::addCardStatus($user->id, 7, 'blocked');
            unset($_POST['block']);
            return redirect('adminPage/' . $user->id . '/show');
        }
        if (isset($_POST['unlock'])) {
            Card_status::addCardStatus($user->id, 2, 'unlock');
            unset($_POST['unlock']);
            return redirect('adminPage/' . $user->id . '/show');
        }
        if (isset($_POST['block_users'])) {
            User_status::addUserStatus($user->id, 5, 'blocked');
            unset($_POST['block_users']);
            return redirect('adminPage/' . $user->id . '/show');
        }
        if (isset($_POST['unlock_users'])) {
            User_status::addUserStatus($user->id, 1, 'unlock');
            unset($_POST['unlock_users']);
            return redirect('adminPage/' . $user->id . '/show');
        }
        return view('admin.actions.show', ['user' => $user]);
    }

    public function softDelete($id)
    {
        $user = User::find($id)->delete();
        return redirect()->action('AdminController@adminPage', ['user' => $user]);
    }

    public function edit(Request $request, $id)
    {

        $myUser = User::find($id);
        if ($request->isMethod('post')) {

            $rules = $request->validate([
                'login' => 'required',
                'lastName' => 'required|alpha',
                'firstName' => 'required|alpha',
                'middleName' => 'present',
                'numberPassport' => ['required', 'regex:/^[А-Я]{2}[0-9]{7}/u'],
                'identificationNumber' => 'required|size:14',
                'phone' => 'required|min:9',
                'mail' => 'required|email',
                'birthday' => 'required|date|after:1910/01/01|before:' . date("Y-m-d", strtotime("-18 year", microtime(true)))
            ]);

            User::updateUser($id, $_POST);
            Phone_user::updateDataPhone($_POST['phone'], $id);
            Mail_user::updateDataMail($_POST['mail'], $id);
            return redirect()->action('AdminController@adminPage');

        }
        return view('admin.actions.edit', ['user' => $myUser]);
    }

    public function refill(Request $request, $id)
    {
        $myUser = User::find($id);
        $comment = '';
        if ($request->isMethod('post')) {
            $rules = $request->validate([
                'refill' => 'required',
            ]);
            Transaction::addTransacton($myUser->account_card['0']->card_number, $myUser->account_card['0']->card_number, $_POST['refill'], 'BYN');
            $comment = 'оплата прошла успешно';
        }
        return view('admin.actions.refill', ['user' => $myUser, 'comment' => $comment]);
    }


}
