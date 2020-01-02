<?php 

require("function.php");

if(ISSET($_POST["action"])){

	$id = $_POST["barang"];
	$tgl = date('Y-m-d', strtotime($_POST["tgl"]));
	$jumlah = $_POST["jumlah"];

	$stock = query("SELECT * FROM barang WHERE id_barang = $id")[0];

	print_r($stock);

	$newStock = $stock["stok"] + $jumlah;

	echo $newStock;

	$update = "UPDATE barang SET stok = $newStock WHERE id_barang = $id";
	$save = "INSERT INTO `reStok` (`id_barang`,`tgl`,`jumlah`) VALUES ($id, '$tgl', $jumlah)";

	mysqli_query($connect, $update);
	mysqli_query($connect, $save);

	echo mysqli_error($connect);
	

	$no = mysqli_affected_rows($connect);


		if ($no > 0) {
			echo "
				<script>
					alert('Data berhasilkan ditambahkan !');
					document.location.href = '../laporan-barang.php';
				</script>
			";
		}else{
			echo "
				<script>
					alert('Data gagal ditambahkan !');
					document.location.href = 'restock.php';
				</script>
			";

		}
}else{
	header("location: ../restok.php");
}
?>