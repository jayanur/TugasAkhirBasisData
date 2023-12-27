<?php include "connection.php";?>


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
					    <li><a href="data.php">Data Pegawai</a></li>
				    </ul>
		</div>
        </nav>
    </header>
<body>
  <br/><br/>
<a href="tambahdata.php"></a>
<br/><br/>
<h1>Data Pegawai</h1><hr>
<br/>
<table style="text-align:left ; border=1px solid; border-collapse: collapse;">
        <tr>
            <th style="border:1px solid; padding:10px; text-align:center">NIK</th>
            <th style="border:1px solid; padding:10px; text-align:center">Nama</th>
            <th style="border:1px solid; padding:10px; text-align:center">Gaji</th>            
            <th style="border:1px solid; padding:10px; text-align:center">Opsi</th>            
        </tr>
          <tbody>
          <?php
          $sql = mysqli_query($connect,"SELECT * FROM pegawai where pegawai . NIK");
          while($row=mysqli_fetch_array($sql)){
            ?>
            <tr>
            <td style="border:1px solid; padding:10px;"><?=$row['NIK'];?></td>
            <td style="border:1px solid; padding:10px;"><?=$row['Nama'];?></td>
            <td style="border:1px solid; padding:10px;"><?=$row['Gaji'];?></td>
            <td style="border:1px solid; padding:10px;">
              <a href="editdata.php?id=<?= $row['NIK'];?>" title="Edit">Edit |</a> 
              <a href="hapusdata.php?id=<?= $row['NIK'];?>" title="Hapus">Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </table>   
      </div>
    </div>
</body><br><br>
<footer>
		<div class="container">
		<small>CopyRight @ 2023 Tugas Akhir Praktikum Basis Data</small>
	</footer>
</html>