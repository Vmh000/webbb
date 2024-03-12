<?php 

$conn = mysqli_connect("localhost","root","","db-lim");

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows [] =$row;
	}
 	return $rows;
}

function tambah($post){
	global $conn;
	$nama = $post["nama"];
	$keahlian = $post["keahlian"];
	$gambar = $post["gambar"];

		$gambar = upload();

			if(!$gambar){
				return false;
			}
	$query = "INSERT INTO peserta VALUES ('','$nama','$keahlian','$gambar')";	

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubah($post){
	global $conn;
	$id = $post["id"];
	$nama = $post["nama"];
	$keahlian = $post["keahlian"];
	$Gambarlama = $post["Gambarlama"];

	if($_FILES['gambar']['error']===4){
			$gambar = $Gambarlama;
		}else{
			$gambar = upload();
		}
	$query = "UPDATE peserta SET
			 nama='$nama',
			 keahlian='$keahlian',
			 gambar='$gambar'		
			 WHERE id = $id 
			 ";

			 mysqli_query($conn, $query);
			 return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM peserta WHERE id = $id");
	return mysqli_affected_rows($conn);	
}


function upload() {
		global $conn;

		$namaFile = $_FILES['gambar']['name'];
		$ukuranGambar = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpname = $_FILES['gambar']['tmp_name'];

		

		if ($error === 4){
			echo"
			<script>
			alert('ayo pilih gambar terlebih dahulu');
			</script>
			";
			return false;
		}

		$ekstensiGambarValid =['jpg','jpeg','png'];
		$ekstensiGambar =explode('.',$namaFile);
		$ekstensiGambar =strtolower(end($ekstensiGambarValid));

		if(!in_array ($ekstensiGambar, $ekstensiGambarValid)){
			echo"
			<script>
			alert('yang anda upload bukan gambar');
			</script>
			";
			return false;
		}
		if($ukuranGambar > 10000000){
			echo"
			<script>
			alert('gambar yang anda upload teralu besar ');
			</script>
			";
			return false;

		}

		$namaFileBaru  = uniqid();
		$namaFileBaru .='.';
		$namaFileBaru .= $ekstensiGambar;
		move_uploaded_file($tmpname, 'image/' .  $namaFileBaru);

		return $namaFileBaru;

	}




 
?>