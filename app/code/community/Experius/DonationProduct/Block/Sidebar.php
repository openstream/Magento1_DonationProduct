<?php

class Experius_DonationProduct_Block_Sidebar extends Experius_DonationProduct_Block_Widget
{
    const DISPLAY_AREA = 'sidebar';

    protected $_configPrefix = 'sidebar';

    public function getProductCollection()
    {
        if (empty($this->_collection)) {
            $this->_collection = parent::getProductCollection();
            $this->_collection->addAttributeToFilter('display_area', ['finset' => self::DISPLAY_AREA]);
        }

        return $this->_collection;
    }
}
