<?php
include "koneksi.php";
?>
<h3 class="mt-4">Form user</h3>
<hr>
<form method="post" action="">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input  name ="txtnama" class="form-control" type="text" placeholder="Masukkan nama" />
                <label for="inputFirstName">Nama</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input name ="txtuser" class="form-control" type="text" placeholder="Masukkan username" />
                <label>Username</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input name ="txtpassword" class="form-control" type="password" placeholder="Masukkan password" />
                <label>Password</label>
            </div>
        </div>
    </div>
    <div class="mt-4 mb-0">
        <div class="d-grid">
            <input type="submit" value="Simpan" name="simpan" class="btn btn-primary btn-block">
        </div>
    </div>
    <?php
        if (@$_POST['simpan']){
            $nama = $_POST['txtnama'];
            $user = $_POST['txtuser'];
            $password =$_POST['txtpassword'];
            mysqli_query($k, "INSERT INTO tb_user(nama_user,username,password)VALUES('$nama', '$user', '$password')")or die(mysqli_error($k));
            echo"<script>alert('Data berhasil disimpan');location='.?hal=user'</script>";
        }
    ?>
</form>