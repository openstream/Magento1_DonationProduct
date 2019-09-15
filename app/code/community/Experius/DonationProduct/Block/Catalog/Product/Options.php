<?php
class Experius_DonationProduct_Block_Catalog_Product_Options extends Mage_Core_Block_Template
{
    /**
     * @return array
     */
    public function getFixedAmounts()
    {
        return Mage::helper('donationproduct')->getFixedAmounts();
    }

    /**
     * @return float
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getMinAmount()
    {
        return Mage::helper('donationproduct')->getMinAmount(Mage::registry('product'));
    }

    /**
     * @return string
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getCurrencyCode()
    {
        return Mage::app()->getStore()->getCurrentCurrency()->getCode();
    }

    /**
     * @return int
     */
    public function getAmountDisplayMode()
    {
        return Mage::registry('product')->getDisplayMode();
    }
}
