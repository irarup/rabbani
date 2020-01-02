<?php 
	require("function.php");
	$id = $_GET['id'];
	mysqli_query($connect,"DELETE FROM barang WHERE id_barang = $id");
	echo "<script>
		document.location.href = '../barang.php';
	</script>";
 ?>