<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 11/22/18
 * Time: 2:38 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserValidation;
use App\Phone_user;
use App\Mail_user;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Admin;
use App\Login;


use Illuminate\Support\Facades\Hash;

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

        dump($request->session());

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
        return view('admin.adminPage', compact('loginOk', 'value'));
    }


    public function createUser(Request $request)
    {
        if ($request->isMethod('post')){

           $validatedData = $request->validate([
                'login' => 'required',
                'password' => 'required|min:3',
                'lastName' => 'required',
                'firstName' => 'required',
                'middleName' => 'required',
                'numberPassport' => 'required|size:9',
                'identificationNumber' => 'required|size:14',
                'phone' => 'required|min:9|max:13',
                'mail' => 'required|email',
                'birthday' => 'required|date|after:01/01/1900|before:today'
          ]);

            Login::addUser($_POST['login'],$_POST['password'],$_POST['lastName'] ,$_POST['firstName'],$_POST['middleName'],$_POST['numberPassport'],$_POST['identificationNumber'],$_POST['birthday']);
            $numberpassport = Login::where('numberPassport', '=', $_POST['numberPassport'])->first();
            dump($numberpassport);
            Phone_user::addPhone($_POST['phone'],0 ,$numberpassport->id);
            Mail_user::addMail($_POST['mail'],0 ,$numberpassport->id);
        }
        return view('admin.createUser');
    }

}
