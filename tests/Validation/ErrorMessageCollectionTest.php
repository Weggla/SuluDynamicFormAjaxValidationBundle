<?php

declare(strict_types=1);

namespace Sulu\Bundle\FormAjaxValidation\Tests\Validation;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Sulu\Bundle\FormAjaxValidation\Validation\ErrorMessage;
use Sulu\Bundle\FormAjaxValidation\Validation\ErrorMessageCollection;
use PHPUnit\Framework\TestCase;

#[CoversClass(ErrorMessageCollection::class)]
#[UsesClass(ErrorMessage::class)]
class ErrorMessageCollectionTest extends TestCase
{
    public function testErrorMessageIsAddedToCollection(): void
    {
        $collection = new ErrorMessageCollection();
        $collection->add(new ErrorMessage('foo', 'message_foo'));
        $collection->add(new ErrorMessage('bar', 'message_bar'));

        $expectedErrorMessages = [
            'foo' => ['message_foo'],
            'bar' => ['message_bar'],
        ];
        $errorMessages = $collection->toArray();

        self::assertSame(2, $collection->count());
        self::assertSame($expectedErrorMessages, $errorMessages);
    }
}
