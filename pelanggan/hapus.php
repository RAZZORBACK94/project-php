<?php
 session_start();

 include '../config.php';
 require 'funtions.php';


    if($_GET['id_pesanan']){
        $qry_hapus= mysqli_query($connection,"DELETE from pesanan where id= '".$_GET['id_pelanggan']."'");
        if($qry_hapus){
           echo"<script>alert('sukses menghapus pesanan') location.href='pesanan.php'</script>";
           header("Location: pesanan.php");
        }else{
           echo"<script>alert('gagal menghapus pesanan') location.href='pesanan.php'</script>";
           header("Location: pesanan.php");
        }
  }
?>