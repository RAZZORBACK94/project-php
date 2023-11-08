
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

    <p class="text-6xl font-semibold ml-10 mt-5 ">Saldo</p>

    <div class="flex bg-slate-200 rounded-lg w-fit mx-auto my-5">
      <p class="text-5xl font-medium p-5">Rp.<?=$_SESSION['saldo']?></p>
      <button class=" flex justify-items-end bg-blue-300 rounded-lg w-fit text-white text-5xl hover:text-black hover:bg-blue-500"><i class="fa-solid fa-plus fa-2xl my-auto mr-2"></i></button>
    </div>

    <div class=" w-2/3 mx-auto">
      <p class="font-semibold text-3xl">History Pemesanan</p>
      <table class="table-auto w-full mb-40">
            <tr class="bg-slate-300">
              <td class="text-center text-xl font-semibold">tipe kamar</td>
              <td class="text-center text-xl font-semibold">tanggal</td>
              <td class="text-center text-xl font-semibold">harga</td>
            </tr>
            
              <?php
              $qry_pesanan = mysqli_query($connection,"SELECT * FROM pesanan where ID_pelanggan = '".$_SESSION['id']."' AND ID_resepsionis != 0  ");
              

              while($data_pesanan=mysqli_fetch_array($qry_pesanan)){
              ?> 
                <div class="">
                  <tr class="bg-slate-200">
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
                      <td class="text-center my-5"><?=$data_pesanan['harga']?></td>
                  </tr>
                </div>
              <?php
              }
              ?>
          </table>
    </div>


      
      
    <?php
    include "footer.php";
    ?>
  </body>
</html>
