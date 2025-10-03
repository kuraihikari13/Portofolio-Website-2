<?php

	include 'connect.php';

	$data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5");

	while($d = mysqli_fetch_array($data)){

		$id = $d['id'];

		$emosi = rand(60, 100);
		$karakter = rand(60, 100);
		$stabilitas = rand(60, 100);
		$sosiabilitas = rand(60, 100);

		$update = mysqli_query($con, "UPDATE amaliyah___kelas_5 SET emosi = '$emosi', karakter = '$karakter', stabilitas = '$stabilitas', sosiabilitas = '$sosiabilitas' WHERE id = '$id'");

		if($update){
			echo "SUCCESS";
		}
	}

?>