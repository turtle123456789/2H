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

   <h1 class="heading">Danh Mục Sản Phẩm</h1>
   <div class="filter-price">
      <span>0 $</span>
      <input type="range" id="priceRange" name="priceRange" min="0" max="100000" step="1" value="50000">
      <span id="priceLabel">100.000 $</span>
   </div>
   <button id="filterButton" style="text-aline=center">Lọc</button>
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
         $minPrice = isset($_GET['minPrice']) ? (int)$_GET['minPrice'] : 0;
         $maxPrice = isset($_GET['maxPrice']) ? (int)$_GET['maxPrice'] : 100000000;
         
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE :category AND price BETWEEN :minPrice AND :maxPrice"); 
         $select_products->bindValue(':category', '%' . $category . '%', PDO::PARAM_STR);
         $select_products->bindParam(':minPrice', $minPrice, PDO::PARAM_INT);
         $select_products->bindParam(':maxPrice', $maxPrice, PDO::PARAM_INT);
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE tag LIKE '%$category%'"); 

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
         <div class="price"><?=number_format($fetch_product['price'],0,".",",") ; ?><span>đ</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="Thêm Vào Giỏ Hàng" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">Không Có Sản Phẩm</p>';
   }
   ?>

   </div>
   <script>
    const priceRange = document.getElementById('priceRange');
    const priceLabel = document.getElementById('priceLabel');
    const filterButton = document.getElementById('filterButton');

    priceRange.addEventListener('input', () => {
        const selectedPrice = priceRange.value;
        priceLabel.innerText =selectedPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " $";
    });

    filterButton.addEventListener('click', () => {
        const minPrice = 0; // Minimum price
        const maxPrice = priceRange.value;
        const newUrl = window.location.pathname + '?category=<?= urlencode($category) ?>&minPrice=' + minPrice + '&maxPrice=' + maxPrice;
        window.location.href = newUrl;
    });
</script>


</section>



<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>