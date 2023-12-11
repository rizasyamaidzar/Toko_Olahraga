<?php 
	
	include 'config.php';

	if(isset($_GET['idk'])){
		$delete = mysqli_query($mysqli, "DELETE FROM category WHERE id = '".$_GET['idk']."' ");
		echo '<script>window.location="dex.php"</script>';
	}

	if(isset($_GET['idp'])){
		// $produk = mysqli_query($mysqli, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		// $p = mysqli_fetch_object($produk);

		// unlink('./produk/'.$p->product_image);

		$delete = mysqli_query($mysqli, "DELETE FROM data_produk WHERE Id = '".$_GET['idp']."' ");
		echo '<script>window.location="dex.php"</script>';
	}

?>