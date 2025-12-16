<?php
session_start();
// Include your database connection (not strictly needed here, but good practice)
include('db.php'); 

// Check if the product ID is passed
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = (int)$_GET['id'];
    
    // Check if the cart exists and the item is in the cart
    if (isset($_SESSION['cart']) && array_key_exists($product_id, $_SESSION['cart'])) {
        // Remove the item from the cart array
        unset($_SESSION['cart'][$product_id]);
    }
}

// Redirect back to the shopping cart page to show the updated list
header('Location: cart.php');
exit();
?>