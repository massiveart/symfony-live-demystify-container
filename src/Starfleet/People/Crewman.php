<?php

namespace Workshop\Starfleet\People;


class Crewman
{
    public function __construct(
        private string   $firstName,
        private string   $lastname,
        private string   $rank,
    )
    {
    }
}