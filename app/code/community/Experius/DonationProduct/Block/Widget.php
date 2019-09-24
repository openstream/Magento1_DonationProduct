<?php
class Experius_DonationProduct_Block_Widget extends Mage_Core_Block_Template
{
    const DISPLAY_AREA = 'widget';

    protected $_configPrefix = 'widget';

    /**
     * @var Mage_Catalog_Model_Resource_Product_Collection
     */
    protected $_collection;

    /**
     * @return Mage_Catalog_Model_Resource_Product_Collection
     */
    public function getProductCollection()
    {
        if (empty($this->_collection)) {
            /** @var Mage_Catalog_Model_Resource_Product_Collection $collection */
            $this->_collection = Mage::getModel('catalog/product')->getCollection();
            $this->_collection->addAttributeToSelect('small_image');
            $this->_collection->addAttributeToSelect('name');
            $this->_collection->addAttributeToSelect('display_mode');
            $this->_collection->addAttributeToSelect('min_donation_amount');
            $this->_collection->addFieldToFilter(
                'type_id',
                Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT
            );
        }

        return $this->_collection;
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

    /**
     * @return string
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getTitle()
    {
        return $this->getLayoutConfig($this->_configPrefix . '_title');
    }

    /**
     * @return string
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getText()
    {
        return $this->getLayoutConfig($this->_configPrefix . '_text');
    }

    /**
     * @return string
     * @throws Mage_Core_Model_Store_Exception
     */
    public function _toHtml()
    {
        if (!(Mage::helper('donationproduct')->isEnabled()
            && $this->getLayoutConfig('show_in_' . $this->_configPrefix)
            && $this->getProductCollection()->getSize())
        ) {
            return '';
        }

        return parent::_toHtml();
    }

    /**
     * @return bool
     * @throws Mage_Core_Model_Store_Exception
     */
    public function showImage()
    {
        return (bool) $this->getLayoutConfig($this->_configPrefix . '_show_image');
    }

    /**
     * @return int
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getImageSize()
    {
        return (int) $this->getLayoutConfig($this->_configPrefix . '_image_size');
    }
}
