<?php


session_start();
if(!isset($_SESSION['login'])){
  echo "<script>
           alert('login dulu');
           document.location.href = 'login.php';
           </script>";

           exit;
 }



 if($_SESSION["level"] !=1 and $_SESSION["level"] != 3){
  echo "<script>
  alert('Anda Tidak Punya Hak Akses');
  document.location.href = 'crud-modal.php';
  </script>";

  exit;
 }
 

 $title = 'Daftar Mahasiswa';

include 'layout/layout.php';



$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY  id_mahasiswa DESC");
?>
<div class = "container mt-5">
<h1>Data Mahasiswa
</div>
<a href="tambah-mahasiswa.php" class= "btn btn-primary mb-1">Tambah + </a>
<a href="download-excel-mahasiswa.php" class= "btn btn-success mb-1"><i class="fas fa-file-excel"></li>Download Excel </a>
<a href="download-pdf-mahasiswa.php" class= "btn btn-danger mb-1"><i class="fas fa-file-pdf"></li>Download PDF </a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Prodi</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Telepon</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1; ?>
    <?php foreach($data_mahasiswa  as $mahasiswa) : ?>
    <tr>
      <th> <?= $no++; ?> </th>
      <td> <?= $mahasiswa['nama']; ?></td>
      <td> <?= $mahasiswa['prodi']; ?></td>
      <td> <?= $mahasiswa['jk']; ?></td>
      <td> <?= $mahasiswa['telpon']; ?></td>
      <td width ="15%" class = "text-center">
      <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-outline-secondary">Detail</a>
      <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-outline-success">Edit</a>
      <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include  'layout/footer.php';?>


