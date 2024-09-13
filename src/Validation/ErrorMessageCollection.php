<?php

declare(strict_types=1);

namespace Sulu\Bundle\FormAjaxValidation\Validation;

use Countable;

class ErrorMessageCollection implements Countable
{
    private array $messages = [];

    public function add(ErrorMessage $message): void
    {
        $this->messages[] = $message;
    }

    public function toArray(): array
    {
        $messages = [];
        foreach ($this->messages as $message) {
            $messages[$message->fieldName][] = $message->message;
        }

        return $messages;
    }

    public function count(): int
    {
        return count($this->messages);
    }
}