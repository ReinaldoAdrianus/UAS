<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function profile()
    {
        $account = Account::find(Auth::id());
        $roles = Role::all();
        return view('profile')->with('account', $account)->with('roles', $roles);
    }

    public function updateProfile(Request $request)
    {
        $account = Account::find(Auth::id());
        if ($request->email == $account->email) {
            $validations = ['required', 'string', 'email', 'max:255'];
        }
        else {
            $validations = ['required', 'string', 'email', 'max:255', 'unique:accounts'];
        }
        $this->validate($request, [
            'firstName' => ['required', 'string', 'alpha', 'max:25'],
            'middleName' => ['nullable', 'alpha', 'max:25', 'min:0'],
            'lastName' => ['required', 'string', 'alpha', 'max:25'],
            'gender' => ['required'],
            'email' => $validations,
            'password' => ['required', 'string', 'min:8', 'regex:/.*[0-9].*/'],
            'picture' => ['required', 'image']
        ]);

        $fileNameWithExt = $request['picture']->getClientOriginalName();
        $fileNameOnly = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request['picture']->getClientOriginalExtension();
        $storedFile = $fileNameOnly.'_'.time().'.'.$ext;
        $path = $request['picture']->storeAs('public/images', $storedFile);
        
        $account->first_name = $request->firstName;
        $account->middle_name = $request->middleName;
        $account->last_name = $request->lastName;
        $account->email = $request->email;
        $account->gender_id = $request->gender;
        $account->password = Hash::make($request->password);
        $account->display_picture_link = '/storage/images/'.$storedFile;
        $account->save();

        return redirect()->route('success')->with('message', 'Saved!');
    }
}
