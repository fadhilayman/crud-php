<?php
include 'layout/config/app.php';

$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0){
    echo"<script>
    alert('data Akun berhasil Dihapus');
    document.location.href = 'crud-modal.php';
    </script>";
    }else{
        echo"<script>
        alert('data Akun gagal Dihapus');
        document.location.href = 'crud-modal.php';
        </script>";
}
?>