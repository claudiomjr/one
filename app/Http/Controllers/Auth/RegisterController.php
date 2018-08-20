<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DateTime;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        return Validator::make($data, ['name'=>'required']);
       //  return Validator::make($data, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        //]);
    }

    /**
     * Register new account.
     *
     * @param Request $request
     * @return User
     */
    protected function register(Request $request)
    {
         $validatedData = $request->validate([
             'name'     => 'required|string|max:255',
             'email'    => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed',
         ]);
        try {

            $credentials['email']=$request->email;
            $credentials['password']=$request->password;
            $image = $request->file('document_path');
            $now = "one".str_replace(" ","",str_replace(":","",now()))."share".str_replace(".","",microtime(true)).".".$request->document_path->getClientOriginalExtension();
            $path_img = 'uploads/profile_images/'.$now;
            $request->document_path->storeAs('uploads/profile_images/', $now);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'document_path' => $path_img,
                'date_of_birth' => $request->date_of_birth,
                'active' => false,
            ]);
                if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
                    // The user is being remembered...
                    return redirect()->intended('/home');
                }else{
                    return redirect()->intended('/login');
                }
            }catch(Exception $e) {
                echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            return redirect()->intended('/login');
        }       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}