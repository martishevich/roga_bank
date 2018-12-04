<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 11/22/18
 * Time: 2:38 PM
 */

namespace App\Http\Controllers;

use App\Phone_user;
use App\Mail_user;
use App\Status_user;
use App\Status_card;
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

class AdminController extends Controller
{

    public function loginAdmin(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'login' => 'required|max:30',
                'password' => 'required|exists:admins'
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

            $search = DB::table('users')
                ->leftJoin('phone_users', 'users.id', '=', 'phone_users.user_id')
                ->leftJoin('mail_users', 'users.id', '=', 'mail_users.user_id')
                ->select('users.id','users.login', 'users.firstName', 'users.lastName', 'users.middleName', 'users.numberPassport','users.identificationNumber', 'phone_users.phone_number', 'mail_users.mail')
                ->where('users.login', '=', $_POST['searchUser'])
                ->orWhere('users.firstName', '=', $_POST['searchUser'])
                ->orWhere('phone_users.phone_number', '=', $_POST['searchUser'])
                ->orWhere('mail_users.mail', '=', $_POST['searchUser'])
                ->groupBy('users.login')
            ->get();


        }

        $action = true;
        while ($action == true){
            $generate_card = HelpAccountCard::generationAccountCard();
            $card = Account_card::where('card_number', '=', $generate_card['card_number'])->first();
            if($card != null){
                $generate_card = HelpAccountCard::generationAccountCard();
                $action =false;
            }
            $action =false;
        }


        return view('admin.adminPage', compact('loginOk', 'value', 'search'));
    }


    public function createUser(Request $request)
    {

        if ($request->isMethod('post')){

           $validatedData = $request->validate([
               'login' => 'required',
               'password' => 'required|min:8',
               'lastName' => 'required',
               'firstName' => 'required',
               'middleName' => 'required',
               'numberPassport' => ['required', 'regex:/^[А-Я]{2}[0-9]{7}/u'],
               'identificationNumber' => 'required|size:14',
               'phone' => 'required|digits_between:9,12',
               'mail' => 'required|email',
               'birthday' => 'required|date|after:01/01/1900|before:today'
          ]);



            User::addUser($_POST['login'],$_POST['password'],$_POST['lastName'] ,$_POST['firstName'],$_POST['middleName'],$_POST['numberPassport'],$_POST['identificationNumber'],$_POST['birthday']);
            $user = User::where('numberPassport', '=', $_POST['numberPassport'])->first();
            Phone_user::addPhone($_POST['phone'],1 ,$user->id);
            Mail_user::addMail($_POST['mail'],1 ,$user->id);
            Account_card::addAccountCard($_POST['firstName'], $_POST['lastName'],$_POST['currency'], $user->id);
            User_status::addUserStatus($user->id, 2,'user tratment');
            User_status::addUserStatus($user->id, 1,'user registred');
            Card_status::addCardStatus($user->id,1,'card make');
            Card_status::addCardStatus($user->id,2,'maked');
            return redirect()->action('AdminController@adminPage');
        }

        return view('admin.createUser');

    }

    public function show($id) {

        $myLogin = User::where('id', '=', $id)->first();
        $user = Phone_user::where('user_id', '=', $myLogin->id)->first();
        $mail = Mail_user::where('user_id', '=', $myLogin->id)->first();
        $card = Account_card::where('user_id', '=', $myLogin->id)->first();
        $user_status = User::find(1)->userStatus->last();
        $user_status = Status_user::where('id', '=', $user_status->status_id)->first();
        $card_status = User::find(1)->cardStatus->last();
        $card_status = Status_card::where('id', '=', $card_status->status_id)->first();
        if(isset($_POST['block'])){
            Card_status::addCardStatus($myLogin->id,7,'blocked');
            unset($_POST['block']);
            return redirect('adminPage/'.$myLogin->id.'/show');
        }
        if(isset($_POST['unlock'])){
            Card_status::addCardStatus($myLogin->id,2,'unlock');
            unset($_POST['unlock']);
            return redirect('adminPage/'.$myLogin->id.'/show');
        }
        return view('admin.actions.show', ['login' => $myLogin, 'user' => $user, 'mail' => $mail, 'card'=> $card, 'user_status' => $user_status, 'card_status' => $card_status]);

    }

}
