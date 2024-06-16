<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Admin\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $guard = request()->routeIs('employee.*') ? 'employee' : 'web';
        $user = Auth::guard($guard)->user();

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                $guard === 'employee'
                    ? Rule::unique(Employee::class)->ignore($user->id, 'user_id')
                    : Rule::unique(User::class)->ignore($user->id),
            ],
        ];
    }
}
