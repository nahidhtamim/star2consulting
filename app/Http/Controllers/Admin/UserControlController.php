<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserControlController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find(Auth::user()->id);

        // Check if the entered current password matches the stored password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with(['warning' => 'The current password is incorrect.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->update();

        // You can also add a success message if needed
        // session()->flash('success', 'Password updated successfully.');

        return redirect()->back()->with('status', 'Password Updated Successfully'); // Redirect back to the form or any other route
    }
}
