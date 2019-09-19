<?php

class Experius_DonationProduct_Block_Cart extends Experius_DonationProduct_Block_Widget
{
    const DISPLAY_AREA = 'cart';

    protected $_configPrefix = 'cart';

    public function getProductCollection()
    {
        $collection = parent::getProductCollection();
        $collection->addAttributeToFilter('display_area', ['finset' => self::DISPLAY_AREA]);

        return $collection;
    }
}
