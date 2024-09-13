<?php

declare(strict_types=1);

namespace Sulu\Bundle\FormAjaxValidation\Tests\Adapter\Symfony\Form;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Sulu\Bundle\FormAjaxValidation\Adapter\Symfony\Form\ErrorMessageTransformer;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\FormAjaxValidation\Tests\Mocks\MockForm;
use Sulu\Bundle\FormAjaxValidation\Tests\Mocks\MockFormField;
use Sulu\Bundle\FormAjaxValidation\Validation\ErrorMessage;
use Sulu\Bundle\FormAjaxValidation\Validation\ErrorMessageCollection;
use Symfony\Component\Form\FormError;

#[CoversClass(ErrorMessageTransformer::class)]
#[UsesClass(ErrorMessageCollection::class)]
#[UsesClass(ErrorMessage::class)]
class ErrorMessageTransformerTest extends TestCase
{
    private MockForm $form;

    protected function setUp(): void
    {
        parent::setUp();
        $this->form = new MockForm();
    }

    public function testFormIsValid(): void
    {
        $this->form->formFields[] = $this->generateField('foo');
        $this->form->formFields[] = $this->generateField('bar');

        $errors = $this->runTransformer();

        self::assertCount(0, $errors);
    }

    public function testFormFieldIsInvalid(): void
    {
        $this->form->formFields[] = $this->generateField('foo');
        $this->form->formFields[] = $this->generateField('bar', ['Required', 'Length']);
        $this->form->formFields[] = $this->generateField('baz', ['Invalid']);

        $errors = $this->runTransformer();
        $expectedErrors = [
            'bar' => ['Required', 'Length'],
            'baz' => ['Invalid'],
        ];

        self::assertCount(3, $errors);
        self::assertSame($errors->toArray(), $expectedErrors);
    }

    private function runTransformer(): ErrorMessageCollection
    {
        $messageTransformer = new ErrorMessageTransformer();

        return $messageTransformer->transform($this->form);
    }

    private function generateField(string $name, array $errorMessages = []): MockFormField
    {
        $field = new MockFormField($this->form);
        $field->fieldName = $name;
        $field->errors = [];
        foreach ($errorMessages as $errorMessage) {
            $field->errors[] = new FormError($errorMessage);
        }

        return $field;
    }

}
