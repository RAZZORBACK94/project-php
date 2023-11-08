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
    <?php
   include "navbar.php"
   ?>
      <!-- isi  -->
      
      <div class="bg-gray-100 flex-1 p-6">
        
      

      <div>
        <p class="text-3xl font-medium mb-5">pesanan</p>
        <table class="table-auto w-full">
          <tr class="bg-slate-200">
            <td class="text-center text-xl font-semibold">id</td>
            <td class="text-center text-xl font-semibold">pelanggan</td>
            <td class="text-center text-xl font-semibold">resepsionis</td>
            <td class="text-center text-xl font-semibold">tipe kamar</td>
            <td class="text-center text-xl font-semibold">tanggal</td>
            <td class="text-center text-xl font-semibold">status</td>
            <td class="text-center text-xl font-semibold">opsi</td>
          </tr>
          
            <?php
            $qry_pesanan = mysqli_query($connection,"SELECT * FROM pesanan");
            

            while($data_pesanan=mysqli_fetch_array($qry_pesanan)){
            ?> 
              <div class="">
                <tr class="">
                    <td class="text-center my-5"><?=$data_pesanan['id']?></td>
                    <td class="text-center my-5"><?=tmplNamaPl($data_pesanan['ID_pelanggan'])?></td>
                    <td class="text-center my-5"><?=tmplNamaSt($data_pesanan['ID_resepsionis'])?></td>
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

  </body>
</html>
