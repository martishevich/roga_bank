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
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Admin;
use App\Login;
use App\Account_card;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Components\HelpAccountCard;
use App\Currency;

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

            $search = DB::table('logins')
                ->leftJoin('phone_users', 'logins.id', '=', 'phone_users.user_id')
                ->leftJoin('mail_users', 'logins.id', '=', 'mail_users.user_id')
                ->select('logins.login', 'logins.firstName', 'logins.lastName', 'logins.middleName', 'logins.numberPassport','logins.identificationNumber', 'phone_users.phone_number', 'mail_users.mail')
                ->where('logins.login', '=', $_POST['searchUser'])
                ->orWhere('logins.firstName', '=', $_POST['searchUser'])
                ->orWhere('phone_users.phone_number', '=', $_POST['searchUser'])
                ->orWhere('mail_users.mail', '=', $_POST['searchUser'])
                ->groupBy('logins.login')
            ->get();


        }

        $action = true;
        while ($action == true){
            $generate_card = HelpAccountCard::generationAccountCard();
            $card = Account_card::where('card_number', '=', $generate_card['card_number'])->first();
            if($card != null){
                dump('sdfasdfasdf');
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



            Login::addUser($_POST['login'],$_POST['password'],$_POST['lastName'] ,$_POST['firstName'],$_POST['middleName'],$_POST['numberPassport'],$_POST['identificationNumber'],$_POST['birthday']);
            $user = Login::where('numberPassport', '=', $_POST['numberPassport'])->first();
            Phone_user::addPhone($_POST['phone'],1 ,$user->id);
            Mail_user::addMail($_POST['mail'],1 ,$user->id);
            Account_card::addAccountCard($_POST['firstName'], $_POST['lastName'],$_POST['currency'], $user->id);
            return redirect()->action('AdminController@adminPage');
        }

        return view('admin.createUser');

    }

    public function show($login) {

        $myLogin = Login::where('login', '=', $login)->first();
        $user = Phone_user::where('user_id', '=', $myLogin->id)->first();
        $mail = Mail_user::where('user_id', '=', $myLogin->id)->first();

        return view('admin.actions.show', ['login' => $myLogin, 'user' => $user, 'mail' => $mail]);

    }

}
