<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home1.css">
    <title>Document</title>
</head>
<body>

    <div class="wrapper">
        <div class="header"> 
            <div class="logo"> 
                <a href="index.php">
                    <img id="logo" src="https://kamereo.vn/blog/wp-content/uploads/2019/05/freepik_featured_delivery.jpg" alt="Company Logo"/> 
                </a>
            </div>
            <div id="form_search">
                <form action="search_results.php" method="GET">
                <input 
                    type="text" 
                    name="query" 
                    placeholder="Search for food items (e.g., pizza, burger)..." 
                    required
                >
                <button type="submit">Search</button>
                </form>
            </div>
            <div class="cart-icon">
            <a href="cart.php"> <span id="cart-count">0</span> 
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUrlvkVh0V2oeCdZzmtg8pEVwMOZgZnp-N_A&s" alt="Shopping Cart" width="30" height="30"/>
            </a>
            </div>
        </div>
    <div class="menu">
        <ul>
            <li> <a href="index.php"><b> Home</b></a> </li>
            <li> <a href="manage_roles.php"><b>Manage</b></a></li>
            <li><a href="add_product.php"><b>Add product</b></a> </li>
            <li><a href="login.php"><b>Login/Register</b> </a></li>
        </ul>
    </div>
    <div class ="content">
        <div class ="left">
            <h3> Food </h3>
            <div class="category">
                <ul>
                    <li> <a href="#">Rice </a></li>
                    <li> <a href="#">Noodles </a></li>
                    <li> <a href="#">Salads </a></li>
                    <li> <a href="#">Banh mi </a></li>
                </ul>
            </div>
            <h3> Cuisine </h3>
            <div class="brand">
                <ul>
                    <li> <a href="#">Western </a></li>
                    <li> <a href="#">Asian </a></li>
                    <li> <a href="#">Latin </a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <h2 class="menu-title"> Menu </h2>
            <div class ="products_box">
            
            

            <?php
            // PHP Loop Start
            include('db.php');
            $sql = "select * from product";
            $result = mysqli_query($conn, $sql);
            while ($row_product = mysqli_fetch_array($result)) {
                $product_id = $row_product['product_id'];
                $product_name = $row_product['product_name'];
                $product_price = $row_product['product_price'];
                $product_image = $row_product['product_image'];

                ?>

                <div class="single_product">
                    <h3><?php echo $product_name ?></h3>
                    <img src="Image/<?php echo $product_image ?>" width='180' height='180' alt="<?php echo $product_name ?> Image" />
                    <p><b> Price: <?php echo $product_price ?></b></p>
                    <a href="details.php?id=<?php echo $product_id ?>">Details</a>
                    <a href="add_to_cart.php?id=<?php echo $product_id ?>">
                        <button class='add-to-cart-btn'>Add to Cart</button>
                    </a>
                </div>
                <?php
            }
            // PHP Loop End
            ?>
            
            <div class='single_product'>
                <h3>Pho Ga</h3>
                <img src='pho_ga.jpg' width='180' height='180' alt="Pho Ga"/>
                <p><b> Price:50.000đ </b></p>
                <a href="details.php?id=2">Details</a>
                <a href="add_to_cart.php?id=2">
                  <button class='add-to-cart-btn'>Add to Cart</button>
              </a>
            </div> 
            <div class='single_product'>
                <h3>Bun Rieu</h3>
                <img src='bun_rieu.jpg' width='180' height='180' alt="Bun Rieu"/>
                <p><b> Price:60.000đ </b></p>
                <a href="details.php?id=3">Details</a>
                <a href="add_to_cart.php?id=3">
                  <button class='add-to-cart-btn'>Add to Cart</button>
              </a>
            </div> 
            <div class='single_product'>
                <h3>Pho Bo</h3>
                <img src='pho_bo.jpg' width='180' height='180' alt="Pho Bo"/>
                <p><b> Price:50.000đ </b></p>
                <a href="details.php?id=10">Details</a>
                <a href="add_to_cart.php?id=10">
                  <button class='add-to-cart-btn'>Add to Cart</button>
              </a>
            </div> 

        </div>
    </div>
</div>
<div class="footer">
    <p> FFoodDeli 2025-2030 </p>
</div>
</div>
</body>

</html>