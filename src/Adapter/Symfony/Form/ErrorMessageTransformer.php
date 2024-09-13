<?php

declare(strict_types=1);

namespace Sulu\Bundle\FormAjaxValidation\Adapter\Symfony\Form;

use Sulu\Bundle\FormAjaxValidation\Adapter\Symfony\Controller\ErrorMessageTransformerInterface;
use Sulu\Bundle\FormAjaxValidation\Validation\ErrorMessage;
use Sulu\Bundle\FormAjaxValidation\Validation\ErrorMessageCollection;
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