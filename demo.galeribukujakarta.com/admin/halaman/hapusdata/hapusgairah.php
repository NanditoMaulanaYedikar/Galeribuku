<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_gairah WHERE no_gairah = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=gairah'</script>";