<?php
// Start the session at the very beginning
session_start(); 

// Include your database connection file
include('db.php'); 

// Check if a product ID was passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = (int)$_GET['id'];
} else {
    // If no valid ID, redirect back home
    header('Location: index.php');
    exit();
}

// 1. Initialize the cart array if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// 2. Check if the product is already in the cart
if (array_key_exists($product_id, $_SESSION['cart'])) {
    // If yes, increment the quantity
    $_SESSION['cart'][$product_id]++;
} else {
    // If no, add the product with a quantity of 1
    $_SESSION['cart'][$product_id] = 1;
}

// Optional: Display a confirmation message or redirect back to the page
// For simplicity, we'll redirect back to the home page (index.php)
header('Location: index.php'); 
exit();
?>