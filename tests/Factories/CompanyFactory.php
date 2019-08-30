<?php

namespace Noogic\Builder\Tests\Factories;

use Noogic\Builder\Factory;

class CompanyFactory extends Factory
{

    public function default(): array
    {
        return [
            'name' => [
                'name' => $this->faker()->name,
                'type' => 'S.L',
            ],
            'email' => [
                'value' => $this->faker()->companyEmail,
            ],
            'maxUsers' => 10,
            'owner' => [
                'name' => $this->faker()->name,
                'email' => [
                    'value' => $this->faker()->email,
                ]
            ]
        ];
    }
}
