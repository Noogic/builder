<?php

namespace Noogic\Builder\Tests\Stubs;

class Company
{
    /** @var CompanyName */
    private $name;

    /** @var Email */
    private $email;

    /** @var int */
    private $maxUsers;

    /** @var Worker */
    private $owner;

    public function __construct(CompanyName $name, Email $email, int $maxUsers, Worker $owner)
    {
        $this->name = $name;
        $this->email = $email;
        $this->maxUsers = $maxUsers;
        $this->owner = $owner;
    }

    /**
     * @return CompanyName
     */
    public function name(): CompanyName
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

    /**
     * @return int
     */
    public function maxUsers(): int
    {
        return $this->maxUsers;
    }

    /**
     * @return Worker
     */
    public function owner(): Worker
    {
        return $this->owner;
    }
}
