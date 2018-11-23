<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 11/22/18
 * Time: 2:38 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request)
    {

        if($request->isMethod('post'))
        {
            $rules=[
                'login' =>'required|max:10',
                'password' =>'required'
            ];
            $this->validate($request,$rules);
            $loginOk = Login::where('login','=',$_POST['login'] )->first();
            $request->session()->put('id', $loginOk->id);
            $hashedpassword = md5($_POST['password']);
            $_POST['password']=$hashedpassword;
            if($_POST['login']==$loginOk->login && $hashedpassword == $loginOk->password){

                return redirect()->action('UserController@userPage');
            }

        }

        return view('users.login');
    }

    public function userPage(Request $request)
    {
        $value = $request->session();
        $loginOk = Login::find(session('id'));
        return view('users.userPage',compact('loginOk','value'));
    }

}