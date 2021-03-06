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
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatementEmail;
use App\Jobs\SendEmail;
use Carbon\Carbon;

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
            $loginOk = User::where('login', '=', $request['login'])->first();

            if ($request['login'] == $loginOk->login && md5($request['password']) == $loginOk->password) {
                $request->session()->put('id', $loginOk->id);
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
        $sum = Transaction::countingAmount($loginOk->account_card['0']->card_number);

        if (User::getPassPay($id) == '') {
            $message = 'оплата невозможна';
        } else {
            $message = 'оплата осуществима';
        }

        if (isset($_POST['submit'])) {
            $request->session()->forget('id');
            return redirect()->action('UserController@login');
        }

        return view('users.userPage', compact('loginOk', 'value', 'message', 'sum'));
    }

    public function userUpdateData(Request $request)
    {
        $user = User::find(session('id'));
        $id = $request->session()->get('id');
        $sum = Transaction::countingAmount($user->account_card['0']->card_number);
        if ($request->isMethod('post')) {
            $rules = [
                'phone' => 'required|min:9',
                'mail' => 'required|email',
                'pass' => 'alpha_num'
            ];
            $this->validate($request, $rules);
            Phone_user::updateDataPhone($_POST['phone'], $id);
            Mail_user::updateDataMail($_POST['mail'], $id);
            if (isset($_POST['pass']) && $_POST['pass'] != '') {
                User::updatePay($id, $_POST['pass']);
            }
        }

        if (isset($_POST['exit'])) {
            $request->session()->forget('id');
            return redirect()->action('UserController@login');
        }
        return view('users.userUpdateData', compact('user', 'sum'));
    }

    public function transaction(Request $request)
    {

        $user = User::find(\session()->get('id'));
        $allTransaction = Transaction::transactionPagination($user->account_card['0']->card_number);
      
        $sum = Transaction::countingAmount($user->account_card['0']->card_number);
        if (isset($_POST['submit'])) {
            $request->session()->forget('id');
            return redirect()->action('UserController@login');
        }
        if (isset($_POST['statement'])) {

            dispatch(new SendEmail($user));
            return view('users.userTransaction',compact('allTransaction', 'sum'));
        }

        return view('users.userTransaction',compact('allTransaction', 'sum'));
    }


}

