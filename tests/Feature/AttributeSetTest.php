<?php

namespace Eav\TestCase\Feature;

use Eav\Entity;
use Eav\Attribute;
use Eav\AttributeSet;
use Eav\AttributeGroup;
use Eav\EntityAttribute;

class AttributeSetTest extends TestCase
{
    /** @test */
    public function it_must_be_associated_with_entity()
    {
        $entity = Entity::factory()->create([
            'entity_code' => 'custom'
        ]);

        AttributeSet::factory(5)->create([
            'entity_id' => $entity->entity_id,
        ]);

        $this->assertEquals($entity->attributeSet->count(), 5);
    }

    /** @test */
    public function it_can_have_multiple_group()
    {
        $entity = Entity::factory()->create([
            'entity_code' => 'custom'
        ]);

        $set = AttributeSet::factory()->create([
            'entity_id' => $entity->entity_id,
        ]);

        AttributeGroup::factory(5)->create([
            'attribute_set_id' => $set->getKey(),
        ]);

        $this->assertEquals($set->attributeGroup->count(), 5);
    }


    /** @test */
    public function it_must_retrive_associated_attributes()
    {
        $entity = Entity::factory()->create([
            'entity_code' => 'custom'
        ]);

        $set = AttributeSet::factory()->create([
            'entity_id' => $entity->entity_id,
        ]);

        $group = AttributeGroup::factory()->create([
            'attribute_set_id' => $set->getKey(),
        ]);

        $sku = $this->addSku();

        EntityAttribute::map([
            'attribute_code' => $sku->code(),
            'entity_code' => $entity->code(),
            'attribute_set' => $set->name(),
            'attribute_group' => $group->name()
        ]);

        $this->assertEquals($set->attributes->count(), 1);
    }
}
