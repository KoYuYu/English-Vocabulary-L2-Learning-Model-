<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//將session清空

$id = $_SESSION['email'];
unset($_SESSION['email']);


echo "<script>alert('登出成功！'); location.href = 'index.php';</script>";
?>