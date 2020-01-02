<?php require 'layouts/header.php';
	include("components/dateFormat.php");

	$stock = query("SELECT SUM(jumlah) AS jumlah, barang.nama_barang, barang.stok FROM `reStok` RIGHT JOIN `barang` ON reStok.Id_barang = barang.id_barang WHERE tgl = '2019-06-01' GROUP BY barang.id_barang");
	//echo mysqli_error($connect);
?>


 <div class="container">
 	<h3 class="center">Laporan stok Barang</h3>
 	<table class="striped">
 		<thead>
 			<th>Nama Produk</th>
 			<th>Stok Awal (1 Juni 2019)</th>
 			<th>Stok Akhir <?=	tanggal_indo(date('Y-m-d'));?></th>
 		</thead>
 		<tbody>
 			<?php foreach ($stock as $brg): ?>
 				<tr>
	 				<td><?= $brg["nama_barang"]; ?></td>
	 				<td><?= $brg["jumlah"]; ?></td>
	 				<td><?= $brg["stok"]; ?></td>
	 			</tr>
 			<?php endforeach; ?>
 		</tbody>
 		
 	</table>

 	<div class="fixed-action-btn">
	  <a class="btn-floating btn-large  purple darken-3">
	    <i class="large material-icons">extension</i>
	  </a>
	  <ul>
	    <li><a class="btn-floating blue" href="tambah-barang.php"><i class="material-icons tooltipped" data-position="left" data-tooltip="Tambah">add</i></a></li>
	    <li><a class="btn-floating orange" href="restok.php"><i class="material-icons tooltipped" data-position="left" data-tooltip="Restock">system_update_alt</i></a></li>
	  </ul>
	</div>


 </div>

 <?php require("layouts/footer.php") ?>
