<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
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
            if ($fromLoading) {
                $query = DB::table('detections')->where('userID', '=', $userID)->get();
                $data = json_decode($query, true);
                if (count($data) <= 0) {
                    session()->put('noDetections', true);
                } else {
                    return view('user.detections', ['detections' => $data, 'userid' => $userID]);
                }
            }



            return view('user.detections');
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

    private function callApi(string $id, string $imagePath): void
    {
        $client = new Client();
        $response = $client->post('http://localhost:5000/detect', [
            'multipart' => [
                [
                    'name' => 'id',
                    'contents' => $id
                ],
                [
                    'name' => 'image_url',
                    'contents' => $imagePath
                ],
                [
                    'name' => 'storagePath',
                    'contents' => $_SERVER['DOCUMENT_ROOT'] . "/public" . '/storage/results'
                ]
            ]
        ]);

        // var_dump($response->getBody()->getContents());
    }
}
