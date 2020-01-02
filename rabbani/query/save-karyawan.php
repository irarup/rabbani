<?php 
	require 'function.php';

	if(ISSET($_POST['submit'])){
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$status = $_POST['status'];

		$nama_anak = $_POST['nama_anak'];
		$jk_anak = $_POST['jk_anak'];


		$karyawan = "INSERT INTO `karyawan` (`nip`,`nama`,`jk`,`status`) VALUES ('$nip', '$nama', '$jk', '$status')";
		mysqli_query($connect, $karyawan);

		echo mysqli_error($connect);

		if($nama_anak != '' && $jk_anak != '')
			for ($i=0; $i < count($nama_anak) ; $i++) { 
				$anak = "INSERT INTO  `anak_karyawan` (`nip`, `nama_anak`, `jk`) VALUES ('$nip', '$nama_anak[$i]', '$jk_anak[$i]')";
				mysqli_query($connect, $anak);
			}
		}elseif(($nama_anak != '' && $jk_anak == '') || ($nama_anak == '' && $jk_anak != '') ){
			echo "<script>
					alert('Isi data anak dengan lengkap !');
					document.location.href = '../tambah-karyawan.php';
				  </script>";
		}elseif($nama_anak == '' && $jk_anak == ''){

		}

		$no = mysqli_affected_rows($connect);

		if ($no > 0) {
			echo "
				<script>
					alert('Data berhasilkan ditambahkan !');
					document.location.href = '../data-karyawan.php';
				</script>
			";
		}else{
			echo "
				<script>
					alert('Data gagal ditambahkan !');
					document.location.href = '../tambah-karyawan.php';
				</script>
			";
		}
	
 ?> 