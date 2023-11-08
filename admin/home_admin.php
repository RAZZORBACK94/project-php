<?php
    session_start();

    include 'config.php';
    require 'funtions.php';
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
      
      <div class="bg-gray-100 flex-1 p-6">
        
      <div class = " grid grid-cols-6 gap-6 mb-10">
        <!-- kartu laporan -->
        <div class="col-span-2 shadow-lg rounded-lg p-5">
            <p class="text-center text-3xl font-semibold">user</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM user";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              ?>
              <p class="text-3xl font-medium"><?=$number?></p>
            </div>
          </div>
        </div>

        <div class="col-span-2 shadow-lg rounded-lg p-5 bg-yellow-400">
            <p class="text-center text-3xl font-semibold">staff</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM user where role = 'resepsionis'";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              ?>
              <p class="text-3xl font-medium"><?=$number?></p>
            </div>
          </div>
        </div>
        
        <div class="col-span-2 shadow-lg rounded-lg p-5 bg-blue-400">
            <p class="text-center text-3xl font-semibold">pelanggan</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM pelanggan";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              ?>
              <p class="text-3xl font-medium"><?=$number?></p>
            </div>
          </div>
        </div>
        
        <div class="col-span-2 shadow-lg rounded-lg p-5">
            <p class="text-center text-3xl font-semibold">pesanan</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM pesanan";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              ?>
              <p class="text-3xl font-medium"><?=$number?></p>
            </div>
          </div>
        </div>

        <div class="col-span-2 shadow-lg rounded-lg p-5 bg-blue-400">
            <p class="text-center text-3xl font-semibold">baru</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM pesanan where status = 'baru'";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              ?>
              <p class="text-3xl font-medium"><?=$number?></p>
            </div>
          </div>
        </div>
        <div class="col-span-2 shadow-lg rounded-lg p-5 bg-green-400">
            <p class="text-center text-3xl font-semibold">check in</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM pesanan where status = 'check_in'";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              ?>
              <p class="text-3xl font-medium"><?=$number?></p>
            </div>
          </div>
        </div>
      </div>


    </div>

    <script src="./js/scripts.js"></script>
  </body>
</html>
