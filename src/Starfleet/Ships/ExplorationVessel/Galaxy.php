<?php


namespace Workshop\Starfleet\Ships\ExplorationVessel;

use Workshop\Starfleet\People\Crew;
use Workshop\Starfleet\Ships\Starship;
use Workshop\Starfleet\Device\Warp;

class Galaxy implements Starship
{
    public function __construct(
        private string $registration,
        private string $name,
        private Crew   $crew,
        private Warp   $warp
    )
    {
    }

    public function getRegistration(): string
    {
        return $this->registration;
    }

    public function getName(): string
    {
        return $this->name;
    }
}