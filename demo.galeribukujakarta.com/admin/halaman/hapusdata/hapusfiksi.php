<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = "DELETE FROM tb_fiksi WHERE no_fiksi = '$id'";
$q = mysqli_query($k, $sql);
echo "<script>alert('data berhasil di hapus');location='.?hal=fiksi'</script>";