<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_pemikiran WHERE no_pemikiran = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=pemikiran'</script>";