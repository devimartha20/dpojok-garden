<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Auth;
use App\Rules\CurrentPassword;
use App\Models\Admin\Employee;
use Illuminate\Support\Facades\Redirect;


class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $guard = $request->routeIs('employee.*') ? 'employee' : 'web';


        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', new CurrentPassword($guard)],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user = $request->user();

        if ($guard == 'employee') {
            $user = Auth::guard('employee')->user();
            Employee::find($user->id)->update([
                'password' => Hash::make($validated['password']),
            ]);
        }else{
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }

        if($guard == 'employee'){
            return Redirect::route('employee.profile.edit')->with('status', 'profile-updated');
       }
       return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
