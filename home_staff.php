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
    <div class="flex items-center p-6 bg-white border-b border-gray-200 px-14 ">
      <div class="flex-none w-48 flex flex-row items-center mr-[20%]">
        <p class="ml-1 flex-1 text-2xl text-black font-bold">Permata puri</p>
      </div>

      <div class="flex justify-between mr-auto w-[33%]">
        <a href="home_staff.php" class="text-xl font-medium"> dashboard</a>
        <a href="staff/Staff.php" class="text-xl font-medium"> staff</a>
        <a href="staff/pelanggan.php" class="text-xl font-medium"> pelanggan</a>
        <a href="staff/pesananTr.php" class="text-xl font-medium"> pesanan</a>
      </div>


      <!-- user -->
      <div class="flex justify-end items-center">
        
        <div class="dropdown relative">
          <button class="menu-btn flex flex-wrap items-center">
            <div class="w-8 h-8 overflow-hidden rounded-full">
              <img class="w-full h-full object-cover" src="./img/user.svg" />
            </div>

            <div class="ml-2 flex">
              <h1 class="text-base font-semibold m-0 p-0"><?= $_SESSION['username']?></h1>
              <i class="fad fa-chevron-down ml-2 my-auto text-xs leading-none"></i>
            </div>
          </button>

          <button class=" hidden fixed top-0 left-0 z-10 w-10 h-full menu-overflow"></button>
          <!-- drop menu -->
          <div class="text-gray-200 menu hidden bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
            <a class="px-4 py-2 block font-medium text-sm tracking-wide bg-white hover:bg-gray-50 hover:text-orange-400" href="">
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

    <div class="p-10">
      <p class="text-3xl font-semibold mb-10">selamat Datang <?=$_SESSION['username']?></p>


      <div class="w-full">
      <p class="text-3xl font-semibold">Anda memiliki  3 pesanan</p>
      <table class="pesanTr table-auto w-full">
          <tr class="bg-slate-200">
            <td class="text-center text-xl font-semibold">id</td>
            <td class="text-center text-xl font-semibold">pelanggan</td>
            <td class="text-center text-xl font-semibold">tipe kamar</td>
            <td class="text-center text-xl font-semibold">tanggal</td>
            <td class="text-center text-xl font-semibold">status</td>
            <td class="text-center text-xl font-semibold">opsi</td>
          </tr>
          
            <?php
            $qry_pesanan = mysqli_query($connection,"SELECT * FROM pesanan where ID_resepsionis = '".$_SESSION['id']."' ");
            

            while($data_pesanan=mysqli_fetch_array($qry_pesanan)){
            ?> 
              <div class="">
                <tr class="">
                    <td class="text-center my-5"><?=$data_pesanan['id']?></td>
                    <td class="text-center my-5"><?=tmplNamaPl($data_pesanan['ID_pelanggan'])?></td>
                    <td class="text-center my-5"><?php if ($data_pesanan['tipe_kamar']== 'deluxe'){
                ?>
                  <p class="bg-yellow-300 text-white text-center rounded-lg p-2"><?=$data_pesanan['tipe_kamar']?></p>
                <?php
                  }else{
                ?>
                  <p><?=$data_pesanan['tipe_kamar']?></p>
                <?php
                }
                ?></td>
                    <td class="text-center my-5"><?=$data_pesanan['tanggal']?></td>
                    <td class="my-5"><?php if($data_pesanan['status'] == 'baru'){
                          ?>
                            <p class="bg-blue-400 text-white text-center rounded-lg p-2"><?=$data_pesanan['status']?></p>
                          <?php
                          }elseif($data_pesanan['status'] == 'check_in'){
                          ?>
                            <p class="bg-green-400 text-white text-center rounded-lg p-2"><?=$data_pesanan['status']?></p>
                          <?php
                          }elseif($data_pesanan['status'] == 'check_out'){
                          ?>
                          <p class="bg-red-400 text-white text-center rounded-lg p-2"><?=$data_pesanan['status']?></p>
                          <?php
                          }
                          ?></td>
                    <td class="flex justify-evenly my-5">
                      <a href="detail_pesanan.php?id_pesanan=<?=$data_pesanan['id']?>" class="p-3 my-auto bg-green-500 rounded-lg text-white">detail</a>
                    </td>
                </tr>
              </div>
            <?php
            }
            ?>
        </table>
      </div>

    </div>

    <script src="./js/scripts.js"></script>
  </body>
</html>
