<?php
include "koneksi.php";
?>
<h3 class="mt-4">Data Most Populer</h3>
<hr>
<a href=".?hal=tambahdata/tambahmostpopular" class="btn btn-primary" >Tambah data</a>
<div class="card-body">
    <table class="table table-stripet table-sm" id="datatablesSimple" widthe="100%" callspacing="0">
        <thead>
            <tr>
                <th>gambar</th>
                <th>jenis</th>
                <th>judul</th>
                <th>sinopsis</th>
            </tr>
        </thead>
        <tfoot> 
            <tr>
                <th>gambar</th>
                <th>jenis</th>
                <th>judul</th>
                <th>sinopsis</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $sql = "SELECT * FROM tb_mostpopular ORDER BY no_mostpopular DESC";
            $q = mysqli_query($k,$sql);
            while ($r = mysqli_fetch_assoc($q)){

            ?>
            <tr>
                <td>
                    <img src="../img/<?=$r['gambar']?>" alt="" height = "100" width="100">
                </td>
                <td><?=$r['judul']?></td>
                <td><?=$r['jenisrubrik']?></td>
                <td><?php echo nl2br(htmlspecialchars($r['sinopsis'])); ?></td>

                <td>
                    <a href=".?hal=ubahdata/ubahmostpopular&id=<?=$r['no_mostpopular']?>" class="btn btn-info btn-circle">
                            <i class="fas fa-info-circle"></i>
                    </a>
                    -
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href=".?hal=hapusdata/hapusmostpopular&id=<?=$r['no_mostpopular']?>"class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                    </a>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
