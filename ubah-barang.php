<?php


session_start();
if(!isset($_SESSION['login'])){
    echo "<script>
             alert('login dulu');
             document.location.href = 'login.php';
             </script>";
  
             exit;
   }
  
  

include 'layout/layout.php'; 


$id_barang = (int)$_GET['id_barang'];

$barang = mysqli_query($db,"SELECT * FROM barang WHERE id_barang=$id_barang");
$data = mysqli_fetch_array($barang);



if (isset($_POST['ubah'])){
    if (update_barang($_POST) > 0  ){
        echo"<script>
        alert('data barang berhasil diubah');
        document.location.href = 'index.php';
        </script>";
        }else{
            echo"<script>
            alert('data barang gagal diubah');
            document.location.href = 'index.php';
            </script>";
    }
}




?>
<div class = "container mt-5">
<h1> Ubah Data Barang
</div>
<form action="" method="post">

 <input type="hidden" name="id_barang" value="<?= $data['id_barang'];?>">


    <div class="mb-3">
        <label for="nama" class="form-label">Nama Barang </label>
        <input type="text"class="form-control"id="nama" name="nama" value="<?= $data['nama']; ?>" placeholder="Nama Barang..."required>
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Barang </label>
        <input type="number"class="form-control"id="jumlah" name="jumlah" value="<?= $data['jumlah']; ?>" placeholder="Jumlah Barang..."required>

    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga Barang </label>
        <input type="number"class="form-control"id="harga" name="harga" value="<?= $data['harga']; ?>" placeholder="Harga Barang..."required>

    </div>
    <button type="submit" name="ubah" class="btn btn-primary" style="float: right;"> Ubah </button>
</form>
</div>
    <?php include 'layout/footer.php'; ?>