<?php

namespace Workshop\Starfleet;

use Psr\Container\ContainerInterface;


/** Normal known as Container */
class Starfleet implements ContainerInterface
{

    private array $starfleet = [];


    public function set(string $id, ?object $service)
    {
        $this->starfleet[$id] = $service;
    }

    public function get(string $id)
    {
        return $this->starfleet[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->starfleet[$id]);
    }

}