<?php

namespace App\Http\Controllers;
use App\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterConfirmation;

class AdminController extends Controller
{
    public function index()
    {
		// and you are ready to go ...
		$users = User::all();	
		// $user = User::findOrFail(2);
		// Mail::to($user->email)->send(new WelcomeMail($user));
        return view('admin.index',compact('users'));
    }

  //   public function sendMail(){
	 //    	$data = array('name'=>"Sam Jose", "body" => "Test mail");

  //       	Mail::send('emails.user.register_confirmation', $data, function($message) {
		// 	$message->to('pamella.mayarac@gmail.com', 'Artisans Web')->subject('Artisans Web Testing Mail');
		// 	$message->from('luismiguel18br@gmail.com','luismiguel18br@gmail.com');
		// 	echo "Email sended";
		// });

  //   	// $email = 'pamella.mayarac@gmail.com';
  //   	// Mail::to($email)->send(new RegisterConfirmation($email));
  //   }
}
