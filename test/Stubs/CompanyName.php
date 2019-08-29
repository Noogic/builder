<?php

namespace Noogic\Builder\Test\Stubs;

class CompanyName
{
    /** @var string */
    private $name;

    /** @var string */
    private $type;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }
}
