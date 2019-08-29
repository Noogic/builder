<?php

namespace Noogic\Builder\Test;

use Noogic\Builder\Builder;
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
        $email = Builder::instance()->get(Email::class, $data);

        $this->assertInstanceOf(Email::class, $email);
    }
}
