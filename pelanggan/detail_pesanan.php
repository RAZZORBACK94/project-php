<!DOCTYPE html>
<html lang="en" class="h-[100%] box-border">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dist/output.css" />
    <title>Document</title>
  </head>
  <body class="relative min-h-[100%] pb-20">
    <!-- navabar -->
    <?php
     include "navbar.php";
    ?>

   <?php
        $qry_get_pesanan = mysqli_query($connection,"SELECT * FROM pesanan WHERE id ='".$_GET['id_pesanan']."'");
        $dt_pesanan = mysqli_fetch_array($qry_get_pesanan);
      ?>
      <div class="flex justify-center my-[5%]">
        <div class="bg-emerald-500 w-[25%] rounded-lg p-4">
          <h4 class="text-center text-3xl font-semibold">Detail Pesanan</h4>

          <table class="table-auto w-full bg-white rounded-lg my-4">
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
              <td class="p-2 text-xl font-semibold">harga</td>
              <td class="p-2 text-xl font-semibold"><?= $dt_pesanan['harga'] ?></td>
            </tr>
            <tr class="">
              <td class="p-2 text-xl font-semibold">jumlah</td>
              <td class="p-2 text-xl font-semibold"><?= $dt_pesanan['jumlah'] ?></td>
            </tr>
            <tr class="">
              <td class="p-2 text-xl font-semibold">status</td>
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

          <?php
              if($dt_pesanan['ID_resepsionis'] == 0){
                ?>
                <div class="w-full">
                <a href="hapus.php?id_pesanan=<?=$dt_pesanan['id']?>" onclick="return confrim('yakin ingin menghapus pesanan ini?')" class=" rounded-lg bg-red-500 text-2xl p-2 font-semibold mx-auto">Hapus Pesanan</a>
                </div>
            <?php
              }
              ?>

        </div>
      </div>

        <?php
        include "footer.php";
        ?>
      <script src="../js/scripts.js"></script>
  </body>
</html>
