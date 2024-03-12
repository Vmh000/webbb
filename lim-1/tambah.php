<?php 
	require 'function.php';

	if(isset($_POST["submit"]) ){

		if(tambah($_POST) > 0){
			echo "
			<script>
				alert('Data Berhasil di Tambahkan');
				document.location.href = 'Peserta.php';
			</script>
			";
		} else {
			echo "
			<script>
				alert('Data Gagal di Tambahkan');
				document.location.href = 'Peserta.php';
			</script>
			";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="tambah.css">
	<title>Tambah Data Mahasiswa</title>
</head>
	<style type="text/css">
 		

 </style>
<body>
	<h1 align="center" >Tambah Data Peserta</h1>
	<form action="" method="POST" enctype="multipart/form-data">
			<ul class="tambah">
			<fieldset>
			<form>
			
			<li>
				<label for="nama">Nama :</label><br>
				<input type="text" name="nama" id="nama" required placeholder="Nama">
			</li>
			<br>
			
			<li>
				<label for="keahlian">Keahlian :</label><br>
				<input type="text" name="keahlian" id="keahlian" required placeholder="Keahlian">
			</li>
			<br>
			<li>
				<label for="gambar">gambar :</label><br>
				<input type="file" name="gambar" id="gambar" required >
			</li>
		 <li>
		 	<button type="submit" name="submit">Tambah Data</button>
		 </li>
		</form>
	</fieldset>
</ul>
</body>
</html>