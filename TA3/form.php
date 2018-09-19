<?php
	require("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Diri Mahasiswa</title>
</head>
<body>
	<h1><center>INPUT DATA DIRI MAHASISWA</center> </h1>
	<hr>
	<form method="POST" enctype="multipart/form-data">
		<p>Nama : <input type="text" name="nama"><br></p>
		<p>NIM : <input type="text" name="nim"><br></p>
		<p>Fakultas : <select name="fakultas">
			<option value="FIT">Fakultas Ilmu Terapan</option>
			<option value="FIK">Fakultas Industri Kreatif</option>
			<option value="FEB">Fakultas Ekonomi Bisnis</option>
			<option value="FKB">Fakultas Komunikasi Bisnis</option>
			<option value="FRI">Fakultas Rekayasa Industri</option>
			<option value="FIF">Fakultas Informatika</option>			<option value="FTE">Fakultas Teknik Elektro</option>
		</select><br></p>
		<p>Jenis Kelamin : 
		<input type="radio" name="jeniskelamin" value="Laki-laki">Laki-laki
		<input type="radio" name="jeniskelamin" value="Perempuan">Perempuan <br></p>
		<p>Gambar : <input type="file" name="gambar"></p>
		<input type="submit" name="submit" value="Upload">
	</form>
	<hr>
</body>
</html>
<?php
	if(isset($_POST['nama'])){
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$fakultas = $_POST['fakultas'];
		$jeniskelamin = $_POST['jeniskelamin'];
		$nama_gambar = $_FILES['gambar']['name'];
		$tmp_gambar = $_FILES['gambar']['tmp_name'];
		$dir = "gambar/";
		$tempat_gambar = $dir.$nama_gambar;
		$uploadGambar = move_uploaded_file($tmp_gambar, $tempat_gambar);
		if(!$uploadGambar)
			die("Gagal upload gambar");
		
			$kueri = $pdo -> prepare("INSERT INTO tb_mahasiswa VALUES('$nama','$nim','$fakultas','$jeniskelamin','$tempat_gambar') "); 
			$kueri -> execute();
			if ($kueri) {
				header("Location: data.php");
			}
			else {
				die("Gagal menambahkan data!");
			}
	}
?>