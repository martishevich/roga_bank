<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 12/10/18
 * Time: 11:15 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Account_card;
use App\Components\HelpAccountCard;

class PaymentController extends Controller
{
    public function paymentPage(Request $request)
    {
        return view('payment.paymentPage');
    }

    public function cardConfirmation(Request $request)
    {
        dump($_POST);
        if ($request->isMethod('post')) {
            $rules = [
                'card_number' => 'required|exists:account_cards',
                'CVV'  => 'required|exists:account_cards',
                'first_name'  => 'alpha_num|exists:account_cards',
                'last_name' =>'required|exists:account_cards'
            ];
            $this->validate($request, $rules);
        }
        $user_pass = Account_card::where('card_number', '=', $_POST['card_number'])->first();
        $request->session()->put('id_for_pass',  $user_pass->user_id);
        return view('payment.cardConfirmation');
    }
    public function passwordConfirmation(Request $request)
    {

        if($request->isMethod('post')){
            $rules = [
                'password_pay' => 'required',
            ];
            $this->validate($request, $rules);
            $user_id = $request->session()->get('id_for_pass');
            $user= User::find($user_id);
            if($user->password_pay==md5($_POST['password_pay'])){
                dump(HelpAccountCard::trimDate('2020-13-01'));
            }
        }

        return view('payment.cardConfirmation');
    }

}