<?php
$id = $_GET['id'];
$sql = "DELETE FROM tb_coffeesophia WHERE no_coffeesophia = '$id'";
$q = mysqli_query($k, $sql);
echo"<script>alert('Data berhasil dihapus');location='.?hal=coffeesophia'</script>";