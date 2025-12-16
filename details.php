<?php
// Start the session to maintain cart state and get dynamic cart count
session_start();
include('db.php'); // Include your database connection file

// 1. Get the Product ID from the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = (int)$_GET['id'];
} else {
    // If no valid ID is provided, redirect them back home.
    header('Location: index.php');
    exit();
}

// 2. Fetch all details for the specific product ID
$sql = "SELECT * FROM product WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);

// Check if the product was found
if (mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
    // Extract variables for easier use in HTML
    $product_name = $product['product_name'];
    $product_price = $product['product_price'];
    $product_desc = $product['product_description'] ?? 'No description available.'; // Assuming you have this column
    $product_image = $product['product_image'];
} else {
    // If product ID is not found, redirect home or show a 404 message
    header('Location: index.php?msg=product_not_found');
    exit();
}

// Optional: Calculate dynamic cart count for the header/menu display
$cart_total_count = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart_total_count = array_sum($_SESSION['cart']); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home1.css"> 
    <title>Details: <?php echo $product_name; ?></title>
    <style>
        /* Basic styling for the details page layout */
        .details-container {
            width: 800px;
            margin: 30px auto;
            display: flex;
            gap: 40px;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .details-image {
            flex: 1;
        }
        .details-info {
            flex: 2;
        }
        .details-info h1 {
            margin-top: 0;
        }
        .details-info .price {
            font-size: 1.5em;
            color: #ff6600;
            font-weight: bold;
            margin: 15px 0;
        }
        .details-info .description {
            margin-bottom: 25px;
            line-height: 1.6;
        }
        .details-info a button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        
        <h1 style="text-align: center; margin-top: 20px;">Product Details</h1>

        <div class="details-container">
            
            <div class="details-image">
                <img 
                    src="Image/<?php echo $product_image; ?>" 
                    alt="<?php echo $product_name; ?>" 
                    style="max-width: 100%; height: auto; border: 1px solid #ccc;"
                />
            </div>

            <div class="details-info">
                <h1><?php echo $product_name; ?></h1>
                
                <p class="price">Price: <?php echo $product_price; ?>đ</p>
                
                <h2>Description:</h2>
                <p class="description"><?php echo $product_desc; ?></p>
                
                <a href="add_to_cart.php?id=<?php echo $product_id ?>">
                        <button class='add-to-cart-btn'>Add to Cart</button>
                    </a>
                
                <div style="margin-top: 20px;">
                    <a href="index.php">← Back to Menu</a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>