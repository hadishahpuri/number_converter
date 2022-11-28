<?php

namespace App\Requests;

use Symfony\Component\Validator\Constraints\NotBlank;

class NumberConverterRequest extends BaseRequest
{
    #[NotBlank()]
    public $number;

    #[NotBlank()]
    public $language;

    protected function autoValidateRequest(): bool
    {
        return false;
    }
}