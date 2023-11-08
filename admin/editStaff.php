<?php
    session_start();

    include '../config.php';
    require 'funtions.php';

    if(isset($_POST['submit'])) 
  {
     ubahStaff($_POST);
  };
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dist/output.css" />
    <title>Document</title>
  </head>
  <body class="bg-gray-100">
    <!-- navabar -->
    <?php
   include "navbar.php"
   ?>

      <!-- isi  -->
        <?php
            $qry_get_staff = mysqli_query($connection,"SELECT * from user where id = '".$_GET['id_staff']."'");
            $dt_staff = mysqli_fetch_array($qry_get_staff);
        ?>

      <div class="flex justify-center my-[5%]">
        <div class="bg-emerald-500 w-[25%] rounded-lg p-4">
          <h4 class="text-center text-3xl font-semibold mb-5">Mengubah Staff</h4>
          <form action="" method="post">
                <div class="hidden">
                    <input type="text" name="id" value="<?=$dt_staff['id']?>">    
                </div>                  
                <div class="rounded-lg mb-5">
                    <p>Nama Staff:</p>
                    <input name="username" value="<?=$dt_staff['username']?>"  type="text" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Username">
                </div>
                <div class="rounded-lg mb-5">
                    <p>Email:</p>
                    <input name="email" value="<?=$dt_staff['email']?>" type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Email">
                </div>
                <div class="rounded-lg mb-5">
                    <p>Password:</p>
                    <input name="password" value="<?=md5($dt_staff['password'])?>" type="password" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Password">
                </div>
                <a href="#"><button onclick="" type="submit" name="submit" class="hover:bg-[#7BADFF] py-2 px-3 rounded-md w-full text-white text-center block  mb-5 bg-[#1953B2] ">Daftar</button></a>
                </form> 
        </div>
      </div>
        


    <script src="../js/scripts.js"></script>
  </body>
</html>
