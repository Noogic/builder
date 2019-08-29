<?php

namespace Noogic\Builder;

use Faker\Generator;

abstract class Factory
{
    /** @var Builder */
    private $builder;

    /** @var string */
    protected $objectClass;

    /** @var array */
    protected $objects = [];

    public function __construct()
    {
        $this->builder = Builder::instance();
    }

    public static function instance()
    {
        return new static;
    }

    public function make(array $attributes = [])
    {
        $this->objects[] = $this->builder->make($this->objectClass, $this->data($attributes));
    }

    public function data(array $attributes = []): array
    {
        $data = array_merge($this->default(), $attributes);

        return $data;
    }

    public function faker(): ?Generator
    {
        if (! class_exists('Faker\Generator\Generator')) {
            return null;
        }

        return \Faker\Factory::create();
    }

    abstract public function default(): array;

    public function map(): array
    {
        return [];
    }
}
