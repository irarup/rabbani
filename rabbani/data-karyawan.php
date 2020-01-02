<?php require("layouts/header.php");
	require "components/dateFormat.php";

	$karyawan = query("SELECT * FROM `karyawan`");
	$i = 1;

 ?>

<div class="container">
	<h4 class="center">Data Karyawan</h4>
	<h5 class="center">Soal No 7</h5>
	<table class="striped">
		<thead>
			<th>NIP</th>
			<th>Nama</th>
			<th>Status</th>
			<th>Anak</th>
		</thead>
		<tbody>
		<?php foreach ($karyawan as $data) : ?>
			<tr>
				<td><?= $data['nip'] ?></td>
				<td><?= $data['nama'] ?></td>
				<td><?= $data['status'] ?></td>
				<td>
					<ul>
					<?php 
						$nip = $data['nip'];
						$anak = query("SELECT * FROM anak_karyawan WHERE nip = '$nip' ");

						if($anak != null){
							foreach($anak as $ank) :
								if ($ank['jk'] == "p") {
									$jk = "Wanita";
								}else{
									$jk = "Pria";
								}
					?>
						<li><?= $ank['nama_anak'] . " ( " . $jk . " )"?></li>
					<?php 
							endforeach;
						}else{
					?>
						<li> - </li>	
					<?php } ?>
					</ul>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<h5>Soal 7a</h5>
	<fieldset>
		<legend>Query:</legend>
		<p>
			SELECT karyawan.nip, karyawan.nama, anak_karyawan.nama_anak, anak_karyawan.jk FROM anak_karyawan LEFT JOIN karyawan ON anak_karyawan.nip = karyawan.nip WHERE anak_karyawan.jk = "p"
		</p>
	</fieldset>
	<table class="striped">
		<thead>
			<th>NIP</th>
			<th>Nama</th>
			<th>Anak</th>
		</thead>
		<tbody>
			<?php
				$soal7A = query("SELECT karyawan.nip, karyawan.nama FROM karyawan LEFT JOIN anak_karyawan ON anak_karyawan.nip = karyawan.nip WHERE anak_karyawan.jk = 'p'");
				$karyawan = array_unique($soal7A,SORT_REGULAR);
				foreach ($karyawan as $q7A) :
			?>
					<tr>
						<td><?= $q7A['nip'] ?></td>
						<td><?= $q7A['nama'] ?></td>
						<td>
							<ul>
							<?php 
								$nip = $q7A['nip'];
								$anak7a = query("SELECT * FROM anak_karyawan WHERE nip = '$nip' AND jk = 'p'");
								foreach($anak7a as $anak) :
							?>
								<li><?= $anak['nama_anak'] . " ( " . $anak['jk'] . " )"?></li>
							<?php endforeach; ?>	
							<ul>
						</td>
					</tr>
			<?php 
				endforeach;
			 ?>
		</tbody>
	</table>

	<h5>Soal 7b</h5>
	<fieldset>
		<legend>Query:</legend>
		<p>
			SELECT karyawan.nip, karyawan.nama, COUNT(anak_karyawan.nama_anak) as jumlah_anak FROM anak_karyawan RIGHT JOIN karyawan ON anak_karyawan.nip = karyawan.nip WHERE karyawan.status = 'tetap' GROUP BY nip
		</p>
	</fieldset>
	<table class="striped">
		<thead>
			<th>NIP</th>
			<th>Nama</th>
			<th>Jumlah Anak</th>
		</thead>
		<tbody>
			<?php
				$soal7B = query("SELECT karyawan.nip, karyawan.nama, COUNT(anak_karyawan.nama_anak) as jumlah_anak 
									FROM anak_karyawan RIGHT JOIN karyawan 
									ON anak_karyawan.nip = karyawan.nip 
									WHERE karyawan.status = 'tetap'
									GROUP BY nip
							");

				foreach ($soal7B as $q7B) :
			?>
					<tr>
						<td><?= $q7B['nip'] ?></td>
						<td><?= $q7B['nama'] ?></td>
						<td>
							<?= $q7B['jumlah_anak'] ?>
						</td>
					</tr>
			<?php 
				endforeach;
			 ?>
		</tbody>
	</table>

	<h5>Soal 7c</h5>
	<fieldset>
		<legend>Query:</legend>
		<p>
			SELECT karyawan.nip, karyawan.nama FROM anak_karyawan RIGHT JOIN karyawan ON anak_karyawan.nip = karyawan.nip WHERE anak_karyawan.nip IS NULL
		</p>
	</fieldset>
	<table class="striped">
		<thead>
			<th>NIP</th>
			<th>Nama</th>
		</thead>
		<tbody>
			<?php
				$soal7C = query("SELECT karyawan.nip, karyawan.nama 
								FROM anak_karyawan RIGHT JOIN karyawan 
								ON anak_karyawan.nip = karyawan.nip 
								WHERE anak_karyawan.nip IS NULL
							");

				foreach ($soal7C as $q7C) :
			?>
					<tr>
						<td><?= $q7C['nip'] ?></td>
						<td><?= $q7C['nama'] ?></td>
					</tr>
			<?php 
				endforeach;
			 ?>
		</tbody>
	</table>
</div>

<div class="fixed-action-btn">
  <a class="btn-floating btn-large  purple darken-3" href="tambah-karyawan.php">
    <i class="large material-icons">add</i>
  </a>
</div>

 <?php require("layouts/footer.php"); ?>