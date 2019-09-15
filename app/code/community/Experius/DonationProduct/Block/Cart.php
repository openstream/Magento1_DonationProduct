<?php

class Experius_DonationProduct_Block_Cart extends Experius_DonationProduct_Block_Widget
{
    const DISPLAY_AREA = 'cart';

    public function getProductCollection()
    {
        $collection = parent::getProductCollection();
        $collection->addAttributeToFilter('display_area', ['finset' => self::DISPLAY_AREA]);

        return $collection;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getLayoutConfig('cart_title');
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->getLayoutConfig('cart_text');
    }

    /**
     * @return string
     */
    public function _toHtml()
    {
        if (!$this->getLayoutConfig('show_in_cart') || !$this->getProductCollection()->getSize()) {
            return '';
        }

        return parent::_toHtml();
    }
}
