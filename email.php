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

  //  if (create_barang($_POST) > 0  ){
    //    echo"<script>
      //  alert('data barang berhasil ditambahkan');
        //document.location.href = 'index.php';
        //</script>";
        //}else{
          //  echo"<script>
            //alert('data barang gagal ditambahkan');
           // document.location.href = 'index.php';
            //</script>";
    //}





?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class = "container mt-5">
<h1> Kirim Email 
</div>
<form action="" method="post">
    <div class="mb-3">
        <label for="email penerima" class="form-label">Email penerima </label>
        <input type="text"class="form-control"id="email penerima" name="email penerima" placeholder="Email penerima..."required>
    </div>
    <div class="mb-3">
        <label for="subject" class="form-label">Subject </label>
        <input type="number"class="form-control"id="subject" name="subject" placeholder="Subject..."required>
    </div>
    <div class="mb-3">
        <label for="pesan" class="form-label">Pesan </label>
        <textarea id="pesan" name="pesan" cols="30" rows="10" class="form-control"> </textarea>
    </div>
    <button type="submit" name="kirim" class="btn btn-primary" style="float: right;"> Kirim </button>
</form>
</div>
  </div>
  </div>
  <?php include 'layout/footer.php'; ?>
 