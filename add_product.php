<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="add_product.css"/>
    <title>Add product</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Product ID:</td>
            <td><input type="text" name="product_id"></td>
        </tr>
        <tr>
            <td>
                Product Name:
            </td>
            <td>
            <input type="text" name="product_name">
            </td>
        </tr>
        <tr>
            <td>
                Price:
            </td>
            <td>
            <input type="text" name="product_price">
            </td>
        </tr>
        <tr>
            <td>
                Amount:
            </td>
            <td>
            <input type="text" name="quantity">
            </td>
        </tr>
        <tr>
            <td>
                Image:
            </td>
            <td>
            <input type="file" name="product_img">
            </td>
        </tr>
        <tr>
            <td>
                Description:
            </td>
            <td>
            <input type="text" name="product_description">
            </td>
        </tr>
        <tr>
            
            <td>
            <input type="submit" name="add_product" value="Add new">
            </td>
        </tr>
    </table>
    </form>
<?php
  //B1: Kết nối và chọn CSDL
  include 'db.php';
  //B2: Viết câu truy vấn
  if(isset($_POST['add_product'])){
    //Nhận dữ liệu từ form
    $product_id =$_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price =$_POST['product_price'];
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    
    $product_description = $_POST['product_description'];


    // chú ý nhận dữ liệu kiểu file từ Form
    $product_img = $_FILES['product_img']['name'];
    //upload file vào thư mục tạm trong htdocs
    $product_img_tmp = $_FILES['product_img']['tmp_name'];
    //Di chuyển file vào thư mục Image/DemoWebsite (thư mục cần lưu trên host)
    move_uploaded_file($product_img_tmp,"Image/$product_img");


    $sql = "INSERT INTO Product (product_id, product_name, product_price, product_quantity, product_image, product_description) 
        VALUES ('$product_id', '$product_name', '$product_price', '$quantity', '$product_img', '$product_description')";


    //B3: Thực thi truy vấn
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Thêm sản phẩm thành công') </script>";
    }
    else{
        echo "<script>alert('Thêm sản phẩm thất bại') </script>";
    }


  }


?>

</body>
</html>