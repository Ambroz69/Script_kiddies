<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OnlyOneId implements Rule
{
    protected $attr1, $attr2, $attr3;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($attr1, $attr2, $attr3)
    {
        $this->attr1 = $attr1;
        $this->attr2 = $attr2;
        $this->attr3 = $attr3;
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
        $counter = 0;
        if ($this->attr1 == 0) $counter++;
        if ($this->attr2 == 0) $counter++;
        if ($this->attr3 == 0) $counter++;

        if ($counter == 2) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Je potrebné vybrať práve jedno ID z polí: Byt/Dom/Pozemok.';
    }
}
