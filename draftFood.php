<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="home1.css"> 
    <title>Food Delivery Service</title>
</head>
<body>

    <div class="container-fluid p-0"> 
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img id="logo" src="https://kamereo.vn/blog/wp-content/uploads/2019/05/freepik_featured_delivery.jpg" alt="Company Logo" height="40"/> 
                </a>

                <div class="d-flex mx-auto">
                    <form action="search_results.php" method="GET" class="d-flex">
                        <input 
                            type="text" 
                            name="query" 
                            placeholder="Search for food items (e.g., pizza, burger)..." 
                            required
                            class="form-control me-2"
                            style="width: 300px;" 
                        >
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </form>
                </div>

                <div class="cart-icon ms-3">
                    <a href="cart.php" class="text-decoration-none position-relative"> 
                        <span id="cart-count" class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle">0</span> 
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUrlvkVh0V2oeCdZzmtg8pEVwMOZgZnp-N_A&s" alt="Shopping Cart" width="30" height="30"/>
                    </a>
                </div>
            </div>
        </nav>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavMenu" aria-controls="navbarNavMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavMenu">
                    <ul class="navbar-nav">
                        <li class="nav-item"> <a class="nav-link" href="index.html">Home</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="Admin/view_product.html">Products</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="add_product.php">Add product</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="about.html">About</a> </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="row">
                
                <div class="col-md-3">
                    
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Food Categories</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Rice</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Noodles</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Salads</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Banh mi</a></li>
                        </ul>
                    </div>

                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Cuisine</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Western</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Asian</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Latin</a></li>
                        </ul>
                    </div>
                </div> 

                <div class="col-md-9">
                    <h2 class="menu-title mb-4 border-bottom pb-2">Menu Items</h2>
                    
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                        
                        <div class="col">
                            <div class="card h-100 text-center">
                                <img src='com_rang.jpg' class='card-img-top' alt="Fried Rice" style="height: 180px; object-fit: cover;"/>
                                <div class="card-body">
                                    <h5 class="card-title">Fried rice</h5>
                                    <p class="card-text text-danger"><b>Price: 40.000đ</b></p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="details.php?id=1" class="btn btn-sm btn-outline-info">Details</a>
                                    <a href="add_to_cart.php?id=1" class="btn btn-sm btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>

                        <?php
                        // PHP Loop Start
                        include('db.php');
                        // Ensure 'db.php' is available and the database connection is correct
                        $sql = "select * from product";
                        $result = mysqli_query($conn, $sql);
                        while ($row_product = mysqli_fetch_array($result)) {
                            $product_id = $row_product['product_id'];
                            $product_name = $row_product['product_name'];
                            $product_price = $row_product['product_price'];
                            $product_image = $row_product['product_image'];
                            ?>

                            <div class="col">
                                <div class="card h-100 text-center">
                                    <img src="Image/<?php echo $product_image ?>" class='card-img-top' alt="<?php echo $product_name ?> Image" style="height: 180px; object-fit: cover;" />
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $product_name ?></h5>
                                        <p class="card-text text-danger"><b>Price: <?php echo $product_price ?></b></p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <a href="details.php?id=<?php echo $product_id ?>" class="btn btn-sm btn-outline-info">Details</a>
                                        <a href="add_to_cart.php?id=<?php echo $product_id ?>" class="btn btn-sm btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        // PHP Loop End
                        ?>
                        
                        <div class="col">
                            <div class="card h-100 text-center">
                                <img src='pho_ga.jpg' class='card-img-top' alt="Pho Ga" style="height: 180px; object-fit: cover;"/>
                                <div class="card-body">
                                    <h5 class="card-title">Pho Ga</h5>
                                    <p class="card-text text-danger"><b>Price: 50.000đ</b></p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="details.php?id=2" class="btn btn-sm btn-outline-info">Details</a>
                                    <a href="add_to_cart.php?id=2" class="btn btn-sm btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card h-100 text-center">
                                <img src='bun_rieu.jpg' class='card-img-top' alt="Bun Rieu" style="height: 180px; object-fit: cover;"/>
                                <div class="card-body">
                                    <h5 class="card-title">Bun Rieu</h5>
                                    <p class="card-text text-danger"><b>Price: 60.000đ</b></p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="details.php?id=3" class="btn btn-sm btn-outline-info">Details</a>
                                    <a href="add_to_cart.php?id=3" class="btn btn-sm btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="card h-100 text-center">
                                <img src='pho_bo.jpg' class='card-img-top' alt="Pho Bo" style="height: 180px; object-fit: cover;"/>
                                <div class="card-body">
                                    <h5 class="card-title">Pho Bo</h5>
                                    <p class="card-text text-danger"><b>Price: 50.000đ</b></p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="details.php?id=10" class="btn btn-sm btn-outline-info">Details</a>
                                    <a href="add_to_cart.php?id=10" class="btn btn-sm btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>

                    </div> </div> </div> </div> <footer class="footer mt-5 py-3 bg-dark text-white-50">
            <div class="container text-center">
                <p class="mb-0">Footer content goes here | &copy; 2025 Food Delivery Service</p>
            </div>
        </footer>

    </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>