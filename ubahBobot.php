<?php
error_reporting(0);

session_start();
$sesi = $_SESSION['level'];
if( $sesi == "" || $sesi == "user" ){
    header("location:login.php");
}

require 'functions.php';

// ambil data di URL

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM bobot ")[0];
$nilai = query("SELECT * FROM nilai2");
?>

<?php
if( isset($_POST["submit"]) ) {

    if (ubah_bobot($_POST) > 0){
        header("location:ubahBobot.php");
        $text = "bobot diubah";
    }    
}
?>

<?php 
    $text = "* Silahkan ubah bobot jika ingin mengubah bobot, jika tidak bisa tekan proses";
?>


<html>
<head>
        <title>Sistem Pendukung Keputusan</title>
        <link rel="stylesheet" href="css1/spk.css">
    </head>
<body>
    <div class="content">
        <header>
            <h2 class="judul">Evaluasi Kinerja Guru Honorer SMA / SMK NEGERI</h2>
            <p align="center">Lombok Tengah, Nusa Tenggara Barat</p>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="nilai.php">Nilai</a></li>
                <li id="spk"><a href="ubahBobot.php">SPK</a></li>
                <li><a href="report.php">Hasil SPK</a></li>
                <li><a href="logout.php" onclick="return confirm('apakah anda ingin keluar?');">Logout</a></li>
            </ul>
        </nav>
        <header>
            <h3 align="center">Perangkingan Dengan Metode TOPSIS</h3>
        </header>

<br>
<br>
    <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo $mhs["id_bobot"]; ?>">

        <h4 align="center"> *Silahkan ubah bobot, jika sudah tekan tombol ubah bobot kemudian tekan proses <br>
                            *Jika tidak ingin mengubah bobot bisa langsung tekan proses    
        </h4>
        <table border="1px solid" cellspacing="0" cellpadding="2px" align="center"> 
            <tr>
                <th>Indikator</th>
                <th>Kode</th>
                <th>Bobot</th>
                <th>Atribut</th>
            </tr>
            <tr>
                <td>Special achievement</td>
                <td><label for="c1">C1</label></td>
                <td>    
                    <input type="text" name="c1" id="c1" required value="<?php echo $mhs["c1"]; ?>">
                </td>
                    <td>
                        <input type="radio" name="1" value="1" <?php if ($row["k1"] == "0") echo 'checked' ?>> cost
                        <input type="radio" name="2" value="0" <?php if ($row["k1"] == "1") echo 'checked' ?>> benefit
                    </td>
            </tr>
            <tr>
                <td>Leadership trait</td>
                <td><label for="c2">C2</label></td>
                <td>
                    <input type="text" name="c2" id="c2" required value="<?php echo $mhs["c2"]; ?>">
                </td>
                    <td>
                        <input type="radio" name="3" value="0"<?php if ($row["k2"] == "0") echo 'checked' ?>> cost
                        <input type="radio" name="4" value="1" <?php if ($row["k2"] == "1") echo 'checked' ?>> benefit
                    </td>
            </tr>
            <tr>
                <td>Achieveness in School</td>
                <td><label for="c3">C3</label></td>
                <td>
                    <input type="text" name="c3" id="c3" required value="<?php echo $mhs["c3"]; ?>">
                </td>
                    <td>
                        <input type="radio" name="5" value="0" <?php if ($row["k3"] == "0") echo 'checked' ?>> cost
                        <input type="radio" name="6" value="1" <?php if ($row["k3"] == "1") echo 'checked' ?>> benefit
                    </td>
            </tr>
            <tr>
                <td>Attendence</td>
                <td><label for="c4">C4</label></td>
                <td>
                    <input type="text" name="c4" id="c4" required value="<?php echo $mhs["c4"]; ?>">
                </td>
                    <td>
                        <input type="radio" name="7" value="0" <?php if ($row["k4"] == "0") echo 'checked' ?>> cost
                        <input type="radio" name="8" value="1" <?php if ($row["k4"] == "1") echo 'checked' ?>> benefit
                    </td>
            </tr>
            <tr>
                <td>Extracurricular activity</td>
                <td><label for="c5">C5</label></td>
                <td>
                    <input type="text" name="c5" id="c5" required value="<?php echo $mhs["c5"]; ?>">
                </td>
                    <td>
                        <input type="radio" name="9" value="0" <?php if ($row["k5"] == "0") echo 'checked' ?>> cost
                        <input type="radio" name="10" value="1" <?php if ($row["k5"] == "1") echo 'checked' ?>> benefit
                    </td>
            </tr>
            <tr>
                <td>Peer relationship</td>
                <td><label for="c6">C6</label></td>
                <td>
                    <input type="text" name="c6" id="c6" required value="<?php echo $mhs["c6"]; ?>">
                </td>
                    <td>
                        <input type="radio" name="11" value="0" <?php if ($row["k6"] == "0") echo 'checked' ?>> cost
                        <input type="radio" name="12" value="1" <?php if ($row["k6"] == "1") echo 'checked' ?>> benefit
                    </td>
            </tr>
            <tr>
                <td></td>
                <td  align="center" colspan="2"><button type="submit" name="submit">Ubah Data</button></td>
            </tr>
        </table>
        <br>
        <center>
        <button type="submit" name="proses">Proses</button>
        </center>
    </form>
    <hr>

