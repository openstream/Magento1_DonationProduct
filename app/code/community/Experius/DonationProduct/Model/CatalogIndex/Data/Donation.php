<?php

class Experius_DonationProduct_Model_CatalogIndex_Data_Donation extends Mage_CatalogIndex_Model_Data_Abstract
{
    public function getTypeCode()
    {
        return Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT;
    }
}
