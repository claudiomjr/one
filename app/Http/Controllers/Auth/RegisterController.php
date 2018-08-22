<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\WelcomeMail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


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

    private $countries;
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
    // protected function validator(array $data)
    // {   
    //     //return Validator::make($data, ['name'=>'required']);
    //     return Validator::make($data, [
    //         'fullname'     => 'required|string|max:255',
    //         'email'    => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'document_path' => 'mimes:jpeg,png,bmp,tiff,pdf |max:4096',
    //     ],messages());
    // }
    // public function messages()
    //     {
    //         return [
    //             'document_path.mimes' => 'Format not supported',
    //             'document_path.required'  => 'The input is required',
    //             'document_path.max'  => 'Max size is 4mb',
    //         ];
    // }
    /**
     * Register new account.
     *
     * @param Request $request
     * @return User
     *Usado paara o registro e geração do token.
     *Apos o registro o usuário é deslogado pela função
     *registered que está neste Controller
     */
    protected function register(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->countries  = new CountryController();
            $countries = $this->countries->show();
            return view('auth/register',compact('countries'));
        }
        $validatedData = $request->validate([
            'fullname'     => 'required|string|max:255|min:5',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'document_path' => 'mimes:jpeg,png,bmp,tiff,pdf|max:1096',
        ]);

        try {

            $credentials['email']=$request->email;
            $credentials['password']=$request->password;
            $image = $request->file('document_path');
            $path_img = '';
           // dd($s);
            $user = User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'document_path' => $path_img,
                'date_of_birth' => $request->date_of_birth,
                'country_id' => $request->country_id,
                'active' => false,
                'user_status_id' => 1,//Submitted
                'token'=>str_random(40),
            ]);
            //$directory = 'public/uploads/photos/id/'.$user->id;
            $directory = 'photos/id/'.$user->id;
            $imageName = str_random(10).".".$image->getClientOriginalExtension();

            Storage::putFileAs($directory, $image,$imageName);

           // $path_img = $image->move($directory, $imageName);
            User::where('id', $user->id)
                ->update(['document_path' => $directory."/".$imageName]);

            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
                    //$user = User::findById('');
                    Mail::to($credentials['email'])->send(new WelcomeMail($user));
                    Auth()->logout();
                    return redirect()->route('login')->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
                    //return redirect()->route('customer.index',compact('user'));
                }else{
                    return redirect()->route('login');
                }
            }catch(Exception $e) {
                echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            return redirect()->route('login');
        }       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function verifyUser($token)
    {
        $verifyUser = User::where('token', $token)->first();
        if(isset($verifyUser) ){

            if(!$verifyUser->active) {
                $verifyUser->active = true;
                $verifyUser->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
           // dd($status);
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
 
        return redirect('/login')->with('status', $status);
    }
    //Usada assim que o usuário é registrado
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }
}
