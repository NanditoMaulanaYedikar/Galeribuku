<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_jktplus WHERE no_jktplus = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=jktplus'</script>";