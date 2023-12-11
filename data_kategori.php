<?php 
	session_start();
	include 'config.php';
	// if($_SESSION['status_login'] != true){
	// 	echo '<script>window.location="login.php"</script>';
	// }
?>

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
		<h3> Data Kategori</h3>
		<div class="box">
			<p><a href="tambah-kategori.php">Tambah Data</a></p>
				<table border="1" width='%' class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th width="100px">Id</th>
							<th>Kategori</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$kategori = mysqli_query($mysqli, "SELECT * FROM category ORDER BY id DESC");
							if(mysqli_num_rows($kategori) > 0){
							while($row = mysqli_fetch_array($kategori)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['id'] ?></td>
							<td><?php echo $row['name'] ?></td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="3">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
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