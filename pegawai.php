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
 

 $title = 'Daftar Pegawai';

include 'layout/layout.php';

?>
<div class="content-wrapper">
<div class = "container mt-5">
<h1>Data Pegawai
  </h1>

</div>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Email</th>
      <th scope="col">Telepon</th>
      <th scope="col">Alamat</th>
    </tr>
  </thead>
  <tbody id="live_data">
 
  <?php

$data_pegawai = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC");
?>

<?php $no = 1; ?>
<?php foreach ($data_pegawai as $pegawai) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $pegawai['nama']; ?></td>
        <td><?= $pegawai['jabatan']; ?></td>
        <td><?= $pegawai['email']; ?></td>
        <td><?= $pegawai['telpon']; ?></td>
        <td><?= $pegawai['alamat']; ?></td>
    </tr>
    <?php endforeach; ?>


  </tbody>
</table>
</div>

<script>
    $('document').ready(function() {
        setInterval(function() {
            getPegawai();
        }, 200);
    });
    
    function getPegawai() {
        $.ajax({
            url: "realtime-pegawai.php",
            type: "GET", 
            
            success: function(response) {
              console.log(response);
                $('#live_data').html(response);
            }
        });
    }
</script>

<?php include  'layout/footer.php';?>


