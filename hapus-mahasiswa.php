<?php

include 'layout/config/app.php';
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if (delete_mahasiswa($id_mahasiswa) > 0){
    echo"<script>
    alert('data barang berhasil dihapus');
    document.location.href = 'mahasiswa.php';
    </script>";
    }else{
        echo"<script>
        alert('data barang gagal dihapus');
        document.location.href = 'mahasiswa.php';
        </script>";

}
?>