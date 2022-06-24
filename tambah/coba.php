<?php

require '../functions.php';

$guru = query("SELECT * FROM guru");



if( isset($_POST["simpan"]) ){

    if(tambahnilai($_POST) > 0 ){
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
                        
<h2 align="center">Penilaian Kinerja Guru</h2>
						
<div class="row">
	<div class='col-sm-3'></div>
		<div class='col-sm-5'>
<table class='table table-bordered'>
    <tr>
        <td>NAMA : </td>
    <td>
        <select name="nama" class="form-control" id="nama">
        <option>-</option>
        <?php foreach ($guru as $row) : ?>
        <option> <?php echo $row["nama"]; ?> </option>
        <?php endforeach; ?>

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
<h4 align="center"> *Keterangan skor <br>
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
                        <input type="radio" name="0" value="0"> 0
                    </td>
                    <td>
                        <input type="radio" name="1" value="1"> 1
                    </td>
                </tr>

                <tr>
                    <td>
                        <label collrow for="">Leadership trait</label>
                    </td>
                    <td>
                        <input type="radio" name="11" value="0"> 0
                    </td>
                    <td>
                        <input type="radio" name="11" value="1"> 1
                    </td>
                </tr>

                <tr>
                <td>
                        <label collrow for="">Activeness in school</label>
                    </td>
                    <td>
                        <input type="radio" name="18" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="18" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="18" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="18" value="4"> 4
                    </td>
                </tr>

                <tr>
                <td>
                        <label collrow for="">Attendance</label>
                    </td>
                    <td>
                        <input type="radio" name="32" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="32" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="32" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="32" value="4"> 4
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Extracurricular activities</label>
                    </td>
                    <td>
                        <input type="radio" name="37" value="0"> 0
                    </td>
                    <td>
                        <input type="radio" name="37" value="1"> 1
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Peer relationship</label>
                    </td>
                    <td>
                        <input type="radio" name="40" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="40" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="40" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="40" value="4"> 4
                    </td>
                </tr>
                <tr>
                        <td align="center" colspan="6">
                            <button type="submit" name="simpan">
                            <span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
                        </td>
                </tr>
        </table>
        </div>
</div>
<br>


</form>
</div>

</body>
</html>