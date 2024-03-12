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

            $uuid = $this->callApi($users['userID']);
            // $uuid = "Fc49zv";
            // sleep(15);
            return view('user.loading', ['userID' => $users['userID'], 'uuid' => $uuid]);
        }
        return redirect("/");
    }

    private function callApi(string $id): string
    {
        $client = new Client();
        $uuid = "";
        $response = $client->get('http://10.0.2.15:5000/detect?id=' . $id);
        if ($response->getStatusCode() == 200) {
            $result = json_decode($response->getBody()->getContents(), true);
            $uuid = $result['uuid'];
        } else {
            $uuid = "";
        }
        return  $uuid;
    }
}
