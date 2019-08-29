<?php

namespace Noogic\Builder\Test\Stubs;

class InactiveState
{
    /** @var string */
    private $state = 'inactive';

    /**
     * @return string
     */
    public function state(): string
    {
        return $this->state;
    }
}
