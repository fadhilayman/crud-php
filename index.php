<?php 

session_start();
if(!isset($_SESSION['username'])) {
  header('location:login.php');
  }
 if(!isset($_SESSION['login'])){
  echo "<script>
           alert('login dulu');
           document.location.href = 'login.php';
           </script>";

           exit;
 }


 if($_SESSION["level"] !=1 and $_SESSION["level"] != 2){
  echo "<script>
  alert('Anda Tidak Punya Hak Akses');
  document.location.href = 'crud-modal.php';
  </script>";

  exit;
 }
 
 
 


include 'layout/layout.php';

$data_barang = select("SELECT * FROM barang ORDER BY id_barang ASC"); 
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
            <a href="tambah-barang.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Barang </a>
              <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col">Barcode</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; ?>
    <?php foreach($data_barang  as $barang) : ?>
    <tr>
      <th> <?= $no++; ?> </th>
      <td> <?= $barang['nama']; ?></td>
      <td> <?= $barang['jumlah']; ?></td>
      <td>Rp. <?= number_format($barang['harga']),0,',','.' ; ?></td>
      <td class="text-center"> <img alt="barcode" src="barcode.php?codetype=Code128&size=15&text=<?= $barang['barcode'];  ?>&print=true"></td>
      <td> <?= date("d/m/Y | H:i:s", strtotime($barang['tanggal'])); ?></td>
      <td width ="15%" class = "text-center">
      <a href="ubah-barang.php?id_barang=<?= $barang['id_barang'];?>" class="btn btn-outline-success">Edit</a>
      <a href="hapus-barang.php?id_barang=<?= $barang['id_barang'];?>" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>


      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<!--card body -->
</div>
<!--card -->
</div>
</div>
</div>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'layout/footer.php'; ?>
 