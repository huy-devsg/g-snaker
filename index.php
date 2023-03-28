<?php
session_start();

$data = file_get_contents('app/data/shoes.json');
$shoes = json_decode($data, true)['shoes'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'add' && isset($_GET['id'])) {
        $id = $_GET['id'];
        if (!isset($_SESSION['cart'][$id])) {
            $shoe = array_filter($shoes, function ($s) use ($id) {
                return $s['id'] == $id;
            });
            $shoe = array_values($shoe)[0];
            $item = array(
                'id' => $id,
                'name' => $shoe['name'],
                'price' => $shoe['price'],
                'image' => $shoe['image'],
                'quantity' => 1
            );
            $_SESSION['cart'][$id] = $item;
        } else {
            $_SESSION['cart'][$id]['quantity']++;
        }
    } elseif ($_GET['action'] == 'up' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['cart'][$id]['quantity']++;
    } elseif ($_GET['action'] == 'down' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['cart'][$id]['quantity']--;
        if ($_SESSION['cart'][$id]['quantity'] <= 0) {
            // Remove item from cart if quantity is zero or less
            unset($_SESSION['cart'][$id]);
        }
    } elseif ($_GET['action'] == 'remove' && isset($_GET['id'])) {
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
    }
}

$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'] * $item['quantity'];
}
$_SESSION['total_price'] = number_format($total_price, 2);

?>
<html>
    <head>
        <base href="http://localhost/webdev/"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" href="app/assets/favicon.ico">
        <title>Golden Sneaker</title>
        <link href="css/style.css" rel="stylesheet">

    </head>
    <body>
        <div class="main">
            <div class="product_cart">
                <div class="icon_nike">
                    <img src="app/assets/nike.png" class="icon_nike_logo"></div>
                    <div class="product_card_title">Our Products</div>
                    <div class="product_card_body">
                            <?php
                                foreach ($shoes as $shoe) {
                                    $id = $shoe['id'];
                                    $image = $shoe['image'];
                                    $name = $shoe['name'];
                                    $description = $shoe['description'];
                                    $price = number_format($shoe['price'], 2);
                                    $added = false;
                                    foreach ($_SESSION['cart'] as $item) {
                                        if ($item['id'] == $id) {
                                            $added = true;
                                            break;
                                        }
                                    }
                                    echo '<div class="product_item">
                                    <div class="product_image-bg_left">
                                        <img src="' . $image . '" >
                                    </div>
                                    <div class="product_item-name_left">'.$shoe['name'].'</div>
                                    <div class="product_item-description_left">' . $shoe['description'] . '</div>
                                    <div class="product_add_item">
                                    <div class="product_item-price_left">$ ' . $shoe['price']. '</div>';
                                    if ($added) {
                                        echo '<div class="product_add_button_added"><img src="app/assets/check.png" width="70%"></div>';
                                    } else {
                                        echo '<button class="product_add_button" type="submit" onclick="location.href=\'add/'.$id.'\'">ADD TO CART</button>';
                                    }
                                    echo '</div>
                                    </div>';
                                }
                            ?>
                </div>
            </div>
            <div class="product_cart">
                <div class="icon_nike"><img src="app/assets/nike.png" class="icon_nike_logo"></div>
                <div class="product_card_title">Your cart
                    <span class="total_Price">
                    <?php if(!isset($_SESSION['total_price']))
                            {
                                echo '$0.00';
                            }
                            else
                            {
                                echo '$'.$_SESSION['total_price'];
                            }
                ?>
                    </span>
                </div>
                <div class="product_card_body">
                <?php
                if(empty($_SESSION['cart']))
                {
                    echo 'Your cart is empty.';
                }
                else
                {
                    foreach ($shoes as $shoe) {
                        $id = $shoe['id'];
                        $image = $shoe['image'];
                        $name = $shoe['name'];
                        $description = $shoe['description'];
                        $price = number_format($shoe['price'], 2);
                        $added = false;
                        foreach ($_SESSION['cart'] as $item) {
                            if ($item['id'] == $id) {
                                $added = true;
                            ?>
                                <div class="product_item_right">
                                    <div class="product_item_right_left">
                                        <div class="product_item-image_right" style="background-color: rgb(242, 245, 244);">
                                            <img src="<?php echo $image ?>">
                                    </div>
                                </div>
                                <div class="product_item_right_left">
                                    <div class="product_item-name_right">
                                        <?php echo $name ?>
                                    </div>
                                    <div class="product_item-price_right">
                                        $<?php echo $price ?>
                                    </div>
                                    <div class="product_item-action_right">
                                        <div class="product_item-count_right">
                                            <button class="up_down_button" id="down_button" onclick="location.href='down/<?php echo $id ?>'">
                                                <img src="app/assets/minus.png" width="50%">
                                            </button>
                                            <div class="product_item-quantity_number_right">
                                                <?php echo $item['quantity'] ?>
                                            </div>
                                            <button class="up_down_button"  id="up_button" onclick="location.href='up/<?php echo $id ?>'">
                                                <img src="app/assets/plus.png" width="50%">
                                            </button>
                                        </div>
                                        <div class="product_item-remove_right">
                                        <button style="border:none;background-color:transparent;cursor: pointer;" onclick="location.href='remove/<?php echo $id ?>'">
                                            <img src="app/assets/trash.png">
                                        </button>
                                        </div>
                                        </div>
                                </div>
                        </div>
            <?php
                            }
                        }
                    }
                }
            ?>
            </div>
        </div>
    </body>
</html>