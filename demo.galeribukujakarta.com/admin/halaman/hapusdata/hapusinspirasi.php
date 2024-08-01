<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_inspirasi WHERE no_inspirasi = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=inspirasi'</script>";