<?php

namespace Workshop\Starfleet\StarfleetCommand;

class Reference
{
    public function __construct(private string $id)
    {
    }

    public function __toString(): string
    {
        return $this->id;
    }
}