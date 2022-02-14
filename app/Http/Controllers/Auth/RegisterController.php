<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'alpha', 'max:25'],
            'middleName' => ['nullable', 'alpha', 'max:25', 'min:0'],
            'lastName' => ['required', 'string', 'alpha', 'max:25'],
            'gender' => ['required'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8', 'regex:/.*[0-9].*/'],
            'picture' => ['required', 'image']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $fileNameWithExt = $data['picture']->getClientOriginalName();
        $fileNameOnly = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $data['picture']->getClientOriginalExtension();
        $storedFile = $fileNameOnly.'_'.time().'.'.$ext;
        $path = $data['picture']->storeAs('public/images', $storedFile);

        return Account::create([
            'first_name' => $data['firstName'],
            'middle_name' => $data['middleName'],
            'last_name' => $data['lastName'],
            'gender_id' => $data['gender'],
            'email' => $data['email'],
            'role_id' => $data['role'],
            'display_picture_link' => '/storage/images/'.$storedFile,
            'password' => Hash::make($data['password']),
            'delete_flag' => 0
        ]);
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view("auth.register", compact("roles"));
    }
}
