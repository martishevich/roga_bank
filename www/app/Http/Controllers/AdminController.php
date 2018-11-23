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
                'password' => 'required|exists:admins'
            ];

            $this->validate($request, $rules);
            $loginOk = Admin::where('login', '=', $_POST['login'])->first();
            $request->session()->put('id', $loginOk->id);
            if ($_POST['login'] == $loginOk->login && $_POST['password'] == $loginOk->password) {
                return redirect()->action('AdminController@adminPage');
            }

        }
        dump($request);
        return view('admin.loginAdmin');
    }

    public function adminPage(Request $request)
    {
        dump($request);
        $value = $request->session()->all();
        $loginOk = Admin::find($value['id']);
        if(isset($_POST['submit']))
        {
            $request->session()->forget('id');
            return redirect()->action('AdminController@loginAdmin');
        }
        return view('admin.adminPage', compact('loginOk', 'value'));
    }

}