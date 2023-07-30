<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="products">

   <h1 class="heading">Phân Loại</h1>
   <div class="filter">
      <span>Loại Sản Phẩm</span>
      <li><a href="category.php?category=giày">Giày</a></li>
      <li><a href="category.php?category=kính">Kính</a></li>
      <li><a href="category.php?category=áo">Áo</a></li>
      <li><a href="category.php?category=đồng hồ">Đồng Hồ</a></li>
      <li><a href="category.php?category=túi sách">Túi Sách</a></li>
      <li><a href="category.php?category=phụ kiện">Phụ Kiện</a></li>
      <span>Giới Tính</span>
      <li><a href="category.php?category=Nam">Nam</a></li>
      <li><a href="category.php?category=Nữ">Nữ</a></li>
      <li><a href="category.php?category=Trẻ con">Trẻ Con</a></li>
      <span>Giá</span>
      <li><a href="category.php?category=price_greater_than_5000">lớn hơn 5000</a></li>
      <li><a href="category.php?category=price_less_than_5000">nhỏ hơn 5000</a></li>
      <span>Thương Hiệu</span>
      <li><a href="category.php?category=lv">LOUIS VUITTON</a></li>
      <li><a href="category.php?category=gucci">GUCCI</a></li>
      <li><a href="category.php?category=burberry">BURBERRY</a></li>
      <li><a href="category.php?category=hermes">HERMES</a></li>
      <li><a href="category.php?category=chanel">CHANEL</a></li>
      <li><a href="category.php?category=dior">DIOR</a></li>
      <li><a href="category.php?category=balenciaga">BALENCIAGA</a></li>
      <li><a href="category.php?category=rolex">ROLEX</a></li>
   </div>
   <div class="box-container">

   <?php
     $category = $_GET['category'];
     $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$category}%'"); 
      if ($category === 'price_greater_than_5000') {
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE price > 5000");
      } else {
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%$category%'");
      }
      if ($category === 'price_less_than_5000') {
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE price < 5000");
      } else {
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%$category%'");
      }
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><?= $fetch_product['price']; ?><span>$</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>