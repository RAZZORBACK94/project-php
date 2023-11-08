
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
  <body class="bg-gray-100 relative min-h-[100%] pb-20">
    <!-- navabar -->
   <?php
   include "navbar.php"
   ?>

      <!-- isi  -->
      
      <div class="bg-gray-100 flex-1 p-6">
        
      

      <div>
        <div class="flex justify-between mb-5">
          <p class="text-3xl font-medium ">Pesanan</p>
          <button onclick="window.location='tambahPesanan.php'" class="flex bg-green-400 rounded-md px-3 hover:text-white hover:bg-green-800">
            <i class="fa-solid fa-plus my-auto mr-2 hover:stroke-black"></i>
            <p class="text-xl m-auto">Tambah</p>
          </button>
        </div>
        <table class="table-auto w-full">
          <tr class="bg-slate-300">
            <td class="text-center text-3xl font-semibold">resepsionis</td>
            <td class="text-center text-3xl font-semibold">tipe kamar</td>
            <td class="text-center text-3xl font-semibold">tanggal</td>
            <td class="text-center text-3xl font-semibold">status</td>
            <td class="text-center text-3xl font-semibold">opsi</td>
          </tr>
          
            <?php
            $qry_pesanan = mysqli_query($connection,"SELECT * FROM pesanan where ID_pelanggan = '".$_SESSION['id']."' ");
            

            while($data_pesanan=mysqli_fetch_array($qry_pesanan)){
            ?> 
              <div class="">
                <tr class="">
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
                      <a href="detail_pesanan.php?id_pesanan=<?=$data_pesanan['id']?>" class="p-3 my-auto bg-green-400 rounded-lg text-black hover:bg-green-700 hover:text-white">detail</a>
                    </td>
                </tr>
              </div>
            <?php
            }
            ?>
        </table>
        
      </div>


    </div>
    <?php
    include "footer.php";
    ?>
  </body>
</html>
