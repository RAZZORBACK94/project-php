<?php

 include '../config.php';


 function check($email,  $connection){
    $check = mysqli_real_escape_string($connection, $email);
    $query = "SELECT * FROM user WHERE email = '$check'";
    $result = $connection -> query($query);
 
    if ($result -> num_rows > 0){
       return true; // sdh digunkan
    }
 }
 
 function checks($username,  $connection){
    $check = mysqli_real_escape_string($connection, $username);
    $query = "SELECT * FROM user WHERE username = '$check'";
    $result = $connection -> query($query);
 
    if ($result -> num_rows > 0){
       return true; // sdh digunkan
    }
 }
 
 
 // regigster
 function regis($data){
    global $connection;
 
    if($data){
       $username = $data['username'];
       $email= $data['email'];
       $password = md5($data['password']);
       $kota= $data['kota'];
       $umur = $data['umur'];
       //cek apakah email sudah terdaftar atau belum
         $check = check($email, $connection);
          $checks = checks($username,  $connection);
         if(empty($username)){
             echo "<script>alert('username tidak boleh kosong');location.href='tambahPelanggan.php';</script>";
         } elseif (empty($email)){
             echo"<script>alert('email tidak boleh kosong');location.href='tambahPelanggan.php'</script>";
         } elseif (empty($password)){
             echo" <script> alert('password tidak boleh kosong');location.href='tambahPelanggan.php'</script>";
         }elseif (empty($kota)){
             echo" <script> alert('kota tidak boleh kosong');location.href='tambahPelanggan.php'</script>";
         }elseif (empty($umur)){
             echo" <script> alert('umur tidak boleh kosong');location.href='tambahPelanggan.php'</script>";
         }else{
             if ($check) {
                echo "<script>alert('Email sudah terdaftar');location.href='tambahPelanggan.php';</script>";
             } elseif ($checks ) {
                echo "<script>alert('Username sudah terdaftar');location.href='tambahPelanggan.php';</script>";
             }else{
                $insert = mysqli_query($connection, "INSERT INTO pelanggan (username, email, password, kota, umur) VALUE ('".$username."','".$email."','".$password."','".$kota."','".$umur."')");
                if ($insert){
                      echo "<script>alert('Sukses menambahkan Pelanggan'); location.href='pelanggan.php'; </script>";
                   } else {
                      echo "<script>alert('Gagal menambahkan Pelanggan  error'); location.href='tambahPelanggan.php'; </script>";
                   }
             }
 
          }
       }
       echo "<script>alert('Tidak ada data masuk')</script>";
 
 }

  function regisstaf($data){
    global $connection;
 
    if($data){
       $username = $data['username'];
       $email= $data['email'];
       $password = md5($data['password']);
       $role = $data['role'];
       //cek apakah email sudah terdaftar atau belum
         $check = check($email, $connection);
          $checks = checks($username,  $connection);
         if(empty($username)){
             echo "<script>alert('username tidak boleh kosong');location.href='staff.php';</script>";
         } elseif (empty($email)){
          echo"<script>alert('email tidak boleh kosong');location.href='staff.php'</script>";
         } elseif (empty($password)){
          echo" <script> alert('password tidak boleh kosong');location.href='staff.php'</script>";
         } elseif (empty($role)){
          echo" <script> alert('role anda tidak boleh kosong');location.href='staff.php'</script>";
         } else{
          if ($check) {
             echo "<script>alert('Email sudah terdaftar');location.href='staff.php';</script>";
         } elseif ($checks ) {
          echo "<script>alert('Username sudah terdaftar');location.href='staff.php';</script>";
         }else{
             $sql = "INSERT INTO user(username, email, password, role) VALUE ('".$username."','".$email."','".$password."','".$role."')";
             $insert = mysqli_query($connection, $sql);
             if ($insert){
                echo "<script>alert('Sukses menambahkan User');location.href='Staff.php';</script>";
             } else {
                echo "<script>alert('Gagal menambahkan User');location.href='Staff.php';</script>";
             }
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


function ubahStaff($data){
   global $connection;

   if($data){
      $id = $data['id'];
      $username = $data['username'];
      $email = $data['email'];
      $role = $data['role'];
      $password = md5($data['password']);
   }
   if(empty($username)){
      echo"<script>alert('nama Staff tidak boleh kosong'); location.href='editStaff.php' </script>";
   }
   elseif(empty($email)){
      echo"<script>alert('email tidak boleh kosong'); location.href='editStaff.php' </script>";
   }
   elseif(empty($role)){
      echo"<script>alert('role tidak boleh kosong'); location.href='editStaff.php' </script>";
   }
   elseif(empty($password)){
      $update = mysqli_query($connection,"UPDATE user set username ='".$username."', email ='".$email."', role ='".$role."' WHERE id= '".$id."'");
      if($update){
         echo"<script>alert('sukses mengubah staff'); location.href='Staff.php'</script>";
      } else {
         echo"<script>alert('gagal mengubah Staff'); location.href='Staff.php'</script>";
      }   
   } else {
      $update = mysqli_query($connection,"UPDATE user set username ='".$username."', email ='".$email."', password= '".$password."', role ='".$role."' WHERE id= '".$id."'");
      if($update){
         echo"<script>alert('sukses mengubah Staff'); location.href='Staff.php' </script>";
      } else {
         echo"<script>alert('gagal mengubah Staff'); location.href='Staff.php' </script>";
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