<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 12/14/18
 * Time: 11:25 AM
 */

namespace App\Http\Controllers;


use App\Components\AddUserHelper;
use App\ConfirmationCode;
use App\Mail\CardMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Transaction;


class TransferController extends Controller
{
    public function transferPage(Request $request)
    {
        $id = $request->session()->get('id');
        $user = User::find($id);
        $sum = Transaction::countingAmount($user->account_card['0']->card_number);
        return view('transfer.transferToTheAccount',compact('sum'));
    }

    public function transferPass(Request $request)
    {
        $id = $request->session()->get('id');
        $user = User::find($id);
        $sum = Transaction::countingAmount($user->account_card['0']->card_number);
        if ($request->isMethod('post')) {
            $rules = [
                'card_number' => 'required|min:16|max:16',
                'first_name'  => 'required|alpha',
                'last_name'   => 'required|alpha',
                'sum' => 'required'
            ];
            $this->validate($request, $rules);

            $sum = Transaction::countingAmount($user->account_card['0']->card_number);
            ConfirmationCode::addData($_POST, $id);
            $date = ConfirmationCode::Where('user_id', '=', $id)->first();
            $today = date("Y-m-d H:i:s", strtotime("- 3 minute", microtime(true)));
            $request->session()->put('card_number', $_POST['card_number']);
            if ($date->updated_at < $today) {
                ConfirmationCode::updateDataPhone(AddUserHelper::createCode(), $id);

                $code = ConfirmationCode::Where('user_id', '=', $id)->first();
                $objDemo = new \stdClass();
                $objDemo->first_name = $user->firstName;
                $objDemo->last_name = $user->lastName;
                $objDemo->code = $code->confirmation_code;

                Mail::to("karshak0609@yandex.ru")->send(new CardMail($objDemo));
            }
        }
        return view('transfer.transferPass',compact('sum'));
    }

    public function transferConfirm(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->session()->get('id');
            $code = ConfirmationCode::Where('user_id', '=', $id)->first();
            $user = User::find($id);
            if ($_POST['confirmation_code'] == $code->confirmation_code) {
                dd(Transaction::countingAmount($user->account_card['0']->card_number));
                $data =json_decode($code->data, true);
                Transaction::reducingSender($user->account_card['0']->card_number,$data, 'BYN');
                Transaction::addTransacton($user->account_card['0']->card_number,$data,'BYN','transfer');
                dump($data);
                $status = 'прошел успешно';
            } else {
                $status = 'не удался';
            }
        }
        return view('transfer.transferConfirm', compact('status'));
    }

}