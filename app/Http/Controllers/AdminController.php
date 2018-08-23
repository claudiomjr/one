<?php

namespace App\Http\Controllers;
use App\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterConfirmation;

use Illuminate\Support\Facades\Storage;

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

    public function getDocument($id){
    	$user = User::findOrFail($id);
    	if(Storage::exists($user->document_path)){
	    			$content= Storage::download($user->document_path);
	    			return $content;
    	}
    	return null;
    }
    public function email(){
    	try{
	    	$user = User::findOrFail(3);
	    	Mail::to($user->email)->send(new WelcomeMail($user));
	    	return "Mail sended to: ".$user->email;
    	}catch(Exception $e){
    		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    		return "Erro ao enviar.";
    	}
    }
}
