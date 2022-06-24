<?php
error_reporting(0);
require '../functions.php';

$data = $_GET["id"];

$nilai = query("SELECT * FROM nilai2 WHERE id_nilai2 = $data");

if( isset($_POST["simpan"]) ){

    if(ubahnilai($_POST) > 0 ){
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            window.location = '../nilai.php';
        </script>
        ";
    }else{
        echo "gagal";
    }

}



?>


<html>
<head>
<title>Coba</title>

<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>From Biodata</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<script src="js/jQuery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/angular.min.js"></script>
		<script src="js/proses.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>

<br>
		<a href="../nilai.php" class="btn btn-primary">
			<span class="glyphicon glyphicon-home"></span> Kembali
		</a>
    




<form action="" method="post">
<div style="padding-top: 25px;">
                        
<h2 align="center">Ubah Nilai Kinerja Guru</h2>
						
<div class="row">
	<div class='col-sm-3'></div>
		<div class='col-sm-5'>
        <?php foreach ($nilai as $row) : ?>

        <input type="hidden" name="id" value=" <?php echo $row["id_nilai2"] ?> "  >
<table class='table table-bordered'>
    <tr>
        <td>NAMA : </td>
    <td>
        
        <input type="text" name="nama" class="form-control" id="nama" readonly value=" <?php echo $row["nama"]; ?> ">
        
        
        

        </select>
    </td>
    </tr>
    <tr>
        <td>KELAS : </td>
        <td>
            <select class="form-control">
                <option value="">II A</option>
                <option value="">II B</option>
            </select>
        </td>
    </tr>
</table>
            </div>
</div>
<h4 align="center"> *Keterangan score <br>
                    0 = Tidak, 
                    1 = Ya / Sangat Kurang,
                    2 = Kurang,
                    3 = Baik,
                    4 = Sangat Baik

        </h4>
        <br>		
<div class="row">
	<div class='col-sm-3'></div>
		<div class='col-sm-6'>
        <table class='table table-bordered'>

                <tr>
                    <td align="center">
                        <label for="">Program</label>
                    </td>
                    <td colspan="4">
                        <label for="">Score</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for="">Special achievement </label>
                    </td>
                    <td>
                        <input type="radio" name="1" value="0" <?php if ($row["k1"] == "0") echo 'checked' ?> required> 0 
                    </td>
                    <td>
                        <input type="radio" name="1" value="1" <?php if ($row["k1"] == "1") echo 'checked' ?> > 1 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for="">Leadership Trait</label>
                    </td>
                    <td>
                        <input type="radio" name="11" value="0" <?php if ($row["k11"] == "0") echo 'checked' ?> > 0 
                    </td>
                    <td>
                        <input type="radio" name="11" value="1ss" <?php if ($row["k11"] == "1") echo 'checked' ?> > 1 
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Activeness in school</label>
                    </td>
                    <td>
                        <input type="radio" name="18" value="1" <?php if ($row["k18"] == "1") echo 'checked' ?> > 1 
                    </td>
                    <td>
                        <input type="radio" name="18" value="2" <?php if ($row["k18"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="18" value="3" <?php if ($row["k18"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="18" value="4" <?php if ($row["k18"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Attendance</label>
                    </td>
                    <td>
                        <input type="radio" name="29" value="1" <?php if ($row["k29"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="29" value="2" <?php if ($row["k29"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="29" value="3" <?php if ($row["k29"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="29" value="4" <?php if ($row["k29"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>

                <tr>
                <td>
                        <label collrow for="">Extracurricular activities</label>
                    </td>
                    <td>
                        <input type="radio" name="32" value="0" <?php if ($row["k32"] == "0") echo 'checked' ?> > 0
                    </td>
                    <td>
                        <input type="radio" name="32" value="1" <?php if ($row["k32"] == "1") echo 'checked' ?> > 1
                    </td>
                </tr>

                <tr>
                <td>
                        <label collrow for="">Peer relationship</label>
                    </td>
                    <td>
                        <input type="radio" name="37" value="1" <?php if ($row["k37"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="37" value="2" <?php if ($row["k37"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="37" value="3" <?php if ($row["k37"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="37" value="4" <?php if ($row["k37"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>
                <tr>
                        <td align="center" colspan="6">
                            <button type="submit" name="simpan">
                            <span class="glyphicon glyphicon-plus"></span>Ubah Data</button>
                        </td>
                </tr>
        </table>
        <?php endforeach; ?>
        </div>
</div>
<br>


</form>
</div>

</body>
</html>