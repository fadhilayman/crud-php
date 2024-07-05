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

if (isset($_POST['tambah'])){
    if (create_mahasiswa($_POST) > 0  ){
        echo"<script>
        alert('data siswa berhasil ditambahkan');
        document.location.href = 'mahasiswa.php';
        </script>";
        }else{
            echo"<script>
            alert('data siswa gagal ditambahkan');
            document.location.href = 'mahasiswa.php';
            </script>";
    }
}




?>
<div class = "container mt-5">
<h1> Tambah Data Mahasiswa
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Siswa </label>
        <input type="text"class="form-control"id="nama" name="nama" placeholder="Nama Siswa..."required>
    </div>
    <div class="row">
    <div class="mb-3 col-6">
        <label for="prodi" class="form-label">Program Studi </label>
        <select name="prodi" id="prodi"  class="form-control" required>
            <option value="">Pilih Program Studi</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Mesin">Teknik Mesin</option>
            <option value="Teknik Listrik">Teknik Listrik</option>
        </select>
    </div>
    <div class="mb-3 col-6">
        <label for="jk" class="form-label">Jenis Kelamin </label>
        <select name="jk" id="jk" class="form-control" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
    </div>
    </div>
    <div class="mb-3">
        <label for="telpon" class="form-label">telpon </label>
        <input type="number"class="form-control"id="telpon" name="telpon" placeholder="Telpon Siswa..."required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat </label>
        <textarea name="alamat" id="alamat" placeholder="alamat Siswa..."required></textarea>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email </label>
        <input type="email"class="form-control"id="email" name="email" placeholder="email Siswa..."required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">foto </label>
        <input type="file"class="form-control"id="foto" name="foto" placeholder="foto Siswa..."required
        onchange="previewImg()">

        <img src="assets/img/<?=$foto?>"alt=""class="img-thumbnail img-preview mt-2" width="100px">
    </div>
    <input type="submit" name="tambah" class="btn btn-primary" style="float: right;">
</form>
</div>
    <?php include 'layout/footer.php'; ?>