**Magento 1 Module Experius DonationProduct (IN DEVELOPMENT)**

The module adds a new product type: Donation product. 
This product can be shown in different places on the website.

---

**Configuration**

System->Configuration->Experius Donation:Donation.

***Settings***
- Enable/Disable
- Minimal Donation Amount
- Maximal Donation Amount
- Fixed Donation Amounts

***Layout***

Defines, where the products can be shown

- Show in Sidebar (category page etc.) - yes/no
- Sidebar title - Title above the donation block
- Show image in sidebar - If the product image should be shown
- Sidebar image size
- Sidebar text - Text in the donation block
- Show in Cart
- Cart title
- Show image in cart
- Cart image size
- Cart text

**Adding a product**


1. Add a new prduct of type "Donation product"
2. Add name, descriptions, status, sku, tax class, images
3. Set "Manage stock" to "No"
4. Add the product to the needed website
5. Configure the attributes in the tab "Donation product"

---

**To do list**
- [x] Add translations (at least DE and FR)
- [ ] Update modman
- [ ] Add composer.json
- [ ] Add loader for ajax requests
- [ ] Add session message after adding product to cart
- [x] Make the setting "Enable" work
- [x] Add default values for attributes and configuration
- [ ] Implement a widget that can be built in any CMS block or page
- [ ] Display in checkout
 