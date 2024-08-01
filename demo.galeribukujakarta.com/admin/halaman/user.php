<?php
include "koneksi.php";
?>
<h3 class="mt-4">Data User</h3>
<hr>
<a href=".?hal=tambahdata/tambahuser" class="btn btn-primary" >Tambah data</a>
<div class="card-body">
    <table class="table table-stripet table-sm" id="datatablesSimple" widthe="100%" callspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot> 
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Aksi</th>

            </tr>
        </tfoot>
        <tbody>
            <?php
            $sql = "SELECT * FROM tb_user";
            $q = mysqli_query($k,$sql);
            while ($r = mysqli_fetch_assoc($q)){

            ?>
            <tr>
                <td><?=$r['nama_user']?></td>
                <td><?=$r['username']?></td>
                <td>
                    <a href=".?hal=ubahdata/ubahuser&id=<?=$r['id_user']?>" class="btn btn-info btn-circle">
                            <i class="fas fa-info-circle"></i>
                    </a>
                    -
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href=".?hal=hapusdata/hapususer&id=<?=$r['id_user']?>"class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                    </a>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
