<?php

namespace App\Containers\Vendor\Sanctum\Data\Factories;

use App\Containers\Vendor\Sanctum\Models\Sanctum;
use App\Ship\Parents\Factories\Factory\ParentFactory;

class SanctumFactory extends ParentFactory
{
    protected $model = Sanctum::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
