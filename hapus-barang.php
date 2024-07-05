<?php
include 'layout/config/app.php';

$id_barang = (int)$_GET['id_barang'];

if (deleted_barang($id_barang) > 0){
    echo"<script>
    alert('data barang berhasil Dihapus');
    document.location.href = 'index.php';
    </script>";
    }else{
        echo"<script>
        alert('data barang gagal Dihapus');
        document.location.href = 'index.php';
        </script>";
}
?>