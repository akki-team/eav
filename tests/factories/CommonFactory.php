<?php

use Eav\AttributeSet;
use Eav\AttributeGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeSetFactory extends Factory
{
    protected $model = AttributeSet::class;
    public function definition()
    {
        return [
            'attribute_set_name' => $this->faker->unique()->userName,
            'entity_id' => null,
        ];
    }
}


class AttributeGroupFactory extends Factory
{
    protected $model = AttributeGroup::class;
    public function definition()
    {
        return [
            'attribute_set_id' => null,
            'attribute_group_name' => $this->faker->unique()->userName,
        ];
    }
}
