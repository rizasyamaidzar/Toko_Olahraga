<?php 
	error_reporting(0);
	include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="Dashboard.php">Bukawarung</a></h1>
			<ul>
				<li><a href="Dashboard.php">Dashboard</a></li>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
				<?php 
					$produk = mysqli_query($mysqli, "SELECT * FROM data_produk ORDER BY Id DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>	
					<a href="detail_produk.php?id=<?php echo $p['Id'] ?>">
						<div class="col-4">
							<img src="image/<?php echo $p['new_name'] ?>"width="500">
							<p class="nama"><?php echo substr($p['merk'], 0, 30) ?></p>
							<p class="Type"><?php echo substr($p['type'], 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
								<br>
							<hr><br>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Produk tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<p><?php echo $a->admin_telp ?></p>
			<small>Copyright &copy; 2020 - Bukawarung.</small>
		</div>
	</div>
</body>
</html>