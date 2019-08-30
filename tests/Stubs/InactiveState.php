<?php

namespace Noogic\Builder\Tests\Stubs;

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
