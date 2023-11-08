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
  <div class="bg-gray-100 flex-1 p-6">



    <div>

      <div class="w-full flex justify-between mb-5">
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
            <td class="flex justify-evenly">
              <a href="editPelanggan.php?id_pelanggan=<?=$data_pelanggan['id']?>" class="my-auto px-5 bg-blue-400 hover:bg-blue-800 rounded-lg text-white text-center">Edit</a>
              <a href="hapus.php?id_pelanggan=<?=$data_pelanggan['id']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="p-3 bg-red-400 hover:bg-red-800 text-center my-5 rounded-lg text-white">delete</button>
            </td>
          </tr>
        </div>
        <?php
              }
              
              ?>
      </table>
    </div>

  </div>


  </div>
</body>

</html>