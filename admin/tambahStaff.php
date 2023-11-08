<?php
    session_start();

    include '../config.php';
    require 'funtions.php';

    if(isset($_POST['submit'])) 
  {
     regisstaf($_POST);
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
      <div class="flex justify-center my-[5%]">
        <div class="bg-emerald-500 w-[25%] rounded-lg p-4">
          <h4 class="text-center text-3xl font-semibold">Menambah Staff</h4>
          <form action="" method="post">                  
                <div class="border border-black rounded-lg mb-5">
                    <input name="username" value=""  type="text" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Username">
                </div>
                <div class="border border-black rounded-lg mb-5">
                    <input name="email" value="" type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Email">
                </div>
                <div class="border border-black rounded-lg mb-5">
                    <input name="password" value="" type="password" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Password">
                </div>
                <div class="border border-black rounded-lg mb-5">
                    <select name="role" id="" class="px-2 py-2.5 w-full rounded-lg">
                      <option value=""></option>
                      <option value="resepsionis">Resepsionis</option>
                      <option value="admin">Admin</option>
                    </select>
                </div>
               
                <a href="#"><button onclick="" type="submit" name="submit" class="hover:bg-[#7BADFF] py-2 px-3 rounded-md w-full text-white text-center block  mb-5 bg-[#1953B2] ">Daftar</button></a>
                </form> 
        </div>
      </div>
        


    <script src="../js/scripts.js"></script>
  </body>
</html>
