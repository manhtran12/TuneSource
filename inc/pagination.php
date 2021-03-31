<?php 
require_once("conn.php");
?>
<style type="text/css">
	.pagination-wrap {
    text-align: center;
    width: 100%;
    float: left;
    display: block;
}
.pagination {
  display: inline-block;
}
.pagination a {
	background-color: white;
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}
.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}
.pagination a:hover:not(.active) {background-color: #d69490;}
/*END phan trang */

}
</style>

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
			<a href="index.php?page=<?=$i+1?>"
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