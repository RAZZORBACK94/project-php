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
  <body>
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
              <h1 class="text-base font-semibold m-0 p-0"><?= $_SESSION['username']?></h1>
              <i class="fad fa-chevron-down ml-2 my-auto text-xs leading-none"></i>
            </div>
          </button>

          <button class=" hidden fixed top-0 left-0 z-10 w-10 h-full menu-overflow"></button>
          <!-- drop menu -->
          <div class="text-gray-200 menu hidden bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
            <a class="px-4 py-2 block font-medium text-sm tracking-wide bg-white hover:bg-gray-50 hover:text-orange-400" href="editProfile.php">
              <i class="fad fa-user-edit text-xs mr-1"></i>
              Edit Profile
            </a>

            <a class="px-4 py-2 block font-medium text-sm tracking-wide bg-white hover:bg-gray-50 hover:text-orange-400" href="logout.php">
              <i class="fad fa-user-times text-xs mr-1"></i>
              Log Out
            </a>
          </div>
        </div>
      </div>
    </div>

   <?php
        $qry_get_pesanan = mysqli_query($connection,"SELECT * FROM pesanan WHERE id ='".$_GET['id_pesanan']."'");
        $dt_pesanan = mysqli_fetch_array($qry_get_pesanan);
      ?>
      <div class="flex justify-center my-[5%]">
        <div class="bg-emerald-500 w-[25%] rounded-lg p-4">
          <h4 class="text-center text-3xl font-semibold">Detail Pesanan</h4>

          <table class="table-auto w-full bg-white rounded-lg">
            <tr class="">
              <td class="p-2 text-xl font-semibold">Pelanggan</td>
              <td class="p-2 text-xl font-semibold"><?= tmplNamaPl($dt_pesanan['ID_pelanggan']) ?></td>
            </tr>
            <tr class="">
              <td class="p-2 text-xl font-semibold">Resepsionis</td>
              <td class="p-2 text-xl font-semibold"><?= tmplNamaSt($dt_pesanan['ID_resepsionis']) ?></td>
            </tr>
            <tr class="">
              <td class="p-2 text-xl font-semibold">Tipe Kamar</td>
              <td class="p-2 text-xl font-semibold">
                <?php if ($dt_pesanan['tipe_kamar']== 'deluxe'){
                ?>
                  <p class="bg-yellow-300 text-white text-center rounded-lg p-2"><?=$dt_pesanan['tipe_kamar']?></p>
                <?php
                  }else{
                ?>
                  <p><?=$dt_pesanan['tipe_kamar']?></p>
                <?php
                }
                  ?>
              </td>
            </tr>
            <tr class="">
              <td class="p-2 text-xl font-semibold">Tanggal</td>
              <td class="p-2 text-xl font-semibold"><?= $dt_pesanan['tanggal'] ?></td>
            </tr>
            <tr class="">
              <td class="p-2 text-xl font-semibold">Harga</td>
              <td class="p-2 text-xl font-semibold"><?= $dt_pesanan['harga'] ?></td>
            </tr>
            <tr class="">
              <td class="p-2 text-xl font-semibold">Jumlah</td>
              <td class="p-2 text-xl font-semibold"><?= $dt_pesanan['jumlah'] ?></td>
            </tr>
            <tr class="">
              <td class="p-2 text-xl font-semibold">Status</td>
              <td class="p-2 text-xl font-semibold"><?php if($dt_pesanan['status'] == 'baru'){
                          ?>
                            <p class="bg-blue-400 text-white text-center rounded-lg p-2"><?=$dt_pesanan['status']?></p>
                          <?php
                          }elseif($dt_pesanan['status'] == 'check_in'){
                          ?>
                            <p class="bg-green-400 text-white text-center rounded-lg p-2"><?=$dt_pesanan['status']?></p>
                          <?php
                          }elseif($dt_pesanan['status'] == 'check_out'){
                          ?>
                          <p class="bg-red-400 text-white text-center rounded-lg p-2"><?=$dt_pesanan['status']?></p>
                          <?php
                          }
                          ?></td>
            </tr>
          </table>


        </div>
      </div>


    <script src="../js/scripts.js"></script>
  </body>
</html>
