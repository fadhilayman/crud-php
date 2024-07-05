<?php
function select($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $result; 
}

function create_barang($post)
{
    global $db;
    
    $nama = strip_tags($post['nama']);
    $jumlah = strip_tags($post['jumlah']);  
    $harga = strip_tags($post['harga']);  
    $barcode =   rand(100000 , 999999);

    $query = "INSERT INTO barang (nama, jumlah, harga, barcode, tanggal) VALUES ('$nama', '$jumlah', '$harga','$barcode' ,CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_barang($post)
{
    global $db;

   $id_barang = $post['id_barang'];
   $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];
    $query = "UPDATE  barang SET nama = '$nama' , jumlah = '$jumlah', harga = '$harga' WHERE id_barang = '$id_barang'";

    mysqli_query($db, $query);

   return mysqli_affected_rows($db);

}
function deleted_barang($id_barang)
{
    global $db;
    $query = "DELETE FROM barang WHERE id_barang =$id_barang";
    mysqli_query($db, $query);

   return mysqli_affected_rows($db);

}


function create_mahasiswa($post)
{
    global $db;
    
    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $telpon = strip_tags($post['telpon']);
    $alamat = $post['alamat'];
    $email = strip_tags($post['email']);
    $foto = upload_file();

    $query = "INSERT INTO mahasiswa VALUES(null,'$nama', '$prodi', '$jk', '$telpon','$alamat','$email','$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_mahasiswa($post)
{
    global $db;
    
    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $telpon = strip_tags($post['telpon']);
    $alamat = $post['alamat'];
    $email = strip_tags($post['email']);
    $fotolama = strip_tags($post['fotolama']);

    if($_FILES['foto']['error'] == 4){
        $foto = $fotolama;
    } else {
        $foto = upload_file();
    }

    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk ='$jk', telpon ='$telpon', email='$email', alamat ='$alamat', foto='$foto' WHERE id_mahasiswa ='$id_mahasiswa'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
 function upload_file(){
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    $ekstensifileValid = ['jpg','jpeg','png'];
    $ekstensifile = explode('.', $namaFile);
    $ekstensifile = strtolower(end($ekstensifile));

    if(!in_array($ekstensifile,$ekstensifileValid)){
        echo"<script>
         alert('Format File Tidak Bisa');
         document.location.href = 'tambah-mahasiswa.php';
         </script>";
         die();
    }
    if($ukuranFile > 2048000){
        echo"<script>
         alert('Format File Tidak Valid');
         document.location.href = 'tambah-mahasiswa.php';
         </script>";
         die();
 } 
 $namaFileBaru = uniqid();
 $namaFileBaru .= '.';
 $namaFileBaru .= $ekstensifile;
 move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);

 return $namaFileBaru;
}
function delete_mahasiswa($id_mahasiswa)
{
    global $db;
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa =$id_mahasiswa";

    unlink("assets/img/". $foto);

    mysqli_query($db, $query);

   return mysqli_affected_rows($db);

}

function create_akun($post)
{
    global $db;
    
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    $password = password_hash($password, PASSWORD_DEFAULT);
   
    $query = "INSERT INTO akun VALUES(null , '$nama' ,'$username' ,'$email' ,'$password' ,'$level')";
 
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function delete_akun($id_akun)
{
    global $db;
    $query = "DELETE FROM akun WHERE id_akun =$id_akun";


    mysqli_query($db, $query);

   return mysqli_affected_rows($db);

}
function update_akun($post)
{
    global $db;
    
    $id_akun = strip_tags($post['id_akun']);
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);
   
    $query = "UPDATE akun SET nama= '$nama' ,username'$username' , email = '$email' , password = '$password' , level = '$level' WHERE id_akun =$id_akun)";
 
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
?>