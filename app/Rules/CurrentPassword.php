<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Auth;
use Illuminate\Support\Facades\Hash;

class CurrentPassword implements ValidationRule
{
    protected $guard;

    public function __construct($guard = 'web')
    {
        $this->guard = $guard;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = Auth::guard($this->guard)->user();
        if($user){
            if (!Hash::check($value, $user->password)) {
                $fail(__('The current password is incorrect.'));
            }
        }else{
            $fail(__('Authenticated user no found.'));
        }

    }
}
