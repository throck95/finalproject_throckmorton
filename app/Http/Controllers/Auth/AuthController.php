<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectPath = '/beverages';
    protected $loginPath = '/auth/login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|max:255',
            'mname' => 'max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin()
    {
        return view('beverages.login');
    }

    public function postLogin()
    {
        $rules = array('email' => 'required|email', 'password' => 'required|alphaNum|min:6');
        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails()) {
            return Redirect::to('/auth/login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else {
            $userdata = array('email'=>Input::get('email'),'password'=>Input::get('password'));
        }
        if(Auth::attempt($userdata)) {
            //return "Success";
            return redirect()->intended('/beverages');
        }
        else {
            //return "failed";
            return Redirect::to('/auth/login');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect($this->redirectPath());
    }

    public function getRegister() {
        return view('beverages.register');
    }

    public function postRegister() {
        $rules = array(
            'fname'=>'required',
            'lname'=>'required',
            'phone'=>'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|alphaNum|min:6');
        $validator = Validator::make(Input::all(),$rules);
        if ($validator->fails()) {
            return Redirect::to('/auth/register')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else {
            $userdata = array(
                'fname'=>Input::get('fname'),
                'mname'=>Input::get('mname'),
                'lname'=>Input::get('lname'),
                'phone'=>Input::get('phone'),
                'email'=>Input::get('email'),
                'password'=>Input::get('password')
            );
        }
        Auth::login($this->create(Input::all()));
        if(Auth::check()) {
            return redirect()->intended('/beverages');
        }
        else {
            return Redirect::to('/auth/register');
        }
    }
}
