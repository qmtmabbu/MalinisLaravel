<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function index()
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users['userType'] != 2) {
                return redirect("/");
            }

            $this->callApi($users['userID']);
            sleep(15);
            return view('loading', ['userID' => $users['userID']]);
        }
        return redirect("/");
    }

    private function callApi(string $id): void
    {
        $client = new Client();
        $response = $client->get('http://192.168.137.215:5000/detect?id=' . $id);

        // var_dump($response->getBody()->getContents());
    }
}
