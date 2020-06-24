<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
{
    protected $country;
    const COUNTRY_CODES = [
        'ID' => '+62',
        'SG' => '+65',
        'MY' => '+60'
    ];
    
    public function __construct($country = 'ID')
    {
        $this->country = $country;
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
        if(!array_key_exists($this->country, Phone::COUNTRY_CODES)) return false;

        if(substr($value, 0, 3) !== Phone::COUNTRY_CODES[$this->country]){
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'E164 Format for ' . $this->country . ' country isn\'t Correct';
    }
}
