<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    public static function addTransacton($sender_account, $data_recipient_number, $data_recipient_sum, $currency, $comment = '')
    {
        $transaction = new Transaction;
        $transaction->sender_account = $sender_account;
        $transaction->beneficiary_account = $data_recipient_number;
        $transaction->sum = $data_recipient_sum;
        $transaction->currency = $currency;
        $transaction->comment = $comment;
        $transaction->save();
    }

    public static function reducingSender($sender_account, $data_recipient, $currency, $comment = '')
    {
        $transaction = new Transaction;
        $transaction->sender_account = $sender_account;
        $transaction->beneficiary_account = $sender_account;
        $transaction->sum = '-' . $data_recipient;
        $transaction->currency = $currency;
        $transaction->comment = $comment;
        $transaction->save();
    }

    public static function countingAmount($account)
    {
        $search = DB::table('transactions')
            ->select(DB::raw('SUM(sum) as sum'))
            ->groupBy('beneficiary_account')
            ->having('beneficiary_account', '=', $account)
            ->get();
        if (isset($search)) {
            return $search ;
        } else {
            return $search = 0;
        }

    }

    public static function transaction($card_number)
    {
        return Transaction::where('beneficiary_account', '=', $card_number)
            ->paginate(15);
    }

}