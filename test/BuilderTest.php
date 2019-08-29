<?php

namespace Noogic\Builder\Test;

use Noogic\Builder\Builder;
use Noogic\Builder\Test\Stubs\ActiveState;
use Noogic\Builder\Test\Stubs\Email;
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
}
