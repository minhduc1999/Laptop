<?php require ("include/header.php") ?>
<?php
if (isset($_SESSION['gio_hang'])) {
	$id = $_GET['id'];
	$gia = $_GET['gia'];
	$_SESSION['gio_hang_soluong']--;
	$_SESSION['gio_hang_tongtien'] -= $gia;
	unset($_SESSION['gio_hang'][$id]);
	echo "<script> window.location = 'gio_hang.php';</script>";
}

?>