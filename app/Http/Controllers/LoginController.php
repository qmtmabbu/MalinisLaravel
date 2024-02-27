<?php

namespace App\Http\Controllers;

use App\Models\SystemUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (isset($request->btnLogin)) {
            $email = $request->email;
            $password = $request->password;


            $queryResults = DB::table('system_users')->where('email', '=', $email)->get();
            $data = json_decode($queryResults, true);
            $isFound = false;
            $users = array();
            foreach ($data as $d) {
                if (password_verify($password, $d['password'])) {
                    $users = $d;
                    $isFound = true;
                    break;
                }
            }

            if ($isFound) {
                session()->put("successLogin", true);
                session()->put("users", $users);
                return redirect("/user_dashboard");
            } else {
                session()->put("errorLogin", true);
            }
        }
        return redirect("/");
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

    public function signup(Request $request)
    {
        if (isset($request->btnSignup)) {
            $queryResults = DB::table('system_users')->where('email', '=', $request->email)->get();
            $data = json_decode($queryResults, true);
            if (count($data) > 0) {
                session()->put("errorCreateExist", true);
            } else {
                $password = $request->password;
                $confirmPass = $request->confirmPass;
                if ($password == $confirmPass) {
                    $user = new SystemUsers();
                    $user->firstName = $request->firstName;
                    $user->middleName = $request->middleName;
                    $user->lastName = $request->lastName;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->registeredDate = date('Y-m-d', strtotime(now()));
                    $user->userType = 2;
                    $isSave = $user->save();
                    if ($isSave) {
                        session()->put("successCreate", true);
                    } else {
                        session()->put("errorCreate", true);
                    }
                } else {
                    session()->put("errorPassNotMatch", true);
                }
            }
        }
        return redirect("/");
    }

    public function signout()
    {
        session()->flush();
        session()->put("successLogout", true);
        return redirect('/');
    }
}
