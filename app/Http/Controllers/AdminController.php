<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Account;

class AdminController extends Controller
{
    public function maintenance()
    {
        $accounts = Account::where('id', '!=', Auth::id())->get();
        return view('account-maintenance')->with('accounts', $accounts);
    }

    public function showRole($id)
    {
        $account = Account::find($id);
        $roles = Role::all();
        return view('update-role')->with('account', $account)->with('roles', $roles);
    }

    public function updateRole(Request $request, $id)
    {
        $account = Account::find($id);
        $account->role_id = $request->role;
        $account->save();

        $accounts = Account::where('id', '!=', Auth::id())->get();
        return redirect('account-maintenance')
            ->with('accounts', $accounts)
            ->with('success', 'Update role success!');
    }

    public function deleteAccount($id)
    {
        $account = Account::find($id);
        $account->delete();

        $accounts = Account::where('id', '!=', Auth::id())->get();
        return redirect('account-maintenance')
            ->with('accounts', $accounts)
            ->with('success', 'Delete account success!');
    }
}
