<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class isDayOfWeek implements Rule
{
    protected $dayNumber;

    public function __construct($dayNumber)
    {
        $this->dayNumber = $dayNumber;
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
        $date = Carbon::parse($value);
        return $date->dayOfWeek == $this->dayNumber ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Podana data musi być czwartkiem';
    }
}
