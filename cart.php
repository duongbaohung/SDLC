<?php
session_start();
include('db.php'); 

$cart_items = array();
$total_price = 0;
$total_items = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    
    // Get list of product IDs and calculate total quantity
    $ids = array_keys($_SESSION['cart']);
    $ids_string = implode(',', $ids);
    
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $total_items += $quantity;
    }

    // Fetch details for all items from the database
    $sql = "SELECT product_id, product_name, product_price, product_image FROM product WHERE product_id IN ($ids_string)";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['product_id'];
        $quantity = $_SESSION['cart'][$id];
        $price_db = $row['product_price'];
        
        // Ensure price is numeric for calculation (remove formatting like 'đ' or commas)
        $numeric_price = (float)preg_replace('/[^\d\.]/', '', $price_db); 
        
        $subtotal = $numeric_price * $quantity;
        $total_price += $subtotal;

        $cart_items[] = array(
            'id' => $id,
            'name' => $row['product_name'],
            'image' => $row['product_image'],
            'price' => $price_db, // Display price as stored in DB
            'quantity' => $quantity,
            // Display subtotal formatted as currency (e.g., 60,000đ)
            'subtotal' => number_format($subtotal, 0, ',', '.') . 'đ'
        );
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home1.css"> 
    <title>Shopping Cart</title>
    <style>
        /* Basic cart table styling */
        .cart-container { width: 900px; margin: 30px auto; }
        .cart-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .cart-table th, .cart-table td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .cart-table th { background-color: #f8f8f8; }
        .cart-summary { margin-top: 20px; text-align: right; font-size: 1.2em; }
        .cart-actions { text-align: center; padding: 20px 0; }
        .cart-actions button, .cart-actions a button { padding: 10px 20px; margin: 0 10px; cursor: pointer; border: none; }
        .cart-actions .checkout-btn { background-color: green; color: white; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="cart-container">
            <h1 style="text-align: center;">Your Shopping Cart</h1>

            <?php if (empty($cart_items)): ?>
                <p style="text-align: center; padding: 50px;">Your cart is currently empty. Start shopping <a href="index.php">here</a>.</p>
            <?php else: ?>
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><img src="Image/<?php echo $item['image']; ?>" width="50" height="50" alt="<?php echo $item['name']; ?>"></td>
                            <td><?php echo $item['price']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['subtotal']; ?></td>
                            <td>
                                <a href="remove_from_cart.php?id=<?php echo $item['id']; ?>" style="color: red;">Remove</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="cart-summary">
                    <p>Total Items: **<?php echo $total_items; ?>**</p>
                    <p>Grand Total: **<?php echo number_format($total_price, 0, ',', '.') . 'đ'; ?>**</p>
                </div>

                <div class="cart-actions">
                    <a href="index.php"><button>Continue Shopping</button></a>
                    <a href="checkout.php"><button class="checkout-btn">Proceed to Checkout</button></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>