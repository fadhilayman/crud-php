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
if (isset($_POST['filter'])){

  $tgl_awal = strip_tags($_POST['tgl_awal']. " 00:00:00"); 
  $tgl_akhir = strip_tags($_POST['tgl_akhir']." 23:59:59");
  // query filter data
  $data_barang = select("SELECT * FROM barang WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_barang DESC");
  } else {
  // query tampil data dengan pagination
   $jmlhalaman = 4 ;
   $halamanaktif = 4;
  $data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");
  }

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
            <a href="tambah-barang.php" class="btn btn-primary btn-sm mb-2" data-toogle="modal"
            data-target="#modalFilter"><i class="fas fa-plus"></i> Tambah Barang </a>
            <button type="button" class="btn btn-success btn-sm mb-2">
               <i class="fas fa-search"> Filter Data </i>
            </button>
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

 <div class="mt-2 justify-content-end d-flex">
<nav aria-label="Page navigation example">
  <ul class="pagination">
          <?php if ($halamanaktif > 1) :?>
            <li class="page-item">
              <a class="page-link" href="?halaman=<?= $halamanaktif - 1 ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $jmlhalaman; $i++) : ?>
              <?php if($i == $halamanaktif) : ?>
                <li class="page-item active"><a class="page-link"href="?halaman=<?= $i; ?>"> <?= $i; ?> 
               </a>
           </li>
           <?php else : ?>
            <li class="page-item active"><a class="page-link"href="?halaman=<?= $i; ?>"> <?= $i; ?> 
            <?php endif ?>
            <?php endfor ?> 
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>
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
<div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                 <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-search"></i>Filter Data</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                            </div>
             <div class="modal-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="tgl_awal">Tanggal Awal</label>
                  <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                </div>

                <div class="form-group">
                  <label for="tgl_akhir">Tanggal Akhir</label>
                  <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                </div>

              </form>
             </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="button" class="btn btn-success btn-sm">Submit</button>
                    </div>
             </div>
        </div>
  </div>

  <?php include 'layout/footer.php'; ?>
 