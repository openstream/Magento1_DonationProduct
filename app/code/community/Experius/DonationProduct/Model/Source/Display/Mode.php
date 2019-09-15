<?php
class Experius_DonationProduct_Model_Source_Display_Mode extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    const MODE_FIXED = 'fixed';
    const MODE_INPUT = 'input';
    const MODE_BOTH = 'both';

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $optionArray = [
            ['label' => Mage::helper('core')->__('Fixed Amounts'), 'value' => self::MODE_FIXED],
            ['label' => Mage::helper('core')->__('User Input'), 'value' => self::MODE_INPUT],
            ['label' => Mage::helper('core')->__('Both'), 'value' => self::MODE_BOTH],
        ];

        return $optionArray;
    }
}