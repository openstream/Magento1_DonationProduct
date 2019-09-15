<?php

use Experius_DonationProduct_Block_Sidebar as Sidebar;
use Experius_DonationProduct_Block_Cart as Cart;
class Experius_DonationProduct_Model_Source_Display_Area extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    const DISPLAY_AREA_NONE = 1;

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $optionArray = [
            ['label' => Mage::helper('core')->__('None'), 'value' => self::DISPLAY_AREA_NONE],
            ['label' => Mage::helper('core')->__('Sidebar'), 'value' => Sidebar::DISPLAY_AREA],
            ['label' => Mage::helper('core')->__('Cart'), 'value' => Cart::DISPLAY_AREA],
        ];

        return $optionArray;
    }
}