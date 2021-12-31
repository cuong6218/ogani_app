<?php

namespace App\Rules;

use App\Http\Services\UserService;
use Illuminate\Contracts\Validation\Rule;

class EmailNotFound implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = $this->userService->getUserByEmail($value);
        if($user == null) return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute not found.';
    }
}
