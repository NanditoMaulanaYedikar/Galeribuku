<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_user WHERE id_user = '$id'";
    $q = mysqli_query($k, $sql);
    $r = mysqli_fetch_assoc($q);
?>
<h3 class="mt-4">Form user</h3>
<hr>
<form method="post" action="">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
                <input  name ="txtnama" value="<?=$r['nama_user']?>" class="form-control" type="text" placeholder="Masukkan nama" />
                <label for="inputFirstName">Nama</label>
            </div>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input name ="txtuser" value="<?=$r['username']?>"class="form-control" type="text" placeholder="Masukkan username" />
                <label>Username</label>
            </div>
        </div>
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
            $password = $_POST['txtpassword'];
            if(empty($password)){
                mysqli_query($k, "UPDATE tb_user SET nama_user = '$nama', username ='$user' WHERE id_user = '$id'")or die(mysqli_error($k).mysqli_errno($k));
            }
            else{
                mysqli_query($k, "UPDATE tb_user SET nama_user = '$nama', username ='$user', password = '$password' WHERE id_user = '$id'");
            }
            echo"<script>alert('Data berhasil disimpan');location='.?hal=user'</script>";
        }
    ?>
</form>