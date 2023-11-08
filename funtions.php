<?php
require 'config.php';


// login
function login($data){
    global $connection;
    if ($data){
        $username = $data['username'];
        $password = md5($data['password']);
        if (empty($username)) {
         echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
          } elseif (empty($password)) {
            echo "<script>alert('Password tidak boleh kosong'); location.href = 'login.php';</script>";
               } else{
                     $sqlSt = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
                     $query_login_St = mysqli_query($connection,$sqlSt);
                     
                     $sqlPl= "SELECT * FROM pelanggan WHERE username = '".$username."' AND password = '".$password."' ";
                     $query_login_Pl = mysqli_query($connection, $sqlPl);
                     
                     if (mysqli_num_rows($query_login_St) > 0  ){
                           $db_ta_St = mysqli_fetch_array($query_login_St);
                           session_start();
                           $_SESSION["id"]=$db_ta_St['id'];
                           $_SESSION["username"]=$db_ta_St['username'];
                           $_SESSION["password"]=$db_ta_St['password'];
                           $_SESSION["role"] = $db_ta_St['role'];
                        
                           if($db_ta_St['role'] == 'admin'){
                              header("location: home_admin.php");
                           }elseif ($db_ta_St['role' == 'resepsionis']){
                              header("location:home_staff.php");
                           }

                     } elseif (mysqli_num_rows($query_login_Pl) > 0){
                        $db_ta_Pl = mysqli_fetch_array($query_login_Pl);

                        session_start();

                           $_SESSION["id"]=$db_ta_Pl['id'];
                           $_SESSION["username"]=$db_ta_Pl['username'];
                           $_SESSION["password"]=$db_ta_Pl['password'];
                           $_SESSION["saldo"]=$db_ta_Pl['saldo'];
               
                           header("Location:pelanggan/home_pelanggan.php");
                           echo "<script>alert('".$db_ta_Pl['username']."'); Location:home_pelanggan; </script>";
                     } else {
                        echo"<script>alert('tidak ada akun yang cocok'); </script>";
                     }
      }
    }
}



//check pw dan email\

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
            echo "<script>alert('username tidak boleh kosong'); location.href = 'register.php';</script>";
        } elseif (empty($email)){
            echo"<script>alert('email tidak boleh kosong'); location.href = 'register.php'</script>";
        } elseif (empty($password)){
            echo" <script> alert('password tidak boleh kosong'); location.href = 'register.php'</script>";
        }elseif (empty($kota)){
            echo" <script> alert('kota tidak boleh kosong'); location.href = 'register.php'</script>";
        }elseif (empty($umur)){
            echo" <script> alert('umur tidak boleh kosong'); location.href = 'register.php'</script>";
        }else{
            if ($check) {
               echo "<script>alert('Email sudah terdaftar'); location.href = 'register.php';</script>";
            } elseif ($checks ) {
               echo "<script>alert('Username sudah terdaftar'); location.href = 'register.php';</script>";
            }else{
               $insert = mysqli_query($connection, "INSERT INTO pelanggan (username, email, password, kota, umur) VALUE ('".$username."','".$email."','".$password."','".$kota."','".$umur."')");
               if ($insert){
                     echo "<script>alert('Sukses menambahkan Pelanggan'); location.href = 'login.php'; </script>";
                  } else {
                     echo "<script>alert('Gagal menambahkan Pelanggan  error'); location.href = 'register.php'; </script>";
                  }
            }

         }
      }
      echo "<script>alert('Tidak ada data masuk')</script>";

}

// regis staff

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





// logout
function logout(){
   session_start();
   session_destroy();
   header("Location: login.php");
}




?>