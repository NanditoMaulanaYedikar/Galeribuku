<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_buku WHERE no_buku = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=buku'</script>";