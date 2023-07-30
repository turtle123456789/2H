<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">2H<span>.</span></a>

      <nav class="navbar">
         <a href="home.php"onmouseover="hideNavbar2()">Trang Chủ</a>
         <a href="about.php"onmouseover="hideNavbar2()">Giới Thiệu</a>
         <a href="orders.php"onmouseover="hideNavbar2()">Đơn Hàng</a>
         <a href="shop.php" class="link-navbar2" onmouseover="showNavbar2()">Sản Phẩm</a>
         <a href="contact.php"onmouseover="hideNavbar2()">Liên Hệ</a>
      </nav>

      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>
   <section class="navbar2" id="navbar2" onmouseleave="hideNavbar2()">
      <ul>
         <span>Thời Trang Nam</span>
         <li><a href="category.php?category=áo sơ mi nam">Áo sơ mi nam</a></li>
         <li><a href="category.php?category=áo khoác nam">Áo khoác nam</a></li>
         <li><a href="category.php?category=áo phông nam">Áo phông nam</a></li>
         <li><a href="category.php?category=lv">Quần jean nam</a></li>
         <li><a href="category.php?category=lv">Quần kaki nam</a></li>
         <li><a href="category.php?category=lv">Giày thể thao nam</a></li>
         <li><a href="category.php?category=lv">Phụ kiện nam</a></li>
      </ul>
      <ul>
         <span>Thời Trang Nữ</span>
         <li><a href="category.php?category=áo blazer nữ">Áo blazer nữ</a></li>
         <li><a href="category.php?category=áo sơ mi nữ">Áo sơ mi nữ</a></li>
         <li><a href="category.php?category=giày nữ">Giày nữ</a></li>
         <li><a href="category.php?category=váy">Váy</a></li>
         <li><a href="category.php?category=túi xách nữ">Túi xách nữ</a></li>
      </ul>
      <ul>
         <span>Thời Trang Trẻ Em</span>
         <li><a href="category.php?category=quần áo trẻ em nam">Quần áo trẻ em nam</a></li>
         <li><a href="category.php?category=quần áo trẻ em nữ">Quần áo trẻ em nữ</a></li>
         <li><a href="category.php?category=giày tre em">Giày trẻ em</a></li>
         <li><a href="category.php?category=phụ kiện trẻ em">Phụ kiện trẻ em</a></li>
      </ul>
      <ul>
         <span>Phụ Kiện</span>
         <li><a href="category.php?category=Mũ nón">Mũ nón</a></li>
         <li><a href="category.php?category=Dây nịt">Dây nịt</a></li>
         <li><a href="category.php?category=Ví túi sách">Ví và túi xách</a></li>
         <li><a href="category.php?category=trang sức">Trang sức</a></li>
         <li><a href="category.php?category=đòng hồ">Đồng hồ</a></li>
         <li><a href="category.php?category=kính mắt">Kính mắt</a></li>
      </ul>
      <ul>
         <span>Thương Hiệu</span>
         <li><a href="category.php?category=lv">LOUIS VUITTON</a></li>
         <li><a href="category.php?category=gucci">GUCCI</a></li>
         <li><a href="category.php?category=burberry">BURBERRY</a></li>
         <li><a href="category.php?category=hermes">HERMES</a></li>
         <li><a href="category.php?category=chanel">CHANEL</a></li>
         <li><a href="category.php?category=dior">DIOR</a></li>
         <li><a href="category.php?category=balenciaga">BALENCIAGA</a></li>
         <li><a href="category.php?category=rolex">ROLEX</a></li>
      </ul>
   </section>
   <script>
      const linkNavbar2 = document.querySelector('.link-navbar2');
      const navbar2 = document.getElementById('navbar2');
      function showNavbar2() {
         navbar2.style.display = 'flex';
      }

      function hideNavbar2() {
         navbar2.style.display = 'none';
      }
</script
   </script>
</header>