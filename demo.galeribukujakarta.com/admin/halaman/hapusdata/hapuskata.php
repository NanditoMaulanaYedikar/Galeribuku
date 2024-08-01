<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = "DELETE FROM tb_kata WHERE no_kata = '$id'";
$q = mysqli_query($k, $sql);
echo "<script>alert('data berhasil di hapus');location='.?hal=kata'</script>";