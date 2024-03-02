<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users['userType'] != 2) {
                return redirect("/");
            }

            $userID = $users['userID'];

            $fromLoading = $request->query('fromLoading');
            $query = DB::table('detections')->where('userID', '=', $userID)->get();
            $data = json_decode($query, true);
            if ($fromLoading) {

                if (count($data) <= 0) {
                    session()->put('noDetections', true);
                }
            }



            return view('user.detections', ['detections' => count($data) > 0 ? $data : [], 'userid' => $userID]);
        }
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function disconnectFromNetwork(Request $request)
    {

        if (session()->exists("users")) {
            $users = session()->pull("users");
            session()->put("users", $users);

            if ($users['userType'] != 2) {
                return redirect("/");
            }
            
            
            $path = $request->path;
            $id = $request->id;

            $response = $this->callApi($path);
            if ($response != 500) {
                $updateCount = DB::table('detections')->where('detectionID', '=', $id)->update(['status' => 'deleted']);
                session()->put("successQuarantine", true);
            } else {
                session()->put("errorQuarantine", true);
            }


            return redirect("/detections");
        }
        return redirect("/");
    }

    private function callApi(string $filePath)
    {
        try {
            $client = new Client();
            $response = $client->get('http://10.0.2.15:5000/delete_file/' . $filePath);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            error_log('API Response Status Code: ' . $statusCode);
            error_log('API Response Body: ' . $body);
            return $statusCode;
        } catch (RequestException $e) {
            // Handle request exceptions (e.g., connection errors, timeouts)
            error_log('API Request Exception: ' . $e->getMessage());
            return 500;
        }
    }
}
