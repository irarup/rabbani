<?php 
	require("function.php");

	if(ISSET($_POST['submit'])){

		$barang = $_POST["barang"];
		$jumlah = $_POST["jumlah"];
		$tgl = $_POST["tgl"];
		$cash = $_POST["pembayaran"];
		$noncash = $_POST["pembayaran_non"];
		$diskon = $_POST["diskon"];

		$total = 0;

		for($i = 0; $i < count($barang); $i++) {
			$brg = query("SELECT * FROM barang WHERE id_barang = $barang[$i]")[0];

			$total = $total + $jumlah[$i] * $brg["harga"];

				if($brg["stok"] >= $jumlah[$i]){
					$stok[] = $brg["stok"] - $jumlah[$i];
				}elseif($stock < $jumlah || $stock2 < $jumlah2){
					echo "
						<script>
							alert('Jumlah melebihi stock, stock saat ini (". $brg['nama'] ." = " . $stock ." dan ". $brg2['nama'] ." = " . $stock2 ."!);
							document.location.href = 'pembelian.php';
						</script
					";
					exit();
				}

		};

		for($i = 0; $i > COUNT($barang); $i++){
			$brg = "UPDATE `barang` SET `stok` = $jumlah[$i] WHERE `id_barang` = $id";
			mysqli_query($connect, $brg);
		}


		if ($diskon == '') {
			$diskon=0;
		}


		if ($cash == '' && $noncash == ''){
			$noncash = $total - $diskon;
		}elseif($cash == '') {
			$cash = $total - $diskon - $noncash;
		}elseif ($cash !== '') {
			$noncash = $total - $cash - $diskon;
		}

		$tanggal = date('Y-m-d', strtotime($tgl));
		$beli = "INSERT INTO `pembelian`(`tgl_beli`,`total`,`cash`,`noncash`,`diskon`) VALUES ( '$tanggal', '$total', '$cash', '$noncash', '$diskon')";
		
		mysqli_query($connect, $beli);
		$idBeli = mysqli_insert_id($connect);

		for($i = 0; $i < count($jumlah); $i++){
			$detailbeli = "INSERT INTO `detail_beli` (`id_pembelian`,`id_barang`,`jumlah`) VALUES ($idBeli, $barang[$i], $jumlah[$i])";
			mysqli_query($connect, $detailbeli);
		}


			echo mysqli_error($connect);

		$no = mysqli_affected_rows($connect);



		if ($no > 0) {
			echo "
				<script>
					alert('Data berhasilkan ditambahkan !');
					document.location.href = '../data-pembelian.php';
				</script>
			";
		}else{
			echo "
				<script>
					alert('Data gagal ditambahkan !');
					document.location.href = '../pembelian.php';
				</script>
			";
		}
	}

 ?>