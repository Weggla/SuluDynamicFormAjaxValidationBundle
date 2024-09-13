<?php

declare(strict_types=1);

namespace Sulu\Bundle\FormAjaxValidation\Validation;

readonly class ErrorMessage
{
    public function __construct(public string $fieldName, public string $message)
    {
    }
}