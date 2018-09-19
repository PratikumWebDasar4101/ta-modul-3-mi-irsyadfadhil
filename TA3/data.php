<?php
    require("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Diri Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1><center>DATA DIRI MAHASISWA</center> </h1>
    <hr>
    <table border="1" bgcolor="black" align="center" style="text-align: center;" width="50%">
        <tr>
            <th><font color="white">Nama</font></th> 
            <th><font color="white">NIM</font></th>
            <th><font color="white">Fakultas</font></th>
            <th><font color="white">Jenis Kelamin</font></th>
            <th><font color="white">Gambar</font></th>
        </tr>
        <?php
            $query = $pdo -> prepare("SELECT * FROM tb_mahasiswa");
            $query -> execute();
            while ($data = $query -> fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><font color="white"><?php echo $data['nama'];?></font></td>
            <td><font color="white"><?php echo $data['nim'];?></font></td>
            <td><font color="white"><?php echo $data['fakultas'];?></font></td>
            <td><font color="white"><?php echo $data['jeniskelamin'];?></font></td>
            <td><img src="<?php echo $data['gambar'];?>" width="30%"></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <hr>
    <p><h3>Ingin menambah data mahasiswa? :</h3></p>
    <h4><a href="form.php">TAMBAH DATA MAHASISWA</a></h4>
    <hr>
</body>
</html>