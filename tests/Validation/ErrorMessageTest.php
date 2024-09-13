<?php

declare(strict_types=1);

namespace Sulu\Bundle\FormAjaxValidation\Tests\Validation;

use PHPUnit\Framework\Attributes\CoversClass;
use Sulu\Bundle\FormAjaxValidation\Validation\ErrorMessage;
use PHPUnit\Framework\TestCase;

#[CoversClass(ErrorMessage::class)]
class ErrorMessageTest extends TestCase
{
    public function testErrorMessage(): void
    {
        $errorMessage = new ErrorMessage('fieldName', 'message');

        self::assertSame('fieldName', $errorMessage->fieldName);
        self::assertSame('message', $errorMessage->message);
    }
}
