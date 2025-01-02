
Product Inventory Management System

This is a simple PHP-based product inventory management system that allows users to add products, view the list of products with their details, and track stock status. It uses a JSON file to store product data persistently.
Features

    Add a New Product: Allows users to input a product's name, price, and stock quantity.
    View Product List: Displays a table showing all products, including their names, prices, stock quantity, and stock status (In Stock, Low Stock, Out of Stock).
    Stock Status: The system determines whether a product is "In Stock", "Low Stock", or "Out of Stock" based on its quantity.
    Total Price Calculation: Displays the total price of all products in the inventory.

Technologies Used

    PHP: Server-side scripting language to handle form submissions and manage the inventory.
    Bootstrap 5: Front-end framework for building responsive, mobile-first websites.
    HTML5, CSS3: Markup and styling for creating the web pages.
    JSON: Data format used to store product data in a file (products.json).

Installation

    Clone the repository to your local machine or download the ZIP file.
    Place the files in your server's root directory or use a local server like XAMPP or WAMP.
    Ensure the products.json file is writable by the server (set proper permissions).
    Open the project in your browser.

Usage

    To add a new product, fill in the "Product Name," "Price," and "Stock Quantity" in the form and click "Add Product."
    The product will be added to the inventory, and the list will update automatically.
    The total price of all products will also be displayed on the page.
