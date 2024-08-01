<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_user WHERE id_user = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=user'</script>";