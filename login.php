 <?php
include 'config.php';
require 'funtions.php';

if(isset($_POST['submit'])) 
  {
    login($_POST);
  };

?> 


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="./src/input.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .main{
        background-image: url(.img/bgweb.jpg);
        background-size: cover;
        background-attachment: fixed;
      }
    </style>
    <title>Document</title>
  </head>
  <body>
    <div class="flex justify-center items-center min-h-screen">
       
      <div data-aos="zoom-in" data-aos-duration="1600" class=" flex w-2/3  shadow-lg bg-white rounded-md" >
          <div class="w-1/2  sm:block hidden">
              <img src="img/log.jpg" alt="" class=" h-[550px] w-full rounded-l-md">
          </div>
          <div class="m-auto py-8 ">
          
              <h2 class="text-2xl  font-bold text-center">Selamat Datang Teman</h2>
              <p class=" text-sm font-light text-center text-gray-500 mb-5">tekan tombol untuk detail lebih lanjut</p>
             
              <div class="flex justify-between mb-5">
                  <button class=" bg-[#1E65D9] py-2 px-3 rounded-xl w-full mr-5 text-white text-center">Masuk</button>
                  <button onclick="window.location='register.php'" class="placeholder: bg-[#7BADFF] py-2 px-3 rounded-xl w-full text-white text-center hover:bg-[#1953B2]">Daftar</button></a>
              </div>
              <form action= "" method="post">      
              <div class="border border-black rounded-lg mb-5">
                  <input type="username" name="username" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Username">
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="password" name="password" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Password">
              </div>
              <!-- button continue -->
             <a href="#"><button type="submit" name="submit" class="bg-[#1E65D9]  py-2 px-3 rounded-md w-full text-white  mb-5  hover:[]" >Lanjut</button></a>
             </form>
           
          </div>            
      </div>
  </div>
    </div>
    <script>
      AOS.init();
        </script>
  </body>
</html>
