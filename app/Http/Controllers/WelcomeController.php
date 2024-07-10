<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view("frontend/home");
    }
    public function sendOPTon(Request $request){
        
        if ($request->ajax()) {
            $email = $request->input("emailforgotpass");

            $randomNumber = rand(100000, 999999);
            echo $randomNumber;
            

            // $to = $email;
            // $subject = "OTP Verification";
            // $message = "Hello, ". $randomNumber ." is One Time Password!";
            // $headers = "From: sender@example.com";

            // // Send email
            // if (mail($to, $subject, $message, $headers)) {
            //     echo "Email sent successfully!";
            // } else {
            //     echo "Email sending failed.";
            // }
            
            return response()->json(['message' => 'Data received successfully', 'data' => $randomNumber]);
        } else {

        }
    }
}
