<?php

class Experius_DonationProduct_Model_Product_Price extends Mage_Catalog_Model_Product_Type_Price
{
    public static function calculatePrice()
    {
        return (float)(time() / 100);
    }

    public function getPrice($product)
    {
        $price = $this->getDonationAmount(1, $product);
        return $price;
    }

    public function getFinalPrice($qty, $product)
    {
        $finalPrice = $this->getDonationAmount($qty, $product);
        $product->setFinalPrice($finalPrice);

        Mage::dispatchEvent('catalog_product_get_final_price', array('product' => $product, 'qty' => $qty));

        $finalPrice = $product->getData('final_price');
        $finalPrice = max(0, $finalPrice);
        $product->setFinalPrice($finalPrice);

        return $finalPrice;
    }


    public function getBasePrice($product, $qty = null)
    {
        $price =  $this->getDonationAmount($qty, $product);
        return $price;
    }


    public function getDonationAmount($qty, $product)
    {
        $price = $product->getData('price');

        $postData = $product->getCustomOption('donation_options');

        if (!$postData) {
            return $price;
        }

        $postData = json_decode($postData->getValue(), true);

        $helper = Mage::helper('donationproduct');

        if (isset($postData['amount'])) {
            $amount = $postData['amount'];

            $minAmount = $helper->getMinAmount($product);
            if ($amount < $minAmount) {
                return $minAmount;
            }

            $maxAmount = $helper->getMaxAmount($product);
            if ($amount > $maxAmount) {
                return $maxAmount;
            }

            return $amount;
        }

        return $price;
    }
}