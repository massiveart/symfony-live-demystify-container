<?php

use Workshop\Starfleet\People\Crew;
use Workshop\Starfleet\People\Crewman;


error_reporting(E_ALL ^ E_DEPRECATED);

require_once dirname(__DIR__) . '/vendor/autoload.php';


$starfleet = new \Workshop\Starfleet\StarfleetCommand\StarfleetCommand();

$starfleet->register('NCC-1701 D', \Workshop\Starfleet\Ships\ExplorationVessel\Galaxy::class)
    ->addArgument('Enterprise')
    ->addArgument('NCC-1701 D')
    ->addArgument(new \Workshop\Starfleet\StarfleetCommand\Reference('enterprise.crew'));
//The Galaxy class has more Constructor argument , as the Warp drive.These will be autowire

$starfleet->register('NX-1', \Workshop\Starfleet\Ships\ExplorationVessel\Intrepid::class);

$starfleet->register('enterprise.crew', Crew::class)
    ->addArgument(new \Workshop\Starfleet\StarfleetCommand\Reference('SP-937-215'))
    ->addArgument(new \Workshop\Starfleet\StarfleetCommand\Reference('SC-231-427'))
    ->addArgument(new \Workshop\Starfleet\StarfleetCommand\Reference('SK-105-223'))
    ->addArgument(new \Workshop\Starfleet\StarfleetCommand\Reference('SK-105-123'));

$starfleet->register('SC-231-427', Crewman::class)
    ->addArgument('William')
    ->addArgument('Riker')
    ->addArgument('Comander');


$starfleet->register('SP-937-215', Crewman::class)
    ->addArgument('Jean-Luc')
    ->addArgument('Picard')
    ->addArgument('Captian');


$starfleet->register('SK-105-223', Crewman::class)
    ->addArgument('Data')
    ->addArgument('')
    ->addArgument('Commander');

$starfleet->register('SK-105-123', Crewman::class)
    ->addArgument('Beverly')
    ->addArgument('Crusher')
    ->addArgument('Doctor');



$starfleet->get('NCC-1701 D');
$starfleet->get('NX-1');

dump($starfleet);