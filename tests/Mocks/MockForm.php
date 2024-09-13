<?php

declare(strict_types=1);

namespace Sulu\Bundle\FormAjaxValidation\Tests\Mocks;

use IteratorAggregate;
use Symfony\Component\Form\Exception;
use Symfony\Component\Form\FormConfigInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormErrorIterator;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\PropertyAccess\PropertyPathInterface;
use Traversable;

class MockForm implements  IteratorAggregate, FormInterface
{
    public array $formFields = [];

    public function offsetExists(mixed $offset): bool
    {
        return true;
    }

    public function offsetGet(mixed $offset): mixed
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset(mixed $offset): void
    {
        // TODO: Implement offsetUnset() method.
    }

    public function count(): int
    {
        // TODO: Implement count() method.
    }

    public function setParent(?FormInterface $parent): static
    {
        // TODO: Implement setParent() method.
    }

    public function getParent(): ?self
    {
        // TODO: Implement getParent() method.
    }

    public function add(string|FormInterface $child, ?string $type = null, array $options = []): static
    {
        // TODO: Implement add() method.
    }

    public function get(string $name): FormInterface
    {
        // TODO: Implement get() method.
    }

    public function has(string $name): bool
    {
        // TODO: Implement has() method.
    }

    public function remove(string $name): static
    {
        // TODO: Implement remove() method.
    }

    public function all(): array
    {
        return $this->formFields;
    }

    public function getErrors(bool $deep = false, bool $flatten = true): FormErrorIterator
    {
        // TODO: Implement getErrors() method.
    }

    public function setData(mixed $modelData): static
    {
        // TODO: Implement setData() method.
    }

    public function getData(): mixed
    {
        // TODO: Implement getData() method.
    }

    public function getNormData(): mixed
    {
        // TODO: Implement getNormData() method.
    }

    public function getViewData(): mixed
    {
        // TODO: Implement getViewData() method.
    }

    public function getExtraData(): array
    {
        // TODO: Implement getExtraData() method.
    }

    public function getConfig(): FormConfigInterface
    {
        // TODO: Implement getConfig() method.
    }

    public function isSubmitted(): bool
    {
        // TODO: Implement isSubmitted() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function getPropertyPath(): ?PropertyPathInterface
    {
        // TODO: Implement getPropertyPath() method.
    }

    public function addError(FormError $error): static
    {
        // TODO: Implement addError() method.
    }

    public function isValid(): bool
    {
        // TODO: Implement isValid() method.
    }

    public function isRequired(): bool
    {
        // TODO: Implement isRequired() method.
    }

    public function isDisabled(): bool
    {
        // TODO: Implement isDisabled() method.
    }

    public function isEmpty(): bool
    {
        // TODO: Implement isEmpty() method.
    }

    public function isSynchronized(): bool
    {
        // TODO: Implement isSynchronized() method.
    }

    public function getTransformationFailure(): ?Exception\TransformationFailedException
    {
        // TODO: Implement getTransformationFailure() method.
    }

    public function initialize(): static
    {
        // TODO: Implement initialize() method.
    }

    public function handleRequest(mixed $request = null): static
    {
        // TODO: Implement handleRequest() method.
    }

    public function submit(array|string|null $submittedData, bool $clearMissing = true): static
    {
        // TODO: Implement submit() method.
    }

    public function getRoot(): FormInterface
    {
        // TODO: Implement getRoot() method.
    }

    public function isRoot(): bool
    {
        // TODO: Implement isRoot() method.
    }

    public function createView(?FormView $parent = null): FormView
    {
        // TODO: Implement createView() method.
    }

    public function getIterator(): Traversable
    {
        // TODO: Implement getIterator() method.
    }
}