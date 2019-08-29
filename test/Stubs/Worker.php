<?php

namespace Noogic\Builder\Test\Stubs;

class Worker
{
    /** @var string */
    private $name;

    /** @var Email */
    private $email;

    public function __construct(string $name, Email $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return Email
     */
    public function email(): Email
    {
        return $this->email;
    }
}
