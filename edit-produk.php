<?php 
	session_start();
	include 'config.php';
	// if($_SESSION['status_login'] != true){
	// 	echo '<script>window.location="login.php"</script>';
	// }
	$id = $_GET['id'];
	$produk = mysqli_query($mysqli, "SELECT * FROM data_produk WHERE Id= '".$_GET['Id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Bukawarung</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Edit Data Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<h3>Merk<br><input type="text" name="merk" class="input-control" placeholder="Merk" value="<?php echo $p->merk ?>" required></h3>
					<h3>Type<br><input type="text" name="type" class="input-control" placeholder="Type" value="<?php echo $p->type ?>" required></h3>
					<h3>Harga<br><input type="number" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->harga ?>" required></h3>
					<h3>Size<br><input type="number" name="size" class="input-control" placeholder="Size" value="<?php echo $p->size ?>" required></h3>
					<h3>Kategori<br><select class="input-control" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($mysqli, "SELECT * FROM category ORDER BY id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
							<option value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>
						<?php } ?>
					</select></h3>
					<h3>Image<br>
					<img src="image/<?php echo $p->new_name ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $p->new_name ?>">
					<input type="file" name="gambar" class="input-control">
					</h3>
					<br>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// data inputan dari form
						$kategori 	= $_POST['kategori'];
						$merk 		= $_POST['merk'];
						$type 		= $_POST['type'];
						$harga 		= $_POST['harga'];
						$size 		= $_POST['size'];
						$foto 	 	= $_POST['foto'];
						$id         = $_POST['IDa'];
						// data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						

						// jika admin ganti gambar
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'image'.time().'.'.$type2;

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
								// jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format file tidak diizinkan")</scrtip>';

							}else{
								unlink('image/'.$foto);
								move_uploaded_file($tmp_name, './image/'.$newname);
								$namagambar = $newname;
							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
						}

						// query update data produk
						$update = mysqli_query($mysqli,"update data-produk set merk='$merk', type='$type', harga='$harga', kategori='$kategori' , size='$size', name='$namagambar',new_name='$namagambar' where id='$id'");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="dex.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($mysqli);
						}
						
					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - Bukawarung.</small>
		</div>
	</footer>
	<script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>