<?php
/**
 * SettimeAttribute
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\EditProduct\Setup\Patch\Data;


use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class SettimeAttribute implements DataPatchInterface
{
    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory          $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }
    /**
     * {@inheritdoc}
     */


    public function apply() {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'time_start', [
            'group' => 'Default',
            'label' => 'Start time',
            'type' => 'datetime',
            'input' => 'datetime',
            'class' => 'validate-date',
            'backend' => '',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'default' => '',
            'searchable' => true,
            'filterable' => true,
            'filterable_in_search' => true,
            'visible_in_advanced_search' => true,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false
        ]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'time_end', [
            'group' => 'Default',
            'label' => 'Start time',
            'type' => 'datetime',
            'input' => 'datetime',
            'class' => 'validate-date',
            'backend' => '',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'default' => '',
            'searchable' => true,
            'filterable' => true,
            'filterable_in_search' => true,
            'visible_in_advanced_search' => true,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [

        ];
    }
}
