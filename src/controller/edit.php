<?php

	include 'connect.php';

	$id = $_POST["id"];
	$kelas = $_POST["kelas"];

	$agama = $_POST["agama"];
	$ppkn = $_POST["ppkn"];
	$matematika = $_POST["matematika"];
	$inggris = $_POST["inggris"];
	$indonesia = $_POST["indonesia"];
	$qiroat = $_POST["qiroat"];
	$sbdp = $_POST['sbdp'];
	$pjok = $_POST['pjok'];

	$karakter = $_POST['karakter'];
	$sosiabilitas = $_POST['sosiabilitas'];
	$stabilitas = $_POST['stabilitas'];
	$emosi = $_POST['emosi'];

	echo $id.$kelas.$agama.$ppkn.$matematika.$inggris.$indonesia.$qiroat.$sbdp.$pjok.$karakter.$sosiabilitas.$stabilitas.$emosi;



	if($kelas == '1A' || $kelas == '1B' || $kelas == '1C'){
        $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 WHERE id = '$id' AND kelas = '$kelas'");
    } else if($kelas == '2A' || $kelas == '2B') {
        $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 WHERE id = '$id' AND kelas = '$kelas'");
    } else if($kelas == '3A' || $kelas == '3B') {
        $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 WHERE id = '$id' AND kelas = '$kelas'");
    } else if($kelas == '4A' || $kelas == '4B') {
        $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 WHERE id = '$id' AND kelas = '$kelas'");
    } else if($kelas == '5A' || $kelas == '5B') {
        $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 WHERE id = '$id' AND kelas = '$kelas'");
    }

    while($d = mysqli_fetch_array($data)){
    	if($kelas == '1A' || $kelas == '1B' || $kelas == '1C'){
	        $db = "amaliyah___kelas_1";
	    } else if($kelas == '2A' || $kelas == '2B') {
	        $db = "amaliyah___kelas_2";
	    } else if($kelas == '3A' || $kelas == '3B') {
	        $db = "amaliyah___kelas_3";
	    } else if($kelas == '4A' || $kelas == '4B') {
	        $db = "amaliyah___kelas_4";
	    } else if($kelas == '5A' || $kelas == '5B') {
	        $db = "amaliyah___kelas_5";
	    }

	    echo $db;

	    $update_query = "UPDATE $db SET agama = '$agama', ppkn = '$ppkn', matematika = '$matematika', inggris = '$inggris', indonesia = '$indonesia', qiroat = '$qiroat', sbdp = '$sbdp', pjok = '$pjok', karakter = '$karakter', sosiabilitas = '$sosiabilitas', stabilitas = '$stabilitas', emosi = '$emosi' WHERE id = '$id'";

	    echo $update_query;

	    $update = mysqli_query($con, $update_query);

	    if($update){
	    	header("Location: ../muridorg.php?id=$id&&kelas=$kelas");
	    }
    }

?>