<?php
class Experius_DonationProduct_Block_Widget extends Mage_Core_Block_Template
{
    /**
     * @return Mage_Catalog_Model_Resource_Product_Collection
     */
    public function getProductCollection()
    {
        /** @var Mage_Catalog_Model_Resource_Product_Collection $collection */
        $collection = Mage::getModel('catalog/product')->getCollection();
        $collection->addAttributeToSelect('small_image');
        $collection->addAttributeToSelect('name');
        $collection->addAttributeToSelect('display_mode');
        $collection->addAttributeToSelect('min_donation_amount');
        $collection->addFieldToFilter('type_id', Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT);

        return $collection;
    }

    /**
     * @param string $field
     * @return string
     * @throws Mage_Core_Model_Store_Exception
     */
    protected function getLayoutConfig($field)
    {
        return Mage::app()->getStore()->getConfig('donation_product/layout/' . $field);
    }

    /**
     * @param $product
     * @param array $additional
     * @return mixed
     */
    public function getAddToCartUrl($product, $additional = array())
    {
        if (!$product->getTypeInstance(true)->hasRequiredOptions($product)) {
            return $this->helper('checkout/cart')->getAddUrl($product, $additional);
        }
        $additional = array_merge(
            $additional,
            array(Mage_Core_Model_Url::FORM_KEY => Mage::getSingleton('core/session')->getFormKey())
        );
        if (!isset($additional['_escape'])) {
            $additional['_escape'] = true;
        }
        if (!isset($additional['_query'])) {
            $additional['_query'] = array();
        }
        $additional['_query']['options'] = 'cart';

        return $product->getUrlModel()->getUrl($product, $additional);
    }
}
