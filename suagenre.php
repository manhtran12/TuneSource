<?php 
include("inc/conn.php");
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$id=$_GET['id'];
	$name=$_POST['tengenre'];
$sql="UPDATE genre SET GenreID=$id,GenreName='$name' WHERE GenreID=$id ";
if(mysqli_query($conn,$sql)){
	echo "successfully updated";
}else{
	echo "Error: " .mysqli_errno($conn);
}
}
$id=$_GET['id'];
$sql= mysqli_query($conn,"SELECT * FROM genre WHERE GenreID={$id}");
$product = mysqli_fetch_assoc($sql);
?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="https://img.icons8.com/fluent/96/000000/data-configuration.png"/>
	<link rel="stylesheet" type="text/css" href="aset/admin.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Management system </title>
</head>
<body>
<div class="header">
	<h1>Update Genre</h1>
</div>
<div class="leftcolumn">
<div class="topnav">
  <a href="index.php"><i class="fas fa-home"></i>  Home</a>
  <a href="genre.php"><i class="far fa-album-collection"></i>   Management Genre</a>
  <a href="singer.php"><i class="fad fa-user-music"></i>  Management Singer</a>
  <a href="saleman.php"><i class="fas fa-users"></i>   Management Salesman</a>
  <a href="longout.php"><i class="fas fa-sign-out-alt"></i>   Long out</a>
</div>
</div>
<div class="rightcolumn">
<h3>Update Genre Name : <?= $product['GenreName']?></h3>
<br><br>
<form method="POST" enctype="multipart/form-data">
	<label>Enter genre name</label> <br>
	<input class="us-pw" type="text" name="tengenre" value="<?=$product['GenreName']?>"/> <br> <br>
<input type="submit" name="submit" value="Update" class="login">
</form>
</div>
<h2>Update product: <?= $product['product_name'] ?></h2>
 <form class="form" method="post" enctype="multipart/form-data">
 	<label>Enter name of product</label>
 	<input type="text" name="name" value="<?= $product['product_name']?>" style="width: 80%; height: 5%; float: left;"/>
 	<label>Enter the price of product</label>
 	<input type="number" name="price" value="<?= $product['price']?>" style="width: 80%; height: 5%; float: left;">
 	<label>Chosse the picture of product</label>
 	<img class="anhsp" src="../images/<?= $product['images']?>"/>
 	<input type="file" name="images" style="width: 80%; height: 5%; float: left;">
 	<label>Chosse the file of product</label>
 	<audio src="../file/<?= $product['file']?>"></audio>
    <input type="file" name="file" style="width: 80%; height: 5%; float: left;"/>
 	<input type="submit" name="submit" value="update" style="width: 100%;height: 30px">
 </form>
