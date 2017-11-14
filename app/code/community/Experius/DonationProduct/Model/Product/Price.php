<?php

class Experius_DonationProduct_Model_Product_Price extends Mage_Catalog_Model_Product_Type_Price
{
    public static function calculatePrice()
    {
        return (float)(time() / 100);
    }
}