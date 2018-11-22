<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 11/22/18
 * Time: 2:38 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function loginAdmin(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'login' => 'required|max:30',
                'password' => 'required'
            ];

            $this->validate($request, $rules);
            $loginOk = Admin::where('login', '=', $_POST['login'])->first();
            $request->session()->put('id', $loginOk->id);
            //$hashedPassword = Hash::make( $_POST['password']);
            $hashedpassword = md5($_POST['password']);
            dump($hashedpassword);
            if ($_POST['login'] == $loginOk->login && $hashedpassword == $loginOk->password) {
                return redirect()->action('AdminController@adminPage');
            }

        }
        return view('admin.loginAdmin');
    }

    public function adminPage(Request $request)
    {
        $value = $request->session()->all();
        $loginOk = Admin::find($value['id']);
        return view('admin.adminPage', compact('loginOk', 'value'));
    }

}