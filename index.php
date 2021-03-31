
<link rel="stylesheet" type="text/css" href="css.css">
<?php
require_once("inc/conn.php");
include('inc/header.php');
?>
<h1 style="color: white">Music list</h1>
<div class="row">
  <div style="  float: right; width: 100%;">
   
    <?php
        if(!empty($_GET['page']))
        {
          $page=$_GET['page']-1;
        }
        else
        {
          $page =0;
        }
      $product_per_page = 6; //1 trang 3 sp 
            $offset = $product_per_page * $page; //offset chinh la phan can bo qua 

      $sql = "SELECT * FROM product LIMIT $offset,$product_per_page"; 
      $rs = mysqli_query($conn, $sql);

      if( mysqli_num_rows($rs) > 0 ){
        while( $row = mysqli_fetch_assoc($rs) ){
      ?>
            <a href="single-product.php?id=<?php echo $row['product_id']?>" class="product" style="height: 400px">
                 <h2 class="product-title"><?php echo $row['product_name'] ?></h2>
                 <img style="width: 280px; height: 280px;" class="product-image" src="images/<?php echo $row['product_images'] ?>" />
                 <div><audio id='audio_1' controls preload  loop controlsList="nodownload"><source src='file/<?php echo $row['product_file'] ?>' /></audio></div>
                 </a>
    <?php 
        }//end while 
      }//check so hang tra ve > 0 
?>
</div>
 <div style="float: left; width: 100%"><?php  include('inc/pagination.php');?></div>
</div>

<?php

include('inc/footer.php')
?>
