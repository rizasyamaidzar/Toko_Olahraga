<?php 
	error_reporting(0);
	include 'config.php';
	// $kontak = mysqli_query($mysqli, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	// $a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($mysqli, "SELECT * FROM data_produk WHERE Id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PNG-Sport</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="Dashboard.php">PNG-Sport</a></h1>
			<ul>
				<li><a href="Dashboard.php">Dashboard</a></li>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="image/<?php echo $p->new_name ?>" width="100%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->merk ?></h3>
					<h3><?php echo $p->type ?></h3>
					<h4>Size : <?php echo number_format($p->size) ?></h4>
					<h4>Rp. <?php echo number_format($p->harga) ?></h4>
					<p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk Anda." target="_blank">
						Hubungin via Whatsapp
						<img src="image/wa.png" width="50px"></a>
					</p>
				</div>
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