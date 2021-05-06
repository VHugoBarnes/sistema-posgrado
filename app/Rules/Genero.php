<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Genero implements Rule
{

    public $generos = [
        'none' => '',
        'mujer' => 'Mujer', 
        'hombre' => 'Hombre', 
        'otro' => 'Otro', 
        'prefiero-no-decirlo' => 'Prefiero no decirlo'
    ];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    
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
        return array_key_exists($value, $this->generos);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El genero que ingresaste no es válido';
    }
}
