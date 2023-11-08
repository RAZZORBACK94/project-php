<?php
 session_start();

 include '../config.php';
 require 'funtions.php';


    if($_GET['id_pelanggan']){
        $qry_hapus= mysqli_query($connection,"DELETE from pelanggan where id= '".$_GET['id_pelanggan']."'");
        if($qry_hapus){
           echo"<script>alert('sukses menghapus pelanggan') location.href='pelanggan.php'</script>";
           header("Location: pelanggan.php");
        }else{
           echo"<script>alert('gagal menghapus pelanggan') location.href='pelanggan.php'</script>";
           header("Location: pelanggan.php");
        }
  }
    elseif($_GET['id_staff']){
        $qry_hapus= mysqli_query($connection,"DELETE from user where id= '".$_GET['id_staff']."'");
        if($qry_hapus){
           echo"<script>alert('sukses menghapus staff') location.href='Staff.php'</script>";

           header("Location: Staff.php");
        }else{
           echo"<script>alert('gagal menghapus staff') location.href='Staff.php'</script>";
           header("Location: Staff.php");
        }
  }
?>