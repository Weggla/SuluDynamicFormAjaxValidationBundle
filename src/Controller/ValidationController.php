<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation\Controller;

use Sulu\Bundle\FormBundle\Form\BuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

readonly class ValidationController
{
    public function __construct(
        private BuilderInterface           $formBuilder,
        private ErrorMessageTransformerInterface $errorMessageTransformer,
    ) {
    }

    #[Route('/ajax/form/validate', name: 'validate_dynamic_form_ajax', methods: ['POST'])]
    public function validateFormField(Request $request): JsonResponse
    {
        $form = $this->formBuilder->buildByRequest($request);
        if ($form instanceof FormInterface !== true) {
            return new JsonResponse(['result' => 'No form data found'], 400);
        }

        if ($form->isValid() === true) {
            return new JsonResponse(['result' => 'The form is valid!'], 200);
        }

        $errorMessages = $this->errorMessageTransformer->transform($form);

        return new JsonResponse(['result' => $errorMessages->toArray()], 422);
    }
}
