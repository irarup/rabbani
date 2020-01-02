<?php require("layouts/header.php");
	$barang = query("SELECT * FROM barang");
	$i=1;

	include("components/dateFormat.php");
 ?>

<div class="container">
	<h2 class="center">Data Barang</h2>
	<h5 class="center-align">Update : <?= tanggal_indo(date('Y-m-d')) ?></h5>
	<table class="striped">
	    <thead>
	      <tr>
	          <th>No</th>
	          <th>Nama Barang</th>
	          <th>Harga</th>
	          <th>Stok Barang</th>
	          <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
			<?php foreach ($barang as $brg) : ?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $brg["nama_barang"] ?></td>
					<td><?= "Rp. " . number_format($brg["harga"],2,',','.') . ",-"; ?></td>
					<td><?= $brg["stok"] ?></td>
					<td>
						<a class="btn blue" href="edit-barang.php?id=<?= $brg["id_barang"]?>"><i class="material-icons">mode_edit</i></a>
						<a class="waves-effect waves-light btn red modal-trigger" href="#delete"><i class="material-icons">delete</i></a>
					</td>
				</tr>
			<?php 
				$i++;
				endforeach;
			?>
		</tbody>
	</table>

	<hr>
 	<h5>Asumsi :</h5>
 	<p>#Soal 4 s/d 6<br>
 		<ol>
 			<li>Soal no 4 terdapat pada proses penyimpanan <a href="pembelian.php">form Pembelian</a></li>
 			<li>Soal no 5 <a href="data-pembelian.php">klik disini</a></li>
 			<li>Soal no 6 <a href="laporan-barang.php">klik disini</a></li>
 			<li>Semuanya stok saat pertama dibuat adalah 0.</li>
 			<li>Stok awal setiap tanggal berarti restok barang (Soal 4).</li>
 			<li>Setiap pembelian, berarti barang dibeli pelanggan.</li>
 		</ol>
 	</p>

</div>

<div class="fixed-action-btn">
  <a class="btn-floating btn-large  purple darken-3">
    <i class="large material-icons">extension</i>
  </a>
  <ul>
    <li><a class="btn-floating blue" href="tambah-barang.php"><i class="material-icons tooltipped" data-position="left" data-tooltip="Tambah">add</i></a></li>
    <li><a class="btn-floating orange" href="restok.php"><i class="material-icons tooltipped" data-position="left" data-tooltip="Restock">system_update_alt</i></a></li>
    <li><a class="btn-floating green" href="laporan-barang.php"><i class="material-icons tooltipped" data-position="left" data-tooltip="Laporan">assignment</i></a></li>
  </ul>
</div>
 

<!-- Modal Structure -->
  <div id="delete" class="modal" width="30%">
    <div class="modal-content">
      <h5 class="red-text">Yakin Hapus Data ?</h5>
    </div>
    <div class="modal-footer">
    	<a class="btn orange modal-close">Batal</i></a>
      	<a href="query/hapus-barang.php?id=<?= $brg["id_barang"]?>" class="btn waves-effect waves-green"><i class="material-icons">delete</i>Hapus</a>
    </div>
  </div>

<?php require("layouts/footer.php") ?>