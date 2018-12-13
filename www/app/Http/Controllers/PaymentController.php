<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 12/10/18
 * Time: 11:15 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentPage(Request $request)
    {
        if ($request->isMethod('post')) {
            dump($_POST);
        }
        return view('payment.paymentPage');
    }

}