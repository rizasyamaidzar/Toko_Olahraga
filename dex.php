<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM data_produk ORDER BY Id ASC");
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
 
    <table width='100%' border=1 >
 
    <tr>
        <th>ID</th> <th>Merk</th> <th>Type</th> <th>Harga</th> <th>Kategori</th> <th>Size</th> <th>Image</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) { 
    ?>        
        <tr>
        <td><?php echo $user_data['Id']; ?></td>
        <td><?php echo $user_data['merk']; ?></td>
        <td><?php echo $user_data['type']; ?></td>
        <td><?php echo $user_data['harga']; ?></td>
        <td><?php echo $user_data['kategori']; ?></td>
        <td><?php echo $user_data['size']; ?></td>  
       <td><img src="image/<?php echo $user_data['new_name'] ?>" width="35" height="40"></td>
       <td>
        <a href="edit-produk.php?Id=<?php echo $user_data['Id'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $user_data['Id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
    </td>
    </tr>  
        <?php      
    }
    ?>
    </table>
</body>
</html>