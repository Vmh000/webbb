<?php 

	require 'function.php';

	$uji = query("SELECT * FROM peserta");

	if(isset($_POST["cari"])){
		$uji = cari($_POST["keyword"]);
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="">
 	<title>Peserta Ujian</title>
 </head>
 <body>
 	<h3>Daftar Peserta</h3>

 	<a href="tambah.php">Tambah Data Peserta</a><br>

 	<a href="index.html">back</a>


 	<form action="" method="post">
	</form>
	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Keahlian</th>
			<th>Gambar</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($uji as $row) :  ?>
		 <tr>
			<td><?php echo $i; ?></td>
			
			<td><?php echo $row["nama"]; ?></td>
		
			<td><?php echo $row["keahlian"]; ?></td>
			<td><img src="image/<?php echo $row ["gambar"]; ?>"width=120> </td>
			<td>
				<a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a>
				<a href="hapus.php?id=<?php echo $row["id"]; ?>">Delete</a>

			</td>
		 </tr>
 		<?php $i++; ?>
	<?php endforeach; ?>
	</table>
 </body>
 </html>