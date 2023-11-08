<?php
 session_start();

 include '../config.php';
 require 'funtions.php';


    if($_GET['id_pesanan']){
      $terima = mysqli_query($connection,"UPDATE pesanan set ID_resepsionis = '".$_SESSION['id']."', status = 'baru' where id = '".$_GET['id_pesanan']."' ");
      if($terima){
         echo"<script>alert('sukses menerima pesanan'); location.href='pesananTr.php' </script>";
      } else {
         echo"<script>alert('gagal menerima pesanan'); location.href='pesananTr.php' </script>";
      }
  }
?>