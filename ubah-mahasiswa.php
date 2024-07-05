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
    if (update_mahasiswa($_POST) > 0  ){
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


$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = mysqli_query($db,"SELECT * FROM mahasiswa WHERE id_mahasiswa=$id_mahasiswa");

while ($data_mahasiswa = mysqli_fetch_array($mahasiswa)) {
    $id_mahasiswa1 = $data_mahasiswa['id_mahasiswa'];
    $nama = $data_mahasiswa['nama'];
    $prodi = $data_mahasiswa['prodi'];
    $jk = $data_mahasiswa['jk'];
    $telpon = $data_mahasiswa['telpon'];
    $email = $data_mahasiswa['email'];
    $alamat = $data_mahasiswa['alamat'];
    $foto = $data_mahasiswa['foto'];
}

?>
<div class = "container mt-5">
<h1> Ubah Data Mahasiswa
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">

    <input type="hidden" name="id_mahasiswa" value="<? $id_mahasiswa?>">
    <input type="hidden" name="foto_lama" value="<? $foto?>">

        <label for="nama" class="form-label">Nama Siswa </label>
        <input type="text"class="form-control"id="nama" name="nama" value="<?= $nama?>" placeholder="Nama Siswa..."required>
    </div>
    <div class="row">
    <div class="mb-3 col-6">
        <label for="prodi" class="form-label">Program Studi </label>
        <select name="prodi" id="prodi"  class="form-control" required>
                           <?= $prodi?>
            <option value="Teknik Informatika"<?= $prodi =='Teknik Informatika' ?'selected': null ?>>Teknik Informatika</option>

            <option value="Teknik Mesin"<?= $prodi =='Teknik Mesin' ?'selected': null ?>>Teknik Mesin</option>
            <option value="Teknik Listrik"<?= $prodi =='Teknik Listrik' ?'selected': null ?>>Teknik Listrik</option>
        </select>
    </div>
    <div class="mb-3 col-6">
        <label for="jk" class="form-label">Jenis Kelamin </label>
        <select name="jk" id="jk" class="form-control" required>
                           <?= $jk?>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-Laki"<?= $jk =='Laki-Laki' ?'selected': null ?>>Laki-Laki</option>
            <option value="Perempuan"<?= $jk =='Perempuan' ?'selected': null ?>>Perempuan</option>
            </select>
    </div>
    </div>
    <div class="mb-3">
        <label for="telpon" class="form-label">telpon </label>
        <input type="number"class="form-control"id="telpon" name="telpon" value="<?= $telpon?>" placeholder="Telpon Siswa..."required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email </label>
        <input type="email"class="form-control"id="email" name="email" value="<?= $email?>" placeholder="email Siswa..."required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">alamat </label>
        <input type="alamat"class="form-control"id="alamat" name="alamat" value="<?= $alamat?>" placeholder="alamat Siswa..."required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">foto </label>
        <input type="file"class="form-control"id="foto" name="foto"  placeholder="foto Siswa..."required>

        <p>
        <small> Gambar Sebelumnya</small>
        </p>
        <img src="assets/img/<?=$foto?>"alt="foto" width="100px">
    </div>
    <input type="submit" name="tambah" class="btn btn-primary" style="float: right;">
</form>
</div>
    <?php include 'layout/footer.php'; ?>