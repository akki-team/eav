<?php

use Eav\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntityFactory extends Factory
{
    protected $model = Entity::class;
    public function definition()
    {
        $code = $this->faker->unique()->userName;
        return [
            'entity_code' => $code,
            'entity_class' => 'App\\'.ucfirst($code),
            'entity_table' => $code.'s',
        ];
    }
    public function flat()
    {
        return $this->state(function () {
            return [
                'is_flat_enabled' => 1
            ];
        });
    }
}
