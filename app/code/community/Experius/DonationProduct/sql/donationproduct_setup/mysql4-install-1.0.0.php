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

/* To add
$sql=<<<SQLTEXT
create table tablename(tablename_id int not null auto_increment, name varchar(100), primary key(tablename_id));
    insert into tablename values(1,'tablename1');
    insert into tablename values(2,'tablename2');
		
SQLTEXT;

$installer->run($sql);
*/


$installer->endSetup();