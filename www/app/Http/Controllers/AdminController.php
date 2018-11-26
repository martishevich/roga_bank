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
        $user = Phone_user::find(1);
        $mail = Mail_user::updateDataMail(2,'irina@gmail.com', 1,1);
        dump($mail);

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
        return view('admin.adminPage', compact('loginOk', 'value'));
    }

}