<?php 
session_start();
require_once("inc/conn.php");
include("inc/header.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$id =$_POST['id'];

	if (empty($_SESSION['cart'][$id])) {
		$q=mysqli_query($conn,"SELECT * FROM product WHERE product_id = {$id}");
		$product = mysqli_fetch_assoc($q);
		$_SESSION['cart'][$id]=$product;
		$_SESSION['cart'][$id]['sl']=$_POST['sl'];
	}else{
		$sMoi = $_SESSION['cart'][$id]['sl'] + $_POST['sl'];
		$_SESSION['cart'][$id]['sl']=$sMoi;
	}
 }
 ?>
 <div class="container-fluid">
 <div class="row">
 	<link rel="stylesheet" type="text/css" href="cart.css">
 	<h3 class="giohang" style="color: white"><i class="fas fa-shopping-cart" style="color: white"></i>  Cart</h3>
 	<?php 
 	if (!empty($_SESSION['cart'])) {
 		foreach ($_SESSION['cart'] as $item) :
 		?>
 		<div class="products">
 	 	<div style="margin-left: 500px;height: 300px; width: 100%">
          <a href="single-product.php?product_id=<?php echo $row['product_id']?>" class="product">
       <h2 class="product-title"><?php echo $item['product_name']?></h2>
       <div class="product-image"><img src="images/<?php echo $item['product_images']?>"/></div>
       <p class="product-price"><?php echo $item['product_price'] . " vnd "  ?></p>
      <audio id='audio_1' controls preload loop controlsList="nodownload" ><source src='file/<?php echo $item['product_file'] ?>' /></audio>
      <form method="POST" action="download.php" style="float: right; width: 50%">
      <input type="number" name="sl" value="1" style="display: none" > <br>
      <input type="hidden" name="id" value="<?= $id ?>">
      <button type="submit" class="button-buy" style="width: 60%; float: left;height: 30px; background-color: lightgreen" > <i class="fa fa-cart-plus" aria-hidden="true"></i> Pay</button>
    </form>
    </a>
  </div>
     	   <p style="background-color: white; width: 50px; margin-left: 500px; margin-top: 110px"> 	<?php
    echo "<a href='delcart.php?productid=$item[product_id]' style='text-decoration: none;'>Delete</a>";
    ?>
</p>
         </div>
         	 <?php
 	endforeach;
 	}
 	else
 		 echo '<script language="javascript">';
     echo 'alert("There are no songs in the cart")'; 
     echo '</script>';
     	?>
   </div>
 	<br>
 	<div class="delete">
 	<a href="delcart.php?productid=0" style="text-decoration: none; color: white">Delete all products</a>
 	</div>
 	<div id="total" class="clearfix">
 		 <?php
 		 $tong = 0;
 		  foreach ($_SESSION['cart'] as $item ) :
 		 	$tong += $item['sl'] * $item['product_price'];
 		 endforeach;
 		 ?>
 		 <h3>Total: <?php echo number_format($tong) ." VND" ?></h3>
 	</div>	
 </div>
 </div>
 <?php 
 include ('inc/footer.php');
  ?>
