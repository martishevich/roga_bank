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
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function apiForUser()
    {
        $user = User::find(\session()->get('id'));

        if (isset($_POST['key'])) {


            if (Storage::exists('key.txt')) {
                Storage::delete('key.txt');
            }
            Storage::disk('local')->put('key.txt', $user->salt['0']->salt);
            $file = storage_path() . "/app/key.txt";
            return response()->download($file, 'key.txt');
        }
        return view('api.api');
    }

    public function test()
    {
        dd($_POST);
        // return view('api.testApi');
    }

    public function testAnswer()
    {
        $client = new Client(['base_url' => 'http://localhost']);
        $data = [
            'form_params' => [
                'name' => 'Slavik',
                'tag' => 'tapok'
            ]
        ];
        $responce = $client->request('POST',
            'http://localhost/testApi',
            $data);
        echo $responce->getBody();
        dd(md5(4485731970138059 . 100 . 'разработка проекта' . '09149834390846460856172162001570881398513475555358184681331525587262903637850332394352603065471211014033534572634335550383088924'));
        /*  return view('api.testAnswer');*/
    }

}
