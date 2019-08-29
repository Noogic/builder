<?php

namespace Noogic\Builder;

use Noogic\Builder\Helper\Arr;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;

class Builder
{
    public static function instance()
    {
        return new self;
    }

    public function get(string $class, array $data = null)
    {
        $reflectionClass = new ReflectionClass($class);

        if(! $reflectionClass->hasMethod('__construct')) {
            return new $class;
        }

        $params = $this->getConstructorParams($class);

        $instance = is_array($data)
            ? $reflectionClass->newInstanceArgs($this->getValues($data, $params))
            : $reflectionClass->newInstance($data)
        ;

        return $instance;
    }

    private function getConstructorParams(string $class): array
    {
        $reflectionMethod = new ReflectionMethod($class, '__construct');
        $params = $reflectionMethod->getParameters();

        return $params;
    }

    private function getValues(array $data, array $params): array
    {
        $values = [];
        $data = $data ?: [];

        /** @var ReflectionParameter $param */
        foreach ($params as $param) {
            $key = $param->name;
            $reflectionClass = $param->getClass();

            $values[$key] = $reflectionClass
                ? $this->get($reflectionClass->name, Arr::get($data, $key))
                : Arr::get($data, $key)
            ;
        }

        return $values;
    }
}
