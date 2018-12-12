<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 11/22/18
 * Time: 2:38 PM
 */

namespace App\Http\Controllers;

use App\Mail_user;
use App\Phone_user;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User_salt;
use App\Components\GenirateSalt;

class UserController extends Controller
{
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {
            $rules = [
                'login' => 'required|max:10|exists:users',
                'password' => 'required'
            ];
            $this->validate($request, $rules);
            $loginOk = User::where('login', '=', $_POST['login'])->first();
            $request->session()->put('id', $loginOk->id);

            if ($_POST['login'] == $loginOk->login && md5($_POST['password'])== $loginOk->password) {
                return redirect()->action('UserController@userPage');
            }
        }
        return view('users.login');
    }

    public function userPage(Request $request)
    {
        $value = $request->session();
        $loginOk = User::find(session('id'));
        $id = $request->session()->get('id');

        if(User::getPassPay($id)=='NULL'){
            $message ='оплата невозможна';
        }
        else{
            $message ='оплата осуществима';
        }

        if (isset($_POST['submit'])) {
            $request->session()->forget('id');
            return redirect()->action('UserController@login');
        }

        return view('users.userPage', compact('loginOk', 'value' ,'message'));
    }

    public function userUpdateData(Request $request)
    {
        $value = $request->session();
        $user = User::find(session('id'));
        $id = $request->session()->get('id');

        if ($request->isMethod('post')) {
            $rules = [
                'phone' => 'required|min:9',
                'mail' => 'required|email',
                'pass' => 'alpha_num'
            ];
            $this->validate($request, $rules);
            Phone_user::updateDataPhone($_POST['phone'], $id);
            Mail_user::updateDataMail($_POST['mail'], $id);
            if(isset($_POST['pass'])&&$_POST['pass']!=''){
                User::updatePay($id, $_POST['pass']);
            }

        }

        if (isset($_POST['submit'])) {
            $request->session()->forget('id');
            return redirect()->action('UserController@login');
        }
        return view('users.userUpdateData',compact('user'));
    }

}