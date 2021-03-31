<?php
require_once("inc/conn.php");
include('inc/header.php');
?>

<?php
$search = "";
if( !empty($_GET['Search'])){
	$search = $_GET['Search'];
}
?>
<div class="row">
	<div class="leftcolumn">
		<h3 class="title" style="color: white">Search Results for: <?= $search ?></h3>
		<?php
		if( !empty($search)) {
			$rs = mysqli_query( $conn , "SELECT * FROM product WHERE product_name LIKE '%{$search}%'");
			while($row = mysqli_fetch_assoc($rs)){
		?>
		    <a href="single-product.php?id=<?php echo $row['product_id']?>" class="product" style="height: 400px">
                 <h2 class="product-title"><?php echo $row['product_name'] ?></h2>
                 <img style="width: 280px; height: 280px;" class="product-image" src="images/<?php echo $row['product_images'] ?>" />
                 <div><audio id='audio_1' controls preload  loop controlsList="nodownload"><source src='file/<?php echo $row['product_file'] ?>' /></audio></div>
                 </a>
		     <?php
		 }
		}
		?>
		</div>
<?php
include('inc/footer.php');
?>

