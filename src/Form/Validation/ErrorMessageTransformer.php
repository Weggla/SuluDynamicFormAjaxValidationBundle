<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation\Form\Validation;

use Sulu\Bundle\DynamicFormAjaxValidation\Controller\ErrorMessageTransformerInterface;
use Symfony\Component\Form\FormInterface;

final class ErrorMessageTransformer implements ErrorMessageTransformerInterface
{
    public function transform(FormInterface $form): ErrorMessageCollection
    {
        $fields = $form->all();
        $errorMessages = new ErrorMessageCollection();
        foreach ($fields as $field) {
            $this->transformFieldMessages($field, $errorMessages);
        }

        return $errorMessages;
    }

    private function transformFieldMessages(FormInterface $field, ErrorMessageCollection $errorMessages): void
    {
        if ($field->isValid() === true) {
            return;
        }

        $errors = $field->getErrors();
        foreach ($errors as $error) {
            $errorMessages->add(new ErrorMessage(
                $field->getName(),
                $error->getMessage()
            ));
        }
    }
}