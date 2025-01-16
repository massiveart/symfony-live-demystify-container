<?php

namespace Workshop\Starfleet\People;

class Crew
{
    public function __construct(
        private Crewman   $captian,
        private Crewman   $firstOfficer,
        private Crewman   $helmsman,
        private Crewman   $doctor
    )
    {
    }
}