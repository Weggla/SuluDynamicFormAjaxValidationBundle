<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation\Tests\Listener;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\MockObject;
use Sulu\Bundle\DynamicFormAjaxValidation\Listener\RequestListener;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\DynamicFormAjaxValidation\Tests\Mocks\MockUrlGenerator;
use Sulu\Bundle\FormBundle\Event\RequestListener as SuluRequestListener;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

#[CoversClass(RequestListener::class)]
class RequestListenerTest extends TestCase
{
    private MockObject $event;

    protected function setUp(): void
    {
        parent::setUp();

        $this->decoratedSuluListener = $this->createMock(SuluRequestListener::class);
        $this->request = $this->createMock(Request::class);
        $this->event = $this->createMock(RequestEvent::class);
        $this->event->expects(self::once())
            ->method('getRequest')
            ->willReturn($this->request);
    }

    public function testIsListeningOnValidationRoute(): void
    {
        $this->request
            ->expects($this->once())
            ->method('getRequestUri')
            ->willReturn('/foo/bar');

        $this->decoratedSuluListener
            ->expects($this->never())
            ->method('onKernelRequest');

        $this->runListener();
    }

    public function testIsNotListeningOnValidationRoute(): void
    {
        $this->request
            ->expects($this->once())
            ->method('getRequestUri')
            ->willReturn('/bar/baz');

        $this->decoratedSuluListener
            ->expects($this->once())
            ->method('onKernelRequest')
            ->with($this->event);

        $this->runListener();
    }

    private function runListener(): void
    {
        $urlGenerator = new MockUrlGenerator();
        $urlGenerator->route = '/foo/bar';

        $listener = new RequestListener($this->decoratedSuluListener, $urlGenerator);
        $listener->onKernelRequest($this->event);
    }
}
