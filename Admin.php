<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="header"> 
            <div class="logo"> 
              <img id="logo" src="images/btec.jpg" /> <!--https://kamereo.vn/blog/wp-content/uploads/2019/05/freepik_featured_delivery.jpg-->
          </div><!--/.header_logo-->
          <div id="form_search">
             <form method="get" action="" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Search a Product" />
                <input type="submit" name="search" value="Search" />
            </form>
        </div> 
    </div>
    <!-- end header --> 
    <div class="menu">
        <ul>
            <li> <a href="index.html"> Trang chủ </a> </li>
            <li> <a href="Admin/view_product.html">Quản lý sản phẩm </a></li>
            <li><a href="Admin/add_product.html"> Thêm sản phẩm </a> </li>
            <li><a href="about.html"> Giới thiệu </a></li>
        </ul>
    </div>
    <div class ="content">
        <div class ="left">
           <p> Food </p>
           <div class="category">
              <ul>
                <li> <a href="#">Rice </a></li>
                <li> <a href="#">Noodles </a></li>
                <li> <a href="#">Salads </a></li>
                <li> <a href="#">Banh mi </a></li>
            </ul>
        </div>
        <p > Cuisine </p>
        <div class="brand">
          <ul>
            <li> <a href="#">Western </a></li>
            <li> <a href="#">Asian </a></li>
            <li> <a href="#">Latin </a></li>
        </ul>
    </div>
</div>
<div class="right">
    <p style="text-align: center;font-size: 20px"> Menu </p>
    <div class ="products_box">
      <div class='single_product'>
        <h3>Fried rice</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:40.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 
    <div class='single_product'>
        <h3>Pho Ga</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:50.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 
    <div class='single_product'>
        <h3>Bun Rieu</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:60.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 
    <div class='single_product'>
        <h3>Pho Cuon</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:45.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 
    <div class='single_product'>
        <h3>Bun Cha</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:60.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 
    <div class='single_product'>
        <h3>Banh Mi</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:25.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 
    <div class='single_product'>
        <h3>Banh Cuon</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:40.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 
    <div class='single_product'>
        <h3>Bun Ca</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:60.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 
    <div class='single_product'>
        <h3>Pho Bo</h3>
        <img src='images/iphone.jpg' width='180' height='180' />
        <p><b> Price:50.000đ </b></p>
        <a href="">Details</a>
        <a href="">
          <button style='float:right'>Add to Cart</button>
      </a>            
    </div> 

</div>
</div>
</div>
<div class="footer">
    <p> footer </p>
</div>
</div>
</body>

</html>