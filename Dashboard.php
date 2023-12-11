

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PNG-Sport</title>
	<link rel="stylesheet" type="text/css" href="css/Style.css">
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a hreef="Dashboard.php">PNG-Sport</a></h1>
			<ul>
				<li><a href="Dashboard.php">Dashboard</a></li>
				<li><a href="data_kategori.php">Data Kategori</a></li>
				<li><a href="dex.php">Data Produk</a></li>
				<li><a href="crud.php">Tambah Produk</a></li>
				<li><a href="log_out.php">Log Out</a></li>
			</ul>
		</div>
	</header>

<!-- content -->
<div class="section">
	<div class="container">
		<h3>Dashboard</h3>
		<div class="box">
			<h4>Welcome To PNG-Sport</h4>
		</div>
	</div>
</div>
<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php 
				include_once("config.php");
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
<footer>
	<div class="container">
		<small>Copyright &copy; 2022  -  PNG-Sport</small>
	</div>
</footer>
</body>
</html>