<?php if( isset($_POST["proses"]) ) : ?>

<?php if ($mhs["c1"] == 0) :?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c2"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c3"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c4"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c5"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c6"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php else : ?>


<?php $jumlahBobot = $mhs["c1"] + $mhs["c2"] + $mhs["c3"] + $mhs["c4"] + $mhs["c5"] +$mhs["c6"]  ;?>    

<br>
<h2 align="center">Langkah 1</h2>
        <p align="center">Konversi Data Awal</p>
        <table align="center" class="table1">
        
        <tr> 
            <th>W1</th>
            <th>W2</th>
            <th>W3</th>
            <th>W4</th>
            <th>W5</th>
            <th>W6</th>
        </tr>

        

        <?php 
            $w1 = $mhs["c1"] / $jumlahBobot;
            $w2 = $mhs["c2"] / $jumlahBobot;
            $w3 = $mhs["c3"] / $jumlahBobot;
            $w4 = $mhs["c4"] / $jumlahBobot;
            $w5 = $mhs["c5"] / $jumlahBobot;
            $w6 = $mhs["c6"] / $jumlahBobot;
        ?>
        <tr>
            <td><?php echo number_format($w1, 4); ?></td>
            <td><?php echo number_format($w2, 4); ?></td>
            <td><?php echo number_format($w3, 4); ?></td>
            <td><?php echo number_format($w4, 4); ?></td>
            <td><?php echo number_format($w5, 4); ?></td>
            <td><?php echo number_format($w6, 4); ?></td>
        </tr>
        </table>
