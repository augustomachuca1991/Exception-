<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function report()
    {
        \Log::debug('La conversión del tipo de datos nvarchar en datetime produjo un valor fuera de intervalo');
    }
}
