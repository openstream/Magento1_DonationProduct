<?php

class Experius_DonationProduct_Block_Sidebar extends Experius_DonationProduct_Block_Widget
{
    const DISPLAY_AREA = 'sidebar';

    public function getProductCollection()
    {
        $collection = parent::getProductCollection();
        $collection->addAttributeToFilter('display_area', self::DISPLAY_AREA);

        return $collection;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getLayoutConfig('sidebar_title');
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->getLayoutConfig('sidebar_text');
    }

    /**
     * @return string
     */
    public function _toHtml()
    {
        if (!$this->getLayoutConfig('show_in_sidebar') || !$this->getProductCollection()->getSize()) {
            return '';
        }

        return parent::_toHtml();
    }
}
