<?php
error_reporting(0);
session_start();
$sesi = $_SESSION['level'];
$sesi2 = $_SESSION['username'];
if( $sesi == "" ){
    header("location:login.php");
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM guru WHERE id = $sesi2")[0];

if( $sesi2 == $mahasiswa["id"] ){
    $jadi = 1;
}else{
    $jadi = 0;
}

?>




<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css1/style_indexguru3.css">
</head>

<body>
        <header>
            <div class="jumbotron">
                <h2 class="judul">Evaluasi Kinerja Guru</h2>
            </div>

            <nav>
                <ul>
                    <li id="home"><a href="index_guru.php">Home</a></li>
                    <li><a href="nilai_guru.php">Nilai</a></li>
                    <li><a href="logout.php" onclick="return confirm('apakah anda ingin logout?');">Logout</a></li>
                </ul>
            </nav>
        </header>
<main>
    <div id="content">
        <article id="sejarah" class="card">
        <?php if( $jadi == 1 ) : ?>
            <table class="demo-table responsive">
                <h2><?php echo $mahasiswa["nama"]; ?></h2>
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-header="Nama" ><?php echo $mahasiswa["nama"]; ?></td>
                        <td data-header="Umur"><?php echo $mahasiswa["tanggal"]; ?></td>
                        <td data-header="Jabatan"><?php echo $mahasiswa["kelamin"]; ?></td>
                        <td data-header="Pendidikan"><?php echo $mahasiswa["pend_ter"]; ?></td>
                        <td data-header="Masa Kerja"><?php echo $mahasiswa["alamat"]; ?></td>
                        <td data-header="Jenis Kelamin"><?php echo $mahasiswa["telpon"]; ?></td>
                        <th scope="row">
                            <div class="toolbox">
                                <a href="tambah/ubah.php?id=<?php echo $mahasiswa["id"]; ?>" class="edit">Ubah</a>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p>Data tidak ditemukan silahkan masukan data!</p>
            <a href="tambah/tambah_guru.php" class="button">Tambah Data</a>
        <?php endif; ?>
        </article>
    </div>
</main>
</body>
</html>