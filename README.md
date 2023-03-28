#Shoe Shopping Web App
This is a PHP-based web application for an online shoe store, with shopping cart functionality.

#Getting started
Before using this application, ensure that PHP and a web server (e.g. Apache) are installed on your computer.

##Clone the repository to your local machine:
bash
git clone https://github.com/huy-devsg/g-snaker.git
Navigate to the g-snaker directory:
bash
cd g-snaker
Copy the app/data/shoes.json.example file and rename it to app/data/shoes.json:
bash

cp app/data/shoes.json.example app/data/shoes.json
Edit the app/data/shoes.json file to add your products.

##Start your web server and navigate to the application in your browser.

#Features
Displaying products
The application reads the app/data/shoes.json file to display a list of shoes on the home page.

Adding items to the cart
The user can add items to their cart by clicking the "ADD TO CART" button next to the item. If the item is already in the cart, the quantity will be incremented.

Updating the cart
The user can update the quantity of an item in their cart by clicking the "UP" or "DOWN" buttons next to the item.

Removing items from the cart
The user can remove an item from their cart by clicking the "REMOVE" button next to the item.

Displaying the cart
The user can view the items in their cart by clicking the "Your cart" button in the navigation bar. The total price of the items in the cart is also displayed.

Code
The main functionality of the application is implemented in index.php. The app/data/shoes.json file contains the product data.

When the user adds an item to the cart, the item is stored in a session variable. The session variable is also used to display the items in the cart and update the cart as necessary.
