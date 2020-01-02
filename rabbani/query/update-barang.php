<?php 
	require("function.php");

	if(ISSET($_POST['action'])){

		$id = $_POST["id"];
		$nama = htmlspecialchars($_POST["nama_barang"]);
		$harga = $_POST["harga"];
		$stock = $_POST["stock"];

		
		$query = "UPDATE `barang` SET `nama_barang` = '$nama',`harga` = $harga,`stok` = $stock WHERE `id_barang` = $id";

		mysqli_query($connect, $query);
		echo mysqli_error($connect);

		$no = mysqli_affected_rows($connect);

		

		if ($no > 0) {
			echo "
				<script>
					document.location.href = '../barang.php';
					alert('Data berhasilkan diubah!');
				</script>
			";
		}else{
			echo "
				<script>
					alert('Data gagal diubah !');
					document.location.href = '../edit-barang.php?id=$id';
				</script>
			";
		}


	}


 ?>
