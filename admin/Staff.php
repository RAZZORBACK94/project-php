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
  <link rel="stylesheet" href="src/input.css" />
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

      <div class="w-full flex justify-between mb-5">
        <p class="text-3xl font-medium ">Staff</p>
        <button onclick="window.location='tambahStaff.php'"
          class="flex bg-green-400 rounded-md px-3 hover:text-white hover:bg-green-800">
          <i class="fa-solid fa-plus stroke-white my-auto mr-2 hover:stroke-black"></i>
          <p class="text-xl m-auto">Tambah</p>
        </button>
      </div>

    </div>

    <table class="table-auto w-full rounded-lg">
      <tr class="bg-slate-200">
        <td class="text-center text-xl font-semibold">Username</td>
        <td class="text-center text-xl font-semibold">Email</td>
        <td class="text-center text-xl font-semibold">Posisi</td>
        <td class="text-center text-xl font-semibold">Action</td>
      </tr>

      <?php
            $qry_staff = mysqli_query($connection,"SELECT * FROM user");
            

            while($data_staff=mysqli_fetch_array($qry_staff)){
            ?>
      <div class="">
        <tr class="p-3">
          <td class="text-center mb-5">
            <?=$data_staff['username']?>
          </td>
          <td class="text-center mb-5">
            <?=$data_staff['email']?>
          </td>
          <td class="text-center mb-5">
            <?php if($data_staff['role'] == 'admin'){
                          ?>
            <p class="bg-blue-400 text-white text-center mb-5 rounded-lg p-2">
              <?=$data_staff['role']?>
            </p>
            <?php
                          }elseif($data_staff['role'] == 'resepsionis'){
                          ?>
            <p class="bg-green-400 text-white text-center mb-5 rounded-lg p-2">
              <?=$data_staff['role']?>
            </p>
            <?php
                          }
                          ?>
          </td>
          <td class="flex justify-center mb-5">
            <a href="editStaff.php?id_staff=<?=$data_staff['id']?>" class="p-2 bg-blue-500 text-center rounded-lg px-2 text-white">edit</a>
            <a href="hapus.php?id_staff=<?=$data_staff['id']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="p-3 bg-red-400 hover:bg-red-800 text-center rounded-lg text-white">delete</button>
          </td>
        </tr>
      </div>
      <?php
            }
            ?>
    </table>

  </div>


  </div>

  <script src="../js/scripts.js"></script>
</body>

</html>