<br>

    <?php $jumlah = 0; ?>
    <?php foreach ($nilai as $row1) :  ?>
    
    <?php
     $jumlah_k1 = $row1["k1"] + $row1["k2"] + $row1["k3"] + $row1["k4"] + $row1["k5"] + $row1["k6"] + $row1["k7"] +
     $row1["k8"] + $row1["k9"] + $row1["k10"];    
        $kriteria1 = ($jumlah_k1 / 40) * 100;

    $jumlah_k2 = $row1["k11"] + $row1["k12"] + $row1["k13"] + $row1["k14"] + $row1["k15"] + $row1["k16"] + $row1["k17"];    
    $kriteria2 = ($jumlah_k2 / 28) * 100;

    $jumlah_k3 = $row1["k18"] + $row1["k19"] + $row1["k20"] + $row1["k21"] + $row1["k22"] + $row1["k23"] + $row1["k24"] +
                $row1["k25"] + $row1["k26"] + $row1["k27"] + $row1["k28"];
    $kriteria3 = ($jumlah_k3 / 44) * 100;

    $jumlah_k4 = $row1["k29"] + $row1["k30"] + $row1["k31"];    
    $kriteria4 = ($jumlah_k4 / 12) * 100;

    $jumlah_k5 = $row1["k32"] + $row1["k33"] + $row1["k34"] + $row1["k35"] + $row1["k36"];    
    $kriteria5 = ($jumlah_k5 / 20) * 100;

    $jumlah_k6 = $row1["k37"] + $row1["k38"] + $row1["k39"] + $row1["k40"];    
    $kriteria6 = ($jumlah_k6 / 16) * 100;        
    ?>

    <?php $hitung2 =  $kriteria1 ** $w1 * 
                    $kriteria2 ** $w2 * 
                    $kriteria3 ** $w3 *  
                    $kriteria4 ** $w4 * 
                    $kriteria5 ** $w5 *
                    $kriteria6 ** $w6;?>

    <?php $jumlah += $hitung2; ?>
    <?php endforeach; ?>
    <h2 align="center">Langkah 2</h2>
    <p align="center">Menghitung Normalisasi Matrix</p>

    <table align="center" class="table1">
    <tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>C1</th>
    <th>C2</th>
    <th>C3</th>
    <th>C4</th>
    <th>C5</th>
    <th>C6</th> 
    </tr>

    <?php $i=1; ?>
    <?php foreach ($nilai as $langkah2) :  ?>
        <?php
     $jumlah_k1 = $langkah2["k1"] + $langkah2["k2"] + $langkah2["k3"] + $langkah2["k4"] + $langkah2["k5"] + $langkah2["k6"] + $langkah2["k7"] +
     $langkah2["k8"] + $langkah2["k9"] + $langkah2["k10"];    
        $kriteria1 = ($jumlah_k1 / 40) * 100;

    $jumlah_k2 = $langkah2["k11"] + $langkah2["k12"] + $langkah2["k13"] + $langkah2["k14"] + $langkah2["k15"] + $langkah2["k16"] + $langkah2["k17"];    
    $kriteria2 = ($jumlah_k2 / 28) * 100;

    $jumlah_k3 = $langkah2["k18"] + $langkah2["k19"] + $langkah2["k20"] + $langkah2["k21"] + $langkah2["k22"] + $langkah2["k23"] + $langkah2["k24"] +
                $langkah2["k25"] + $langkah2["k26"] + $langkah2["k27"] + $langkah2["k28"];
    $kriteria3 = ($jumlah_k3 / 44) * 100;

    $jumlah_k4 = $langkah2["k29"] + $langkah2["k30"] + $langkah2["k31"];    
    $kriteria4 = ($jumlah_k4 / 12) * 100;

    $jumlah_k5 = $langkah2["k32"] + $langkah2["k33"] + $langkah2["k34"] + $langkah2["k35"] + $langkah2["k36"];    
    $kriteria5 = ($jumlah_k5 / 20) * 100;

    $jumlah_k6 = $langkah2["k37"] + $langkah2["k38"] + $langkah2["k39"] + $langkah2["k40"];    
    $kriteria6 = ($jumlah_k6 / 16) * 100;        
    ?>
    
    <tr>
        <td>A<?php echo $i; ?></td>
        <td><?php echo $langkah2["nama"]; ?></td>
        <td><?php echo number_format($kriteria1, 2) ; ?></td>
        <td><?php echo number_format($kriteria2, 2) ; ?></td>
        <td><?php echo number_format($kriteria3, 2) ; ?></td>
        <td><?php echo number_format($kriteria4, 2) ; ?></td>
        <td><?php echo number_format($kriteria5, 2) ; ?></td>
        <td><?php echo number_format($kriteria6, 2) ; ?></td>
        <?php $hitung3 =  $kriteria1 ** $w1 * 
                        $kriteria2 ** $w2 * 
                        $kriteria3 ** $w3 *  
                        $kriteria4 ** $w4 * 
                        $kriteria5 ** $w5 *
                        $kriteria6 ** $w6;?>
        <td> <?php echo number_format ($hitung3, 4); ?></td>
        <?php $kesimpulan = $hitung3/ $jumlah; ?>
        <td> <?php echo number_format($kesimpulan, 4); ?> </td>
        <?php $urut[] = number_format($kesimpulan, 4) . " " .  " ( " .  $langkah3["nama"] . " ) "; ?>        
    </tr>

        <?php $i++; ?>
    <?php endforeach; ?>

    <tr>
    <td colspan="8" align="right"> Jumlah </td>
    <td><?php echo number_format($jumlah, 4); ?></td>
    </tr>
</table>

