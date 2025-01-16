<?php

namespace Workshop\Starfleet\Ships;

interface Starship
{
    public function getRegistration() : string;
    public function getName() : string;
}