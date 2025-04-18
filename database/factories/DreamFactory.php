<?php

namespace Database\Factories;

use App\Enums\DreamStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dream>
 */
class DreamFactory extends Factory
{
    public $status = [DreamStatusEnum::APPROVE->value , DreamStatusEnum::PENDING->value];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isDeleted = (bool)((fake()->numberBetween(1,2))%2);

        return [
            'full_name' => fake()->name(),
            'description'=> fake()->sentence(),
            'amount' => fake()->numberBetween(1,1000),
            'image_path' => null ,
            'status' => $this->status[fake()->numberBetween(0,1)],
            'deleted_at' => $isDeleted ? Carbon::now()->format('Y-m-d H:i:s') : null ,
        ];
    }
}
