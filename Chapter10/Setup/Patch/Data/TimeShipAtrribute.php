<?php
/**
 * TimeShipAtrribute
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Model\Attribute\Backend\Startdate;

class TimeShipAtrribute implements DataPatchInterface
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
        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'shipping_time', [
            'group' => 'Default',
            'label' => 'Shipping Time',
            'type' => 'datetime',
            'input' => 'datetime',
            'backend' => Startdate::class,
            'required' => false,
            'visible' => true,
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
