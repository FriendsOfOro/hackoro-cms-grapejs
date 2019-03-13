<?php

namespace FriendsOfOro\Bundle\GrapeJsBundle\Migrations\Schema\v1_O;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityBundle\EntityConfig\DatagridScope;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;
use Doctrine\DBAL\Types\Type;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 * Add `grapejsState` field from `oro_page` table
 */
class AddGrapejsStateField implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        if(!$schema->getTable('oro_cms_page')) {
            return;
        }

        $table = $schema->getTable('oro_cms_page');
        $table->addColumn('grapejsState', TYPE::JSON,
            [
                'oro_options' => [
                    'extend'    => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid'  => ['is_visible' => DatagridScope::IS_VISIBLE_FALSE],
                    'merge'     => ['display' => true, 'autoescape' => false],
                    'form'      => ['type' => HiddenType::class],
                ]
            ]
        );
    }
}
