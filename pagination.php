<?php 
require_once("conn.php");
?>
<?php 
$product_per_page = 6;
$q = mysqli_query($conn, "SELECT COUNT(product_id) AS total FROM product ");
$rs = mysqli_fetch_assoc($q);
$total_products = $rs['total'];
$pages = ceil($total_products / $product_per_page);
if(!empty($_GET['page']))
{
	$current_page = $_GET['page'];
}
else
{
	$current_page = 1;
}
?>
<div class="pagination_wrap">
	<div class = pagination>
		<?php for($i = 0; $i < $pages; $i++) 
		{?>
			<a href="product.php?page=<?=$i+1?>"
				<?php 
				if ($current_page == ($i+1)) {
					# code...
					echo "class=active";
				}
				else
				{
					echo "";
				}
				?>
				>
			<?php echo $i+1 ?></a>
	<?php } ?>	
	</div>
</div>