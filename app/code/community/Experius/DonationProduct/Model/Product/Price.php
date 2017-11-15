<?php

class Experius_DonationProduct_Model_Product_Price extends Mage_Catalog_Model_Product_Type_Price
{
    public static function calculatePrice()
    {
        return (float)(time() / 100);
    }

    /**
     * Retrieve product final price
     *
     * @param float|null $qty
     * @param Mage_Catalog_Model_Product $product
     * @return float
     */
    public function getFinalPrice($qty = null, $product)
    {
        //$buyRequest = $product->getCustomOption('info_buyRequest');
        //$product->setFinalPrice($finalPrice);

        return '0.01';
    }
}