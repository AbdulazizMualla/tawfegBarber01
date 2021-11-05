<?php

namespace App\Rules;

trait PhoneValidationRules {

    /**
     * Get the validation rules used to validate phone.
     *
     * @return array
     */
    protected function phoneRules()
    {
        return ['required',  new Phone() , 'unique:users,phone'];
    }
}
