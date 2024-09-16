<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation\Tests\Form\Validation;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\DynamicFormAjaxValidation\Form\Validation\ErrorMessage;
use Sulu\Bundle\DynamicFormAjaxValidation\Form\Validation\ErrorMessageCollection;

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
