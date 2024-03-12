<?php  
require 'function.php';

$id = $_GET['id'];
$uji = query("SELECT * FROM peserta WHERE id = $id")[0];

	if(isset($_POST["submit"]) ){
		if( ubah($_POST) > 0){
			echo "
			<script>
				alert('Data Berhasil di Tambahkan');
				document.location.href='Peserta.php';
			</script>
			";
		} else {

			echo "
			<script>
				alert('Data Gagal di Tambahkan');
				document.location.href='Peserta.php';
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
	<link rel="stylesheet" type="text/css" href="ubah.php">
	<title>Ubah Peserta</title>
</head>
<body>
	<ul class="ubah">
	<h1>Ubah Data Peserta</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $uji["id"];?>">
		<input type="hidden" name="Gambarlama" value="<?= $uji["gambar"];?>">

		<ul class = "ubah">
		<fieldset>
		
		<li>
			<label for="nama">Nama :</label>
			<input type="text" name="nama" id="nama"
			required value="<?php echo $uji["nama"];?>">
		</li>
		<li>
			<label for="keahlian">Keahlian :</label>
			<input type="text" name="keahlian" id="keahlian"
			required value="<?php echo $uji["keahlian"];?>">
		</li>
		 <li>
		 	<label for="gambar">gambar :</label><br>
		 	<img src="<?php echo $uji["gambar"]; ?>">
		 	<input type="file" name="gambar" id="gambar">
		 </li>
		 <li>
		 	<button type="submit" name="submit">Ubah Data</button>
		 </li>
		</fieldset>
	</form>
</body>
</html>