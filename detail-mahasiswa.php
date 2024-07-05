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

$title = 'Detail Mahasiswa';

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$data_mahasiswa = mysqli_query($db,"SELECT * FROM mahasiswa WHERE id_mahasiswa=$id_mahasiswa");

 ($mahasiswa = mysqli_fetch_array($data_mahasiswa)) 

?>
<div class = "container mt-5">
<h1>Data <?=$mahasiswa['nama']?></h1>
<hr>

<table class="table table-bordered table-striped">
 <tr>
    <td> Nama </td>
    <td>: <?= $mahasiswa['nama'] ?> </td>
</tr>
<tr>
    <td> Program Studi </td>
    <td>: <?= $mahasiswa['prodi'] ?> </td>
</tr>
<tr>
    <td> Jenis Kelamin </td>
    <td>: <?= $mahasiswa['jk'] ?> </td>
</tr>
<tr>
    <td> telpon </td>
    <td>: <?= $mahasiswa['telpon'] ?> </td>
</tr>
<tr>
    <td> Alamat </td>
    <td>: <?= $mahasiswa['alamat'] ?> </td>
</tr>
<tr>
    <td> Email </td>
    <td>: <?= $mahasiswa['email'] ?> </td>
</tr>

<tr>
    <td> foto </td>
    <td>: <a href="assets/img/<?= $mahasiswa[ 'foto' ] ?>">
         <img src="assets/img/<?= $mahasiswa['foto'] ?>" alt="foto" width="50%">
        </a>
</tr>
</table>
<a href="mahasiswa.php" class="btn btn-outline-secondary" style="float : right; ">Kembali</a>
</div>
<?php include  'layout/footer.php';?>