<h2 align="center">Langkah 3</h2>
<p align="center"> Langkah 3 menghitung vektor V</p>

    <table align="center" class="table1">
    <tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>C1</th>
    <th>C2</th>
    <th>C3</th>
    <th>C4</th>
    <th>C5</th>
    <th>C6</th>
    <th>Hasil dari <br> Nilai ideal +</th>
    <th>Hasil dari <br> Nilai ideal - </th>
    </tr>
    <?php $j = 0; ?>
    <?php $i=1; ?>
    <?php foreach ($nilai as $langkah3) :  ?>
        <?php 
        $jumlah_k1 = $langkah3["k1"] + $langkah3["k2"] + $langkah3["k3"] + $langkah3["k4"] + $langkah3["k5"] + $langkah3["k6"] + $langkah3["k7"] +
                    $langkah3["k8"] + $langkah3["k9"] + $langkah3["k10"];    
        $kriteria1 = ($jumlah_k1 / 40) * 100;
        
        $jumlah_k2 = $langkah3["k11"] + $langkah3["k12"] + $langkah3["k13"] + $langkah3["k14"] + $langkah3["k15"] + $langkah3["k16"] + $langkah3["k17"];    
        $kriteria2 = ($jumlah_k2 / 28) * 100;

        $jumlah_k3 = $langkah3["k18"] + $langkah3["k19"] + $langkah3["k20"] + $langkah3["k21"] + $langkah3["k22"] + $langkah3["k23"] + $langkah3["k24"] +
                        $langkah3["k25"] + $langkah3["k26"] + $langkah3["k27"] + $langkah3["k28"];
        $kriteria3 = ($jumlah_k3 / 44) * 100;

        $jumlah_k4 = $langkah3["k29"] + $langkah3["k30"] + $langkah3["k31"];    
        $kriteria4 = ($jumlah_k4 / 12) * 100;

        $jumlah_k5 = $langkah3["k32"] + $langkah3["k33"] + $langkah3["k34"] + $langkah3["k35"] + $langkah3["k36"];    
        $kriteria5 = ($jumlah_k5 / 20) * 100;

        $jumlah_k6 = $langkah3["k37"] + $langkah3["k38"] + $langkah3["k39"] + $langkah3["k40"];    
        $kriteria6 = ($jumlah_k6 / 16) * 100;  
    ?>
    
    <tr>
        <td>A<?php echo $i; ?></td>
        <td><?php echo $langkah3["nama"]; ?></td>
        <td><?php echo number_format($kriteria1, 2); ?></td>
        <td><?php echo number_format($kriteria2, 2); ?></td>
        <td><?php echo number_format($kriteria3, 2); ?></td>
        <td><?php echo number_format($kriteria4, 2); ?></td>
        <td><?php echo number_format($kriteria5, 2); ?></td>
        <td><?php echo number_format($kriteria6, 2); ?></td>
        <?php $hitung3 =  $kriteria1 ** $w1 * 
                        $kriteria2 ** $w2 * 
                        $kriteria3 ** $w3 *  
                        $kriteria4 ** $w4 * 
                        $kriteria5 ** $w5 *
                        $kriteria6 ** $w6;?>
        <td><?php echo number_format($hitung3, 4); ?></td>
        <?php $kesimpulan = $hitung3/ $jumlah; ?>
        <td> <?php echo number_format($kesimpulan, 4); ?> </td>
        <?php $urut[] = number_format($kesimpulan, 4) . " " .  " ( " .  $langkah3["nama"] . " ) "; ?>        
    <?php $i++; ?>
    <?php $j++ ?>
    <?php endforeach; ?>
    </tr>
    <tr>
    <td colspan="8" align="right"> Jumlah </td>
    <td><?php echo number_format($jumlah, 4); ?></td>    
    </tr>
</table>

<?php rsort($urut);?>
<h2 align="center">Hasil Kesimpulan</h2>
<table align="center" class="table1" >

    <tr>
        <th>Peringkat</th>
        <th>Nama dan Hasil Akhir</th>
    </tr>
<?php $c = 1; ?>
<?php $jumlah = $j; ?>
<?php for( $x=0; $x < $jumlah; $x++ ) : ?>
    <tr>
        <td><?php echo $c; ?></td>
        <td><?php echo $urut[$x]; ?></td>
     </tr>
    
<?php $c++ ?>
<?php endfor; ?>

</table>
<?php endif; ?>
<?php endif; ?>
</body>
</html>