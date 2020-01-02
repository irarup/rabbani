<?php require("layouts/header.php");
	require "components/dateFormat.php";
	$transaksi = query("SELECT * FROM pembelian");
	$i = 1;
 ?>

<div class="container">
	<h2 class="center">Data Pembelian</h2>
	<h5 class="center-align">Update : <?= tanggal_indo(date('Y-m-d')) ?></h5>
	<table class="striped">
	    <thead>
	      <tr>
	          <th>No</th>
	          <th>Tanggal Transaksi</th>
	          <th>Cash</th>
	          <th>Non Cash</th>
	          <th>Diskon</th>
	          <th>Total</th>
	      </tr>
	    </thead>
	    <tbody>
			<?php 
	
			foreach ($transaksi as $trx) : 
				$id = $trx['id_pembelian'];
			?>
				<tr>
					<td><?= $i ?></td>
					<td><?= tanggal_indo($trx["tgl_beli"]) ?></td>
					<td><?= "Rp. " . number_format($trx["cash"],0,',','.') . ",-"; ?></td>
					<td><?= "Rp. " . number_format($trx["noncash"],0,',','.') . ",-"; ?></td>
					<td><?= "Rp. " . number_format($trx["diskon"],0,',','.') . ",-"; ?></td>
					<td><?= "Rp. " . number_format($trx["total"],0,',','.') . ",-"; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><a class="btn green"><i class="small material-icons show_hide" data-target="<?= $id ?>">expand_more</i></a></td>
					<td colspan="4">
						<table class="detail<?= $id ?>" style="display:none">
							<tr>
								<td>Nama Barang</td>
								<td>Jumlah</td>
								<td>Harga</td>
								<td>Sub Total</td>
							</tr>
							<?php 
								
								$detail = query("SELECT detail_beli.id_barang, detail_beli.jumlah, barang.nama_barang, barang.harga FROM detail_beli INNER JOIN barang ON detail_beli.id_barang = barang.id_barang WHERE detail_beli.id_Pembelian = $id"); 
								foreach ($detail as $brg) :
									$subtotal = $brg['harga'] *  $brg['jumlah'];
							?>
							<tr>
								<td><?= $brg['nama_barang']?></td>
								<td><?= $brg['jumlah']?></td>
								<td><?= "Rp. " . number_format($brg['harga'],0,',','.') . ",-";?></td>
								<td><?= "Rp. " . number_format($subtotal,0,',','.') . ",-"; ?></td>
							</tr>
						<?php endforeach; ?>
						</table>
					</td>
				</tr>
			<?php
				$i++;
				endforeach;
			?>
		</tbody>
	</table>
</div>

<div class="fixed-action-btn">
  <a class="btn-floating btn-large  purple darken-3" href="pembelian.php">
    <i class="large material-icons">add</i>
  </a>
</div>
 
<?php require("layouts/footer.php") ?>


