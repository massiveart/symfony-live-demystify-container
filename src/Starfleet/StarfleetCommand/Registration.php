<?php

namespace Workshop\Starfleet\StarfleetCommand;

/** Normal known as "Defitnion" */
class Registration
{
    private array $arguments = [];

    public function __construct(private string $class)
    {

    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function addArgument(mixed $argument): static
    {
        $this->arguments[] = $argument;

        return $this;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }
}