<?php
 include 'lib/library.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST') {
 	  $nis            = @$_POST['nis'];
  	$nama_lengkap   = @$_POST['nama_lengkap'];
  	$jenis_kelamin  = @$_POST['jenis_kelamin'];
  	$alamat         = @$_POST['alamat'];
    $no_telp        = @$_POST['no_telp'];
    $kelas          = @$_POST['id_kelas'];
    $foto           = @$_FILES['foto'];

    if (empty($nis)) { //jika nis kosong
      flash('error', 'Mohon masukan NIS dengan benar');
    }
    else if (empty($nama_lengkap)) { //jika nama lengkap kosong
      flash('error', 'Mohon masukan Nama Lengkap dengan benar'); 
    }
    else {

    if (!$upload) {
    	flash('error', "Upload File Gagal");
    	header('location:index.php');
    }

    $file = $foto['name'];

  	$sql = "INSERT INTO siswa (nis, nama_lengkap, jenis_kelamin, alamat, no_telp, id_kelas, file) VALUES ('$nis', '$nama_lengkap', '$jenis_kelamin', '$alamat', '$no_telp', '$kelas', '$file')";

  	$mysqli->query($sql) or die ($mysqli->error);

  	header('location: index.php');
 }
}

 $success = flash('success');
 $error = flash('error');

 // Ambil data kelas
 $sql = "SELECT * FROM t_kelas";
 $dataKelas = $mysqli->query($sql) or die ($mysqli->error);

 include 'views/v_tambah.php';
 echo "File berfungsi untuk menambahkan";
?>