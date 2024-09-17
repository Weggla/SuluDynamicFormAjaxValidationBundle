<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation\Listener;

use Sulu\Bundle\FormBundle\Event\RequestListener as SuluRequestListener;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[AsDecorator(decorates: SuluRequestListener::class)]
readonly class RequestListener
{
    public function __construct(
        private SuluRequestListener $decoratedService,
        private UrlGeneratorInterface $router,
    ) {
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $validationRoute = $this->router->generate('validate_dynamic_form_ajax');
        if ($validationRoute === $request->getRequestUri()) {
            return;
        }

        $this->decoratedService->onKernelRequest($event);
    }
}