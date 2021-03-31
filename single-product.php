
<?php
session_start();
require_once("inc/conn.php");
include('inc/header.php');
 ?>
 <div class="row">
 	<div class="leftcolumn">
 	<?php
 	$id = $_GET['id'];
 	$sql = "SELECT * FROM product WHERE product_id = {$id}";
 	$rs = mysqli_query($conn, $sql);
 	while ($row = mysqli_fetch_assoc($rs) ) {
 	?>
 	<div class="single-product">
 		<h1 class="product-title" style="color: white; background-color: black"><?php echo $row['product_name']?></h1>
 		<div class="product-image"><img src="images/<?php echo $row['product_images']?>"/></div>
 		<audio id='audio_1' controls preload  loop controlsList="nodownload"><source src='file/<?php echo $row['product_file'] ?>' /></audio>
 		<form method="POST" action="cart.php">
 			<input type="number" name="sl" value="1" style="display: none" > <br>
 			<input type="hidden" name="id" value="<?= $id ?>">
 			<button type="submit" class="button-buy" > <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to card</button>
 			
 		</form>
 		<!--<div class="product-content">
 			<?php //echo $row['content'] ?>
 		</div>
 	    -->
 		<?php
 	}
 	?>
 </div>
</div>
<?php
include('inc/footer.php');
?>
 	