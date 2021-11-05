<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
{
    /**
     * The length of the phone.
     *
     * @var int
     */
    protected $length = 10;

    /**
     * first number in the phone.
     *
     * @var int
     */
    protected $start = 0;

    /**
     * second number in the phone.
     *
     * @var int
     */
    protected $second = 5;


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->checkPhone($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.incorrect');
    }

    protected function checkPhone($phone){
        if (strlen($phone) != $this->length ){
            return false;
        }elseif (!ctype_digit($phone)){
            return false;
        }else{
            if (substr($phone , 0 , 1) != $this->start){
                return false;
            }else{
                if (substr($phone , 1 , 1) != $this->second){
                    return false;
                }
            }
        }
        return true;
    }
}
