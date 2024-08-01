<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_writingtips WHERE no_writingtips = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=writingtips'</script>";