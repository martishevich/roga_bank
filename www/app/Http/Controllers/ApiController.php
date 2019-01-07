<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 1/7/19
 * Time: 3:59 PM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function apiForUser()
    {
        $user = User::find(\session()->get('id'));

        if(isset($_POST['key'])){


            if (Storage::exists('key.txt'))
            {
                Storage::delete('key.txt');
            }
            Storage::disk('local')->put('key.txt',$user->salt['0']->salt);
            $file= storage_path(). "/app/key.txt";
            return response()->download($file, 'key.txt');
        }
        return view('api.api');
    }
}