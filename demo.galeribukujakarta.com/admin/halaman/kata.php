<?php
include "koneksi.php";
?>
<h3 class="mt-4">Data Kata & Kota</h3>
<hr>
<a href=".?hal=tambahdata/tambahkata" class="btn btn-primary" >Tambah data</a>
<div class="card-body">
    <table class="table table-stripet table-sm" id="datatablesSimple" widthe="100%" callspacing="0">
        <thead>
            <tr>
                <th>gambar</th>
                <th>judul</th>
                <th>penulis </th>
            </tr>
        </thead>
        <tfoot> 
            <tr>
                <th>gambar</th>
                <th>judul</th>
                <th>penulis </th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $sql = "SELECT * FROM tb_kata ORDER BY no_kata DESC";
            $q = mysqli_query($k,$sql);
            while ($r = mysqli_fetch_assoc($q)){

            ?>
            <tr>
                <td>
                    <img src="../img/<?=$r['gambar']?>" alt="" height = "100" width="100">
                </td>
                <td><?=$r['judul']?></td>
                <td><?=$r['penulis']?></td>

                <td>
                    <a href=".?hal=ubahdata/ubahkata&id=<?=$r['no_kata']?>" class="btn btn-info btn-circle">
                            <i class="fas fa-info-circle"></i>
                    </a>
                    -
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href=".?hal=hapusdata/hapuskata&id=<?=$r['no_kata']?>"class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                    </a>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
