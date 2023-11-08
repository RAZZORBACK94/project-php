<!DOCTYPE html>
<html lang="en" class="h-[100%] box-border">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="dist/output.css" />
  <title>Document</title>
  <script>
    function hitung() {
      let $angka = document.getElementById("angka");
      let $number = parseInt(document.getElementById(".jumlah"));

      if ($tipe === "normal") {
        $tarif = 25000;
      } else if ($tipe === "deluxe") {
        $tarif = 50000;
      }

      $harga = $tarif * $number;
    }


  </script>
</head>

<body class="relative min-h-[100%] pb-20">
  <!-- navabar -->
  <?php
    include "navbar.php";

    if(isset($_POST['submit'])) 
  {
     tambahPesan($_POST);
  };
?>

  <div class="flex justify-center my-[5%]">
    <div class="bg-emerald-500 w-[25%] rounded-lg p-4">
      <h4 class="text-center text-3xl font-semibold mb-5">Menambah Pesanan</h4>
      <form action="" method="post">
      <div class="rounded-lg mb-5">
          <input name="id" value="<?=$_SESSION['id']?>" type="number" class="hidden text-base px-2 py-2.5  w-full rounded-lg ">
        </div>
        <div class="rounded-lg mb-5">
          <select id="tipe_kamar" name="tipe_kamar" value="" class="text-base px-2 py-2.5 flex w-full rounded-lg ">
            <option value=""></option>
            <option value="deluxe">Deluxe (Rp. 50.000)</option>
            <option value="normal">Normal (Rp. 25.000)</option>
          </select>
        </div>
        <div class="rounded-lg mb-5">
          <input name="tanggal" value="" type="date" class=" text-base px-2 py-2.5 flex w-full rounded-lg "
            placeholder="Masukkan tanggal">
        </div>
        <div class="rounded-lg mb-5">
          <input id="jumlah" name="jumlah" value="" type="number" class="number text-base px-2 py-2.5 flex w-full rounded-lg "
            placeholder="Masukkan jumlah">
        </div>
        <div class="rounded-lg mb-5">
          <input id="status" name="status" value="baru" type="number" class="hidden number text-base px-2 py-2.5 w-full rounded-lg "
            placeholder="Masukkan status">
        </div>
        <a href="#" onclick="" ><button type="submit" name="submit" onclick=""
            class="hover:bg-[#7BADFF] py-2 px-3 rounded-md w-full text-white text-center block  mb-5 bg-[#1953B2] ">Pesan</button></a>
      </form>
    </div>
  </div>



  <!--  -->



  <?php
   include "footer.php"
   ?>
  <script src="../js/scripts.js"></script>
</body>

</html>