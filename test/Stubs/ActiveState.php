<?php

namespace Noogic\Builder\Test\Stubs;

class ActiveState
{
    /** @var string */
    private $state;

    public function __construct()
    {
        $this->state = 'active';
    }

    /**
     * @return string
     */
    public function state(): string
    {
        return $this->state;
    }
}
