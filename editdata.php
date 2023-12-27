<?php 
error_reporting(0);
session_start();
include "connection.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);
$b = mysqli_fetch_array(mysqli_query($connect, "SELECT * from pegawai where NIK='$id' "));


$NIK = mysqli_real_escape_string($connect, $_POST['NIK']);
$Nama = mysqli_real_escape_string($connect, $_POST['Nama']);
$Gaji = mysqli_real_escape_string($connect, $_POST['Gaji']);

if(isset($_POST['submit'])){
    if($NIK == ""){
      $NIK_error = "<span style='color:red;'>NIK Wajib Diisi</span>";
    }elseif($Nama == ""){
      $Nama_error = "<span style='color:red;'>Nama Wajib Diisi</span>";
    }elseif($Gaji == ""){
        $Gaji_error = "<span style='color:red;'>Gaji Wajib Diisi</span>";
    }else{
        $sql = mysqli_query($connect, "UPDATE pegawai set NIK='$NIK', Nama='$Nama', Gaji='$Gaji' where NIK='$id'");
        if($sql){
        echo "<script>alert('Edit Berhasil');document.location='data.php'</script>";
        }else{
            echo "<span style='color:red;'>Terjadi Kesalahan Silakan Coba Lagi</span>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Input Data</title>
    <style>
        body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

.container {
  width: 80%;
  margin: 0 auto;
  overflow: hidden;
}

header {
  background: #333;
  color: white;
  padding-top: 10px;
  min-height: 70px;
  border-bottom: #bbb 1px solid;
}

header a {
  color: #ffffff;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 16px;
}

header ul {
  padding: 0;
  margin: 0;
  list-style: none;
  overflow: hidden;
}

header li {
  float: left;
  display: inline;
  padding: 0 20px 0 20px;
}

header #branding {
  float: left;
}

header #branding h1 {
  margin: 0;
}

header .highlight, header .current a {
  color: #ffffff;
  font-weight: bold;
}

header a:hover {
  color: #ffffff;
  font-weight: bold;
}

main {
  padding: 20px 0;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

table, th, td {
  border: 1px solid #ddd;
}

th, td {
  padding: 12px;
  text-align: left;
}

th {
  background-color: #333;
  color: #fff;
}

footer {
  background: #333;
  color: white;
  text-align: center;
  padding: 10px 0;
  position: absolute;
  bottom: 0;
  width: 100%;
}
@media (max-width: 768px) {
  header ul {
    overflow: visible;
  }

  header #toggle img {
    display: none;
  }

  header ul li {
    display: block;
    float: none;
    width: 100%;
    text-align: center;
  }

  header #branding, header #toggle, header ul {
    float: none;
    text-align: center;
  }

  header #branding h1 {
    margin: 0;
  }

  header nav {
    margin: 0;
  }
}
    </style>
</head>
<header>
        <nav>
            <div class="container">
			    <h2>
				    Data Pegawai
			    </h2>
				    <ul>
					    <li><a href="index.php">Home</a></li>
                        <li><a href="tambahproduk.php">Tambah Produk</a></li>
					    <li><a href="produk.php">Data Produk</a></li>
					    <li><a href="tambahdata.php">Tambah Data</a></li>
					    <li><a href="data.php">Data Karyawan</a></li>
				    </ul>
		</div>
        </nav>
    </header>
<body>
    <br><br>
<h1>Edit Data Pegawai</h1><hr>
<br>
<a href="data.php"> </a>
<br><br>
        <form action="" method="post" enctype="multipart/form-data">
          <table>
            <tr>
            <td>NIK</td>
            <td>
                <input type="text" name="NIK" placeholder="Masukkan NIK" class="input" value="<?= $b['NIK'];?>">
                <?= $nik_error;?>  
            </td></tr>
            <tr>
            <td>Nama</td>
            <td>
                <input type="text" name="Nama" placeholder="Masukkan Nama" class="input" value="<?= $b['Nama'];?>">
                <?= $Nama_error;?>  
            </td></tr>
            <td>Gaji</td>
            <td>
                <input type="text" name="Gaji" placeholder="Gaji" class="input" value="<?= $b['Gaji'];?>">
                <?= $Gaji_error;?>  
            </td></tr>
            <tr><td>
                <button type="submit" name="submit">SIMPAN</button>
            </td></tr>
          </table>
</body>
<br><br>
<footer>
		<div class="container">
		<small>CopyRight @ 2023 Tugas Akhir Praktikum Basis Data</small>
	</footer>
</html>