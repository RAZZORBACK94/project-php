<?php

 include '../config.php';

 function checkSaldo($harga, $ID_pelanggan, $connection) {
   $get = mysqli_query($connection, "SELECT saldo from pelanggan where id = '".$ID_pelanggan."'");
   
   // Periksa apakah query berhasil
   if ($get) {
       // Mengambil hasil query sebagai array asosiatif
       $result = mysqli_fetch_array($get);

       // Mengonversi nilai saldo menjadi integer
       $saldo = (int) $result['saldo'];

       if ($harga > $saldo) {
           return true;
       }
   }
}


 function tambahPesan($data){
    global $connection;
 
    if($data){
       $ID_pelanggan = $data['id'];
       $tipe_kamar= $data['tipe_kamar'];
       $tanggal = $data['tanggal'];
       $jumlah = $data['jumlah'];
       $status = $data['status'];

       if($tipe_kamar === "deluxe"){
         $harga = $jumlah * 50000;
       }elseif($tipe_kamar === "normal"){
         $harga = $jumlah * 25000;
       }
       //cek jumlah saldo
       $checkSaldo = checkSaldo($harga,$ID_pelanggan,$connection);
         if(empty($tipe_kamar)){
             echo "<script>alert('tipe kamar tidak boleh kosong');location.href='tambahPesanan.php';</script>";
         } elseif (empty($tanggal)){
          echo"<script>alert('tanggal tidak boleh kosong');location.href='tambahPesanan.php'</script>";
         } elseif (empty($jumlah)){
          echo" <script> alert('jumlah tidak boleh kosong');location.href='tambahPesanan.php'</script>";
         } elseif ($checkSaldo){
          echo" <script> alert('saldo tidak mencukupi ".$harga."');location.href='tambahPesanan.php'</script>";
         }else{
            $get = mysqli_query($connection, "SELECT saldo from pelanggan where id = '".$ID_pelanggan."'");
               if ($get) {
               // Mengambil hasil query sebagai array asosiatif
               $result = mysqli_fetch_array($get);

               // Mengonversi nilai saldo menjadi integer
               $saldo = (int) $result['saldo'];

               $masuk = $saldo - $harga;

               $insert = mysqli_query($connection,"UPDATE pelanggan set saldo= '".$masuk."' where id = '".$ID_pelanggan."' ");
               if(!$insert){
                  echo"<script>alert('proses memasukkan saldo terjadi error')</script>";
               }

            } 
             $sql = "INSERT INTO pesanan (ID_pelanggan, tipe_kamar, tanggal, jumlah, harga, status) VALUE ('".$ID_pelanggan."','".$tipe_kamar."','".$tanggal."','".$jumlah."','".$harga."','".$status."')";
             $insert = mysqli_query($connection, $sql);
             if ($insert){
                echo "<script>alert('Sukses menambahkan pesanan'); location.href='pesanan.php' </script>";
             } else {
                echo "<script>alert('Gagal menambahkan pesanan'); location.href='pesanan.php' </script>";
             }
         }
 
          
       }
       echo "<script>alert('Tidak ada data masuk')</script>";
      }


 function ubahPelanggan($data){
   global $connection;

   if($data){
      $id = $data['id'];
      $username = $data['username'];
      $email = $data['email'];
      $password = md5($data['password']);
      $kota = $data['kota'];
      $umur = $data['umur'];
   }
   if(empty($username)){
      echo"<script>alert('nama pelanggan tidak boleh kosong'); location.href='editPelanggan.php' </script>";
   }
   elseif(empty($email)){
      echo"<script>alert('email tidak boleh kosong'); location.href='editPelanggan.php' </script>";
   }
   elseif(empty($kota)){
      echo"<script>alert('kota tidak boleh kosong'); location.href='editPelanggan.php' </script>";
   }
   elseif(empty($umur)){
      echo"<script>alert('umur tidak boleh kosong'); location.href='editPelanggan.php' </script>";
   }
   elseif(empty($password)){
      $update = mysqli_query($connection,"UPDATE pelanggan set username ='".$username."', email ='".$email."', kota= '".$kota."', umur= '".$umur."' WHERE id= '".$id."'");
      if($update){
         echo"<script>alert('sukses mengubah pelanggan'); location.href='editPelanggan.php'</script>";
      } else {
         echo"<script>alert('gagal mengubah pelanggan'); location.href='editPelanggan.php'</script>";
      }   
   } else {
      $update = mysqli_query($connection,"UPDATE pelanggan set username ='".$username."', email ='".$email."', password= '".$password."' , kota= '".$kota."', umur= '".$umur."' WHERE id= '".$id."'");
      if($update){
         echo"<script>alert('sukses mengubah pelanggan'); location.href='editPelanggan.php'</script>";
      } else {
         echo"<script>alert('gagal mengubah pelanggan'); location.href='editPelanggan.php'</script>";
      }
   }
}


//tampil nama staff
function tmplNamaSt($data){
   global $connection;

   $sql = mysqli_query($connection,"SELECT distinct username from user where id = $data");
   
   foreach($sql as $result){
      echo implode($result);   
   }
}

//tampil nama pelanggan
function tmplNamaPl($data){
   global $connection;

   $sql = mysqli_query($connection,"SELECT distinct username from pelanggan where id = $data");
   
   foreach($sql as $result){
      echo implode($result);   
   }
}
?>