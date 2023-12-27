<?php
error_reporting(0);
session_start();
include "connection.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);

$sql = mysqli_query($connect, "DELETE from pegawai where NIK='$id'");
 if($sql){
      echo "<script>alert('Hapus Berhasil');document.location='data.php'</script>\n";
    }else{
       echo "<script>alert('Hapus Gagal');document.location='data.php'</script>\n";
    }

?>