<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateDecissionGenerateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $atas=date('Y')+1;
        //harus dibawah tahun ini +1, dan diatas tahun ini 01-01
        return $value < $atas."-01-01" && $value >= date('Y')."-01-01";
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Error, harus tahun ini';
    }
}
