<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Admin\Employee;
use App\Models\Admin\Customer;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        if ($request->routeIs('employee.*')) {
            $user = Auth::guard('employee')->user()->user;
            return view('employee.profile', [
                'user' => $user,
            ]);
        }

        $user = $request->user();
        return view('user.profile', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $guard = $request->routeIs('employee.*') ? 'employee' : 'web';

        $user = Auth::guard($guard)->user();

        if (!$user) {
            return back()->withErrors(['user' => 'Authenticated user not found.']);
        }

       $validatedData = $request->validated();


        if($guard == 'employee') {
            $user->nama = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->save();

            User::find($user->user_id)->update([
                'email' => $user->email,
                'name' => $user->nama,
            ]);
        } elseif($guard == 'web') {
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            if ($user->hasRole('customer') && $user->isDirty('email')) {
                $user->email_verified_at = null;
            }
            $user->save();

            if ($user->hasRole('customer')) {
                Customer::where('user_id', $user->id)->update([
                    'nama' => $user->name,
                ]);
            }
            if ($user->hasRole('employee')){
                Employee::where('user_id', $user->id)->update([
                    'email' => $user->email,
                    'nama' => $user->name,
                ]);
            }
        }

        if($guard == 'employee'){
             return Redirect::route('employee.profile.edit')->with('status', 'profile-updated');
        }
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
