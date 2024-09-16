<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation\Tests\Form\Validation;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\DynamicFormAjaxValidation\Form\Validation\ErrorMessage;

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
