
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
    <?php
    include "navbar.php"

    if(isset($_POST['submit'])) 
    {
       ubahPelanggan($_POST);
    };
?>

   <?php
        $qry_get_diri = mysqli_query($connection,"SELECT * FROM pelanggan WHERE id ='".$_SESSION['id']."'");
        $dt_diri = mysqli_fetch_array($qry_get_diri);
      ?>
     <div class="flex justify-center my-[5%]">
        <div class="bg-emerald-500 w-[25%] rounded-lg p-4">
          <h4 class="text-center text-3xl font-semibold mb-5">Mengubah Data Diri</h4>
          <form action="" method="post">
                <div class="hidden">
                    <input type="text" name="id" value="<?=$dt_diri['id']?>">    
                </div>                  
                <div class="rounded-lg mb-5">
                    <p>Nama Diri:</p>
                    <input name="username" value="<?=$dt_diri['username']?>"  type="text" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Username">
                </div>
                <div class="rounded-lg mb-5">
                    <p>Email:</p>
                    <input name="email" value="<?=$dt_diri['email']?>" type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Email">
                </div>
                <div class="rounded-lg mb-5">
                    <p>Password:</p>
                    <input name="password" value="<?=md5($dt_diri['password'])?>" type="password" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Password">
                </div>
                <a href="#"><button onclick="" type="submit" name="submit" class="hover:bg-[#7BADFF] py-2 px-3 rounded-md w-full text-white text-center block  mb-5 bg-[#1953B2] ">Daftar</button></a>
                </form> 
        </div>
      </div>
      <?php
      include "footer.php"
      ?>


    <script src="../js/scripts.js"></script>
  </body>
</html>
