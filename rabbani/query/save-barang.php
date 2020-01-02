<?php 
	require("function.php");

	if(ISSET($_POST['action'])){

		$nama = htmlspecialchars($_POST["nama_barang"]);
		$harga = $_POST["harga"];
		$stock = $_POST["stock"];

		
		$query = "INSERT INTO `barang` (`nama_barang`,`harga`,`stok`) VALUES ('$nama', $harga, $stock)";

		mysqli_query($connect, $query);
		echo mysqli_error($connect);

		$no = mysqli_affected_rows($connect);

		

		if ($no > 0) {
			echo "
				<script>
					document.location.href = '../barang.php';
					alert('Data berhasilkan ditambahkan !');
				</script>
			";
		}else{
			echo "
				<script>
					alert('Data gagal ditambahkan !');
					document.location.href = '../tambah-barang.php';
				</script>
			";
		}


	}


 ?>