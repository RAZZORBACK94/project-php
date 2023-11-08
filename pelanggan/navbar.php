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

  <body class="">
    <!-- navabar -->
    <div class="sticky top-0 flex justify-around bg-black w-full h-[50%] py-5">
      <p class="text-white text-4xl font-semibold">permata puri</p>

      <div class="flex text-white my-auto">
        <a href="home_pelanggan.php" class="text-xl font-medium hover:text-black hover:bg-white rounded-full p-2 mr-5"> dashboard</a>
        <a href="pesanan.php" class="text-xl font-medium hover:text-black hover:bg-white rounded-full p-2 mr-5"> pesanan</a>
        <a href="saldo.php" class="text-xl font-medium hover:text-black hover:bg-white rounded-full p-2"> saldo</a>
      </div>

      <div class="flex justify-end items-center">

        <div class="dropdown relative">
          <button class="menu-btn flex flex-wrap items-center">
            <div class="w-8 h-8 overflow-hidden rounded-full">
              <img class="w-full h-full object-cover" src="./img/user.svg" />
            </div>

            <div class="ml-2 flex">
              <h1 class="text-xl font-semibold m-0 p-0 text-white">
                <?= $_SESSION['username']?>
              </h1>
              <i class="fad fa-chevron-down ml-2 my-auto text-xs leading-none"></i>
            </div>
          </button>

          <button class=" hidden fixed top-0 left-0 z-10 w-10 h-full menu-overflow"></button>
          <!-- drop menu -->
          <div class="text-gray-200 menu hidden bg-white shadow-md absolute z-20 right-50 rounded-lg w-40 mt-5 py-2 animated faster">
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

    <div>

    </div>

   
    <script src="../js/scripts.js"></script>
  </body>

</html>