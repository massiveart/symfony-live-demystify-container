<?php

namespace Workshop\Starfleet\StarfleetCommand;

use Exception;
use ReflectionClass;
use Workshop\Starfleet\Starfleet;


/** Normal known as ContainerBuilder */
class StarfleetCommand extends Starfleet
{

    private array $registrations = [];


    public function register(string $id, ?string $class = null)
    {
        /** Normal known as Deftinition */
        return $this->setRegistration($id, new Registration($class));
    }

    private function setRegistration(string $id, Registration $registration)
    {
        return $this->registrations[$id] = $registration;
    }

    /** @return Registration[] */
    public function getRegistrations(): array
    {
        return $this->registrations;
    }

    public function getRegistration(string $id): Registration
    {
        if (!$this->hasRegistration($id)) {
            throw new Exception('Registration not found');
        }
        return $this->registrations[$id];
    }

    public function hasRegistration(string $id): bool
    {
        return isset($this->registrations[$id]);
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            $this->set($id, $this->make($this, $id));
        }
        return parent::get($id);
    }

    /**
     * @throws \ReflectionException
     */
    private function make(self $container, $id, $parameters = [])
    {
        if ($container->hasRegistration($id)) {
            $registration = $container->getRegistration($id);
            $id = $registration->getClass();

            foreach ($registration->getArguments() as $key => $argument) {
                if ($argument instanceof Reference) {
                    $parameters[$key] = $container->get($argument->__toString());
                }
                if (is_string($argument)) {
                    $parameters[$key] = $argument;
                }
            }

        }

        $classReflection = new ReflectionClass($id);

        $constructorParams = $classReflection->getConstructor() ? $classReflection->getConstructor()->getParameters() : [];
        $dependencies = [];

        $i = 0;
        foreach ($constructorParams as $constructorParam) {
            if (isset($parameters[$i])) {
                array_push($dependencies, $parameters[$i]);
            } else {
                if (!$constructorParam->getType()?->isBuiltin()) {
                    array_push($dependencies, $container->get($constructorParam->getType()?->getName()));
                }
            }
            $i++;
        }

        /** todo many agruments check */

        return $classReflection->newInstance(...$dependencies);
    }
}