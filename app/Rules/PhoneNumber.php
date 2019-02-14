<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    private $message = 'The :attribute must be phone number.';

    public function __construct($message = null)
    {
        if ($message) {
            $this->message = $message;
        }
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
        return preg_match('%^\+?(?!(?:.*-){3})(?!.*--)(?=[^()]*\([^()]+\)[^()]*$|[^()]*$)(?!.*-.*[()])(?:[()-]*[\s\d]){6,}[()-]*$%i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
