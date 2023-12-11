
<?php 

include 'config.php';

$link = "";
$link_status = "display: none;";

if (isset($_POST['upload'])) { // If isset upload button or not
	// Declaring Variables
	$merk = $_POST['merk'];
	$type = $_POST['type'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$size = $_POST['size'];
	$location = "image/";
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
	$file_name = $_FILES["file"]["name"]; // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
	$file_size = $_FILES["file"]["size"]; // Get uploaded file size

	if ($file_size > 10485760) { // Check file size 10mb or not
		echo "<script>alert('Woops! File is too big. Maximum file size allowed for upload 10 MB.')</script>";
	} else {
		$sql = "INSERT INTO data_produk (merk,type,harga,kategori,size,name, new_name)
				VALUES ('$merk','$type','$harga','$kategori','$size','$file_name', '$file_new_name')";
		$result = mysqli_query($mysqli, $sql);
		if ($result) {
			move_uploaded_file($file_temp, $location . $file_new_name);
			echo '<script>window.location="dex.php"</script>';
			// Select id from database
			$sql = "SELECT id FROM data_produk ORDER BY id DESC";
			$result = mysqli_query($mysqli, $sql);
			if ($row = mysqli_fetch_assoc($result)) {
				// $link = $base_url . "download.php?id=" . $row['id'];
				$link_status = "display: block;";
			}
		} else {
			echo "<script>alert('Woops! Something wong went.')</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>File Upload PHP Script - Pure Coding</title>
</head>
<body>
	 <style>
        a {
            text-decoration: none;
        }
    </style>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>			
		</div>
		<form action="" method="POST" enctype="multipart/form-data" class="body">
			<!-- Sharable Link Code -->
			<input type="checkbox" id="link_checkbox">
			<input type="text" value="<?php echo $link; ?>" id="link" readonly>
			<label for="link_checkbox" style="<?php echo $link_status; ?>">Get Sharable Link</label>
		<table width="25%" border="0">
			<tr> 
				<td>Merk</td>
				<td><input type="text" name="merk"></td>
			</tr>
			<tr> 
				<td>Type</td>
				<td><input type="text" name="type"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="number" name="harga"></td>
			</tr>
			<tr> 
				<td>Kategori</td>
				<td><select class="input-control" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($mysqli, "SELECT * FROM category ORDER BY id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>
						<?php } ?>
					</select></td>
			</tr>
			<tr> 
				<td>Size</td>
				<td><input type="number" name="size"></td>
			</tr>
		</table>
			<input type="file" name="file" id="upload" required>
			<label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
				<p>
					<strong>Drag and drop</strong> files here<br>
					or <span>browse</span> to begin the upload
				</p>
			</label>
			<button name="upload" class="btn">Upload</button>
		</form>
	</div>
	<buttontype="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" a href="data_kategori.php">
  		 <ul>
				<li><a href="Dashboard.php">Back</a></li> 
		</ul>
		
	</button>
</body>
</html>