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
 require 'layout/config/app.php';
 

$data_barang = select("SELECT * FROM mahasiswa");

$content = '';

$content .= '<style type="text/css">
   .gambar {
     width: 50px;   

}
     </style>';

     $content .= '
     <page>
     <table class="table table-bordered table-striped">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Prodi</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Telepon</th>
      <th scope="col">Aksi</th>
    </tr>';

    $no=1;
    foreach ($data_barang as $mahasiswa){
        $content  .='
        <tr>
         <td>'.  $no++ . '</td>
         <td>'.$mahasiswa['nama'].'</td>
         <td>'.$mahasiswa['prodi'].'</td>
         <td>'.$mahasiswa['jk'].'</td>
         <td>'.$mahasiswa['telpon'].'</td>
         <td><img src="assets/img/'.$mahasiswa['foto'].'" class="gambar"></td
        </tr>
        ';

    }

   $content .='
    </table>
    </page>';



    echo "$content"
    ?>
    <script>
      window.print()
    </script>
