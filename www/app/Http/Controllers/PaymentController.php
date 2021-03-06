<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 12/10/18
 * Time: 11:15 AM
 */

namespace App\Http\Controllers;


use App\Account_card;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PaymentController extends Controller
{
    public function customer()
    {
        return view('payment.customer');
    }

    public function paymentPage(Request $request)
    {
        return view('payment.paymentPage');
    }

    public function cardConfirmation(Request $request)
    {
        $message = '';
        if ($request->isMethod('post')) {
            $rules = [
                'card_number' => 'required|exists:account_cards|alpha_num',
                'CVV' => 'required|exists:account_cards',
                'first_name' => 'required|exists:account_cards',
                'last_name' => 'required|exists:account_cards'
            ];
            $this->validate($request, $rules);
        }
        $user_pass = Account_card::where('card_number', '=', $_POST['card_number'])
            ->where('CVV', '=', $_POST['CVV'])
            ->where('first_name', '=', $_POST['first_name'])
            ->where('last_name', '=', $_POST['last_name'])
            ->first();
        if ($user_pass != null) {
            $request->session()->put('id_for_pass', $user_pass->user_id);
        }
        return view('payment.cardConfirmation', compact('message'));
    }

    public function passwordConfirmation(Request $request)
    {
        $message = '';
        if ($request->isMethod('post')) {
            $rules = [
                'password_pay' => 'required',
            ];
            $this->validate($request, $rules);
            $user_id = $request->session()->get('id_for_pass');
            $recipient = Account_card::where('card_number', '=', $_GET['card_number'])->first();

            $user = User::find($user_id);
            $sum = Transaction::countingAmount($user->account_card['0']->card_number);
            if ($user->password_pay == md5($_POST['password_pay'])) {
                $encryption = md5($_GET['card_number'] . $_GET['total'] . $_GET['comment'] . $user->salt['0']->salt);
                dump($user->salt['0']->salt);
                dd($encryption);
                if ($encryption == $_GET['salt'] && $sum['0']->sum > $_GET['total']) {
                    Transaction::reducingSender($user->account_card['0']->card_number, $_GET['total'], 'BYN');
                    Transaction::addTransacton($user->account_card['0']->card_number, $_GET['card_number'], $_GET['total'], 'BYN', 'payment');
                    $apiResponse = new ApiController();
                    $apiResponse->testAnswer();
                    return redirect('/customer?status=ok');
                } else {
                    return redirect('/customer?status=false');
                }
            } else {
                $message = 'пароль для онлайн оплаты неверен';
            }
        }

        return view('payment.cardConfirmation', compact('message'));
    }


}
