# Shoe Shopping Web App
This is a `PHP-based` web application for an online shoe store, with shopping cart functionality.


[Video Demo](https://www.youtube.com/watch?v=o6MQLv2m3r8)


## Getting started
Before using this application, ensure that PHP and a web server (e.g. Apache) are installed on your computer.

1. Clone the repository to your local machine:
`git clone https://github.com/huy-devsg/g-snaker.git`
2. Navigate to the g-snaker directory:
`cd g-snaker`
3. Edit the app/data/shoes.json file to add your products.
4. Start your web server and navigate to the application in your browser.

# Features
## Displaying products
The application reads the `app/data/shoes.json` file to display a list of shoes on the home page.

## Adding items to the cart
The user can add items to their cart by clicking the `ADD TO CART` button next to the item. If the item is already in the cart, the quantity will be incremented.

## Updating the cart
The user can update the quantity of an item in their cart by clicking the `UP` or `DOWN` buttons next to the item.

## Removing items from the cart
The user can remove an item from their cart by clicking the `REMOVE` button next to the item.

## Displaying the cart
The user can view the items in their cart by clicking the `Your cart` button in the navigation bar. The total price of the items in the cart is also displayed.

# Code
The main functionality of the application is implemented in `index.php`. The `app/data/shoes.json` file contains the product data.

When the user adds an item to the cart, the item is stored in a session variable. The session variable is also used to display the items in the cart and update the cart as necessary.


[Video Demo](https://www.youtube.com/watch?v=o6MQLv2m3r8)

