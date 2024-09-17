<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation\Tests\Mocks;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;

class MockUrlGenerator implements UrlGeneratorInterface
{
    public string $route = '';

    public function setContext(RequestContext $context): void
    {
        // TODO: Implement setContext() method.
    }

    public function getContext(): RequestContext
    {
        // TODO: Implement getContext() method.
    }

    public function generate(string $name, array $parameters = [], int $referenceType = self::ABSOLUTE_PATH): string
    {
        return $this->route;
    }
}