<?php

namespace Noogic\Builder\Tests;

use Noogic\Builder\Builder;
use Noogic\Builder\Tests\Stubs\ActiveState;
use Noogic\Builder\Tests\Stubs\Company;
use Noogic\Builder\Tests\Stubs\CompanyName;
use Noogic\Builder\Tests\Stubs\Email;
use Noogic\Builder\Tests\Stubs\InactiveState;
use Noogic\Builder\Tests\Stubs\Worker;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    /** @test */
    function it_can_build_an_email_value_object()
    {
        $data = [
            'value' => 'my.email@test.com',
        ];

        /** @var Email $email */
        $email = Builder::instance()->make(Email::class, $data);

        $this->assertInstanceOf(Email::class, $email);
        $this->assertEquals($data['value'], $email->value());
    }

    /** @test */
    function it_can_build_an_object_without_params()
    {
        /** @var ActiveState $state */
        $state = Builder::instance()->make(ActiveState::class);

        $this->assertInstanceOf(ActiveState::class, $state);
        $this->assertEquals('active', $state->state());
    }

    /** @test */
    function it_can_build_an_object_without_constructor()
    {
        /** @var InactiveState $state */
        $state = Builder::instance()->make(InactiveState::class);

        $this->assertInstanceOf(InactiveState::class, $state);
        $this->assertEquals('inactive', $state->state());
    }

    /** @test */
    function it_can_build_an_object_asking_other_objects_and_scalars_from_array_values()
    {
        $data = [
            'name' => [
                'name' => 'My Company',
                'type' => 'S.L',
            ],
            'email' => [
                'value' => 'my.company.email@test.com',
            ],
            'maxUsers' => 10,
            'owner' => [
                'name' => 'Owner of company',
                'email' => [
                    'value' => 'owner.of.company@test.com',
                ]
            ]
        ];

        /** @var Company $company */
        $company = Builder::instance()->make(Company::class, $data);

        $this->assertInstanceOf(Company::class, $company);

        $this->assertInstanceOf(CompanyName::class, $company->name());
        $this->assertEquals($data['name']['name'], $company->name()->name());
        $this->assertEquals($data['name']['type'], $company->name()->type());

        $this->assertInstanceOf(Email::class, $company->email());
        $this->assertEquals($data['email']['value'], $company->email()->value());

        $this->assertEquals($data['maxUsers'], $company->maxUsers());

        $this->assertInstanceOf(Worker::class, $company->owner());
        $this->assertEquals($data['owner']['name'], $company->owner()->name());
        $this->assertInstanceOf(Email::class, $company->owner()->email());
        $this->assertEquals($data['owner']['email']['value'], $company->owner()->email()->value());
    }

    /** @test */
    function it_can_build_an_object_passing_its_dependencies_built()
    {
        $data = [
            'name' => 'worker name',
            'email' => new Email('test.email@test.com'),
        ];

        /** @var Worker $worker */
        $worker = Builder::instance()->make(Worker::class, $data);

        $this->assertInstanceOf(Worker::class, $worker);
        $this->assertInstanceOf(Email::class, $worker->email());
        $this->assertEquals($data['name'], $worker->name());
        $this->assertEquals($data['email']->value(), $worker->email()->value());
    }
}
