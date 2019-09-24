<?php
$installer = $this;
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer->startSetup();


$installer->addAttribute('catalog_product', 'show_in_cart_with_sku', array(
    'type'              => 'text',
    'label'             => 'Show in cart only with following products',
    'note'              => 'List of Product SKUs, comma-separated. Not applied, if empty',
    'input'             => 'text',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => false,
    'default'           => '',
    'used_in_product_listing' => true,
    'apply_to'          =>  Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT,
    'group'             => 'Donation Product'
));

$installer->endSetup();