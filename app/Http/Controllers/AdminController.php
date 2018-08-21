<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function index()
    {
		// configure with favored image driver (gd by default)
		Image::configure(array('driver' => 'imagick'));

		// and you are ready to go ...
    	$users = User::all();
		$image = Image::make('public/foo.jpg')->resize(300, 200);
        return view('admin.index',compact('users'));
    }
}
