<?php

class Experius_DonationProduct_Block_Cart extends Experius_DonationProduct_Block_Widget
{
    const DISPLAY_AREA = 'cart';

    protected $_configPrefix = 'cart';

    public function getProductCollection()
    {
        if (empty($this->_collection)) {
            $this->_collection = parent::getProductCollection();

            $this->_collection->addAttributeToSelect('show_in_cart_with_sku');
            $this->_collection->addAttributeToFilter('display_area', ['finset' => self::DISPLAY_AREA]);

            $restrictedCollection = clone $this->_collection;
            $loadedIds = $this->getAllowedProductIds($restrictedCollection);

            // set id filter to allowed ids or set it to an not existing ID to get an empty collection
            // it important to keep it as a collection so e.g. getSize() works correctly
            $this->_collection->addIdFilter($loadedIds ?: 'none');
        }

        return $this->_collection;
    }

    /**
     * Get product IDs that are allowed to be used in cart
     *
     * @param Mage_Catalog_Model_Resource_Product_Collection $restrictedCollection
     * @return array
     */
    protected function getAllowedProductIds($restrictedCollection)
    {
        /** @var Mage_Sales_Model_Quote $quote */
        $quote = Mage::getSingleton('checkout/session')->getQuote();

        $skusInCart = [];
        /** @var Mage_Sales_Model_Quote_Item $item */
        foreach ($quote->getAllItems() as $item) {
            $skusInCart[] = $item->getSku();
        }

        // unfortunately there is no nice way to use addAttributeToFilter() for multiple values against a string field
        // so let's load the collection and iterate
        foreach ($restrictedCollection as $id => $product) {
            $allowedSkus = array_filter(array_map('trim', explode(',', $product->getData('show_in_cart_with_sku'))));
            if (!empty($allowedSkus) && !array_intersect($allowedSkus, $skusInCart)) {
                $restrictedCollection->removeItemByKey($id);
            }
        }

        return $restrictedCollection->getLoadedIds();
    }
}
