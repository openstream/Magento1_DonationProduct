<?php

class Experius_DonationProduct_Model_Observer
{
    public function setChosenPrice($observer)
    {
        $product = $observer->getEvent()->getProduct();
        if ($product->getTypeId() == Experius_DonationProduct_Model_Product_Type::TYPE_DONATIONPRODUCT) {
            //var_dump($product->getOrderOptions($product));
            //die();
        }
        $price = (float) round(time() / 100, 2);
        $item->setCustomPrice($price);
        $item->setOriginalCustomPrice($price);

        $additionalOptions = array(
            'label' => 'shop_data',
            'value' => 1
        );
        $item->addOption(array(
            'code' => 'info_buyRequest',
            'value' => serialize($additionalOptions)
        ));
        $item->save();
    }
}