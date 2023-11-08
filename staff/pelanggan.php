<?php
    session_start();

    include '../config.php';
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
  <div class="flex items-center bg-white p-6 border-b border-gray-200 px-14">
    <div class="flex-none w-48 flex flex-row items-center mr-[20%]">
      <p class="ml-1 flex-1 text-2xl text-black font-bold">Permata puri</p>
    </div>

    <div class="flex justify-between mr-auto w-[33%]">
      <a href="../home_staff.php" class="text-xl font-medium"> dashboard</a>
      <a href="Staff.php" class="text-xl font-medium"> staff</a>
      <a href="pelanggan.php" class="text-xl font-medium"> pelanggan</a>
      <a href="pesananTr.php" class="text-xl font-medium"> pesanan</a>
    </div>


    <!-- user -->
    <div class="flex justify-end items-center">

      <div class="dropdown relative">
        <button class="menu-btn flex flex-wrap items-center">
          <div class="w-8 h-8 overflow-hidden rounded-full">
            <img class="w-full h-full object-cover" src="../img/user.svg" />
          </div>

          <div class="ml-2 flex">
            <h1 class="text-base font-semibold m-0 p-0">
              <?= $_SESSION['username']?>
            </h1>
            <i class="fad fa-chevron-down ml-2 my-auto text-xs leading-none"></i>
          </div>
        </button>

        <button class=" hidden fixed top-0 left-0 z-10 w-10 h-full menu-overflow"></button>
        <!-- drop menu -->
        <div class="text-gray-200 menu hidden bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
          <a class="px-4 py-2 block font-medium text-sm tracking-wide bg-white hover:bg-gray-50 hover:text-orange-400"
            href="editProfile.php">
            <i class="fad fa-user-edit text-xs mr-1"></i>
            Edit Profile
          </a>

          <a class="px-4 py-2 block font-medium text-sm tracking-wide bg-white hover:bg-gray-50 hover:text-orange-400"
            href="logout.php">
            <i class="fad fa-user-times text-xs mr-1"></i>
            Log Out
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- isi  -->

  <div class="bg-gray-100 flex-1 p-6">



    <div>

      <div class="w-full flex justify-between">
        <p class="text-3xl font-medium ">Pelanggan</p>
        <button onclick="window.location='tambahPelanggan.php'" class="flex bg-green-400 rounded-md px-3 hover:text-white hover:bg-green-800">
          <i class="fa-solid fa-plus stroke-white my-auto mr-2 hover:stroke-black"></i>
          <p class="text-xl m-auto">Tambah</p>
        </button>
      </div>

      <table class="table-auto w-full">
        <tr class="bg-slate-200">
          <td class="text-center text-xl font-semibold">id</td>
          <td class="text-center text-xl font-semibold">nama</td>
          <td class="text-center text-xl font-semibold">email</td>
          <td class="text-center text-xl font-semibold">kota</td>
          <td class="text-center text-xl font-semibold">umur</td>
        </tr>

        <?php
              $qry_pelanggan = mysqli_query($connection,"SELECT * FROM pelanggan");
              

              while($data_pelanggan=mysqli_fetch_array($qry_pelanggan)){
              ?>
        <div class="h-fit">
          <tr class=" h-fit">
            <td class="text-center my-5"><?=$data_pelanggan['id']?></td>
            <td class="text-center my-5"><?=$data_pelanggan['username']?></td>
            <td class="text-center my-5"><?=$data_pelanggan['email']?></td>
            <td class="text-center my-5"><?=$data_pelanggan['kota']?></td>
            <td class="text-center my-5"><?=$data_pelanggan['umur']?></td>
          </tr>
        </div>
        <?php
              }
              
              ?>
      </table>
    </div>

  </div>


  </div>



  <script src="../js/scripts.js"></script>
</body>

</html>