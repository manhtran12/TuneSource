<?php
require_once("inc/conn.php");
include('inc/header.php');
?>
<div class="row">
  <div class="leftcolumn">
   
    <?php
      // ?page=2 => $_GET['page'] = 3 => 
 
        if(!empty($_GET['page']))
        {
          $page=$_GET['page']-1;
        }
        else
        {
          $page =0;
        }

    //$page = !empty($_GET['page']) ? ($_GET['page'] - 1): 0 ; //lay page hien tai
      $product_per_page = 6; //1 trang 3 sp 
            $offset = $product_per_page * $page; //offset chinh la phan can bo qua 

      $sql = "SELECT * FROM product LIMIT $offset,$product_per_page"; 
      $rs = mysqli_query($conn, $sql);

      if( mysqli_num_rows($rs) > 0 ){
        while( $row = mysqli_fetch_assoc($rs) ){
      ?>
            <a href="single-product.php?id=<?php echo $row['product_id']?>" class="product">
                 <h2 class="product-title"><?php echo $row['product_name'] ?></h2>
                 <img style="width: 280px; height: 280px;" class="product-image" src="images/<?php echo $row['product_images'] ?>" />
                 <div><audio id='audio_1' controls preload  loop controlsList="nodownload"><source src='file/<?php echo $row['product_file'] ?>' /></audio></div>
                 </a>
    <?php 

        }//end while 

      }//check so hang tra ve > 0 
?>

<div style="float: left; width: 100%"><?php  include('inc/pagination.php');?></div>
  </div>

 <!-- END left column -->
 <?php
 include('inc/footer.php')
 ?>