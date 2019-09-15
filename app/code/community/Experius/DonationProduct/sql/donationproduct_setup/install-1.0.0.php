<?php
$installer = $this;
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer->startSetup();

$fieldList = array(
    'tax_class_id'
);

// make these attributes applicable to downloadable products
foreach ($fieldList as $field) {
    $applyTo = explode(',', $installer->getAttribute('catalog_product', $field, 'apply_to'));
    if (!in_array('donation', $applyTo)) {
        $applyTo[] = 'donation';
        $installer->updateAttribute('catalog_product', $field, 'apply_to', join(',', $applyTo));
    }
}

$installer->addAttribute('catalog_product', 'min_donation_amount', array(
    'type'              => 'decimal',
    'label'             => 'Minimal Donation Amount',
    'input'             => 'price',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => false,
    'default'           => 0,
    'used_in_product_listing' => true,
    'apply_to'          =>  Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT,
    'group'             => 'Donation Product'
));

$installer->addAttribute('catalog_product', 'max_donation_amount', array(
    'type'              => 'decimal',
    'label'             => 'Maximal Donation Amount',
    'input'             => 'price',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => false,
    'default'           => 0,
    'used_in_product_listing' => true,
    'apply_to'          =>  Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT,
    'group'             => 'Donation Product'
));

$installer->addAttribute('catalog_product', 'display_area', array(
    'type'              => 'text',
    'label'             => 'Display Area',
    'input'             => 'multiselect',
    'source'            => 'donationproduct/source_display_area',
    'backend'           => 'eav/entity_attribute_backend_array',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => false,
    'default'           => 1,
    'used_in_product_listing' => true,
    'apply_to'          =>  Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT,
    'group'             => 'Donation Product'
));

$installer->addAttribute('catalog_product', 'display_mode', array(
    'type'              => 'varchar',
    'label'             => 'Display Mode',
    'input'             => 'select',
    'source'            => 'donationproduct/source_display_mode',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => false,
    'default'           => 1,
    'used_in_product_listing' => true,
    'apply_to'          =>  Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT,
    'group'             => 'Donation Product'
));



$installer->endSetup();