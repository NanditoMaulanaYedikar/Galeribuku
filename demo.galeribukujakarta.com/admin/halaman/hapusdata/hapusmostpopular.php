<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_mostpopular WHERE no_mostpopular = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=mostpopular'</script>";