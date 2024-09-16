<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation\Controller;

use Sulu\Bundle\DynamicFormAjaxValidation\Form\Validation\ErrorMessageCollection;
use Symfony\Component\Form\FormInterface;

interface ErrorMessageTransformerInterface
{
    public function transform(FormInterface $form): ErrorMessageCollection;
}