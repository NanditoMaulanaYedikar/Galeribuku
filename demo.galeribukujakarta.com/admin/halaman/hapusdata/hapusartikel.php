<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_artikel WHERE no_artikel = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=artikel'</script>";