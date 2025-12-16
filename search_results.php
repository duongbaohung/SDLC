<?php
include('db.php');

$search_query = "";
$results = [];

// 1. Check if a search term was submitted via GET method
if (isset($_GET['query']) && !empty($_GET['query'])) {
    // Sanitize the input for safety
    $raw_query = $_GET['query'];
    $search_query = mysqli_real_escape_string($conn, $raw_query);

    // Prepare the search pattern for partial matching (e.g., '%burger%')
    $search_param = "%" . $search_query . "%";

    // 2. Write the SQL query using prepared statements for security
    // Searches in 'product_name' OR 'product_description'
    $stmt = $conn->prepare("SELECT product_id, product_name, product_price, product_image, product_description 
                            FROM product 
                            WHERE product_name LIKE ? OR product_description LIKE ?");
    
    // Check if the prepare statement succeeded
    if ($stmt === false) {
        die("Lỗi chuẩn bị truy vấn: " . $conn->error);
    }

    // 'ss' means two string parameters are being bound
    $stmt->bind_param("ss", $search_param, $search_param);
    
    // 3. Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    // 4. Fetch the results
    while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    $stmt->close();
}
// Close the connection
mysqli_close($conn); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        .product-card {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: auto; /* Clear floats */
        }
        .product-card img {
            max-width: 100px;
            height: auto;
            float: left;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <h1>Results for: "<?php echo htmlspecialchars($raw_query ?? ''); ?>"</h1>
    
    <?php if (empty($results)): ?>
        <p>Can't find any matching product.</p>
    <?php else: ?>
        <p>Found **<?php echo count($results); ?>** products:</p>
        
        <?php foreach ($results as $item): ?>
            <div class="product-card">
                <?php $image_path = "Image/" . htmlspecialchars($item['product_image']); ?>
                <img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>">

                <h2><?php echo htmlspecialchars($item['product_name']); ?> (ID: <?php echo htmlspecialchars($item['product_id']); ?>)</h2>
                <p><strong>Price:</strong> <?php echo number_format($item['product_price']); ?> VND</p>
                <p><strong>Details:</strong> <?php echo htmlspecialchars($item['product_description']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>