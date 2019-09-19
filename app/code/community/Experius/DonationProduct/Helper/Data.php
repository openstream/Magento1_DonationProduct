<?php
class Experius_DonationProduct_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @return array
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getFixedAmounts()
    {
        return array_filter(
            array_map('trim',
                explode(',', Mage::app()->getStore()->getConfig('donation_product/settings/fixed_amount'))
            )
        );
    }

    /**
     * @return bool
     * @throws Mage_Core_Model_Store_Exception
     */
    public function isEnabled()
    {
       return (bool) Mage::app()->getStore()->getConfig('donation_product/settings/enabled');
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     * @return float
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getMinAmount($product = null)
    {
        $default = Mage::app()->getStore()->getConfig('donation_product/settings/min_amount');

        if (empty($product)) {
            return $default;
        }

        return (float) $product->getMinDonationAmount() ?: $default;
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     * @return float
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getMaxAmount($product = null)
    {
        $default = Mage::app()->getStore()->getConfig('donation_product/settings/max_amount');

        if (empty($product)) {
            return $default;
        }

        return (float) $product->getMaxDonationAmount() ?: $default;
    }
}
