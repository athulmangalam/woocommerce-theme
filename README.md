# WooCommerce Theme Customization

This repository contains a simple child theme of Twenty Twenty-Five adding custom product and cart templates.

## Folder Structure

- `wp-content/themes/twentytwentyfive-child` – child theme directory
  - `functions.php` – registers meta fields for gifts and recommended products and enqueues CSS/JS.
  - `style.css` – basic theme header.
  - `js/main.js` – handles basic pricing logic on the product page.
  - `woocommerce/` – template overrides
    - `single-product.php` – custom product layout with radio buttons for purchase modes.
    - `cart/cart.php` – custom cart template showing gifts and a pincode estimator.

## Pricing Rules

Subscription prices are calculated at 25% off the regular price. Both regular and subscription prices receive an additional 20% sale discount. The JavaScript in `js/main.js` demonstrates how this is applied on the product page when the customer switches purchase modes.

## Meta Fields

Two custom product meta fields can be configured on the product edit screen:

- **Gift Product IDs** (`_ttf_gifts`): comma separated list of product IDs displayed as gifts in the cart.
- **Recommended Product IDs** (`_ttf_recommended`): comma separated IDs of products suggested on the cart page if not already in the cart.

These fields are saved with the product via `functions.php` and can be used in templates.

## Packaging the Theme

Binary files are not tracked in this repository. To create an installable archive, run:

```bash
zip -r twentytwentyfive-child.zip wp-content/themes/twentytwentyfive-child
```

Upload the resulting `twentytwentyfive-child.zip` through **Appearance → Themes → Add New → Upload Theme** in your WordPress admin.
