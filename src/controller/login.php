<?php

	include "connect.php";

	$password = $_POST['password'];

	if($password == 'ADMIN1')
	{
		session_start();
		$_SESSION['name'] = 'ADMIN';
		header("Location: ../datamurid.php");

	} 
	else
	{
		$login_k1 = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 WHERE password = '$password'");
		$login_k2 = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 WHERE password = '$password'");
		$login_k3 = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 WHERE password = '$password'");
		$login_k4 = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 WHERE password = '$password'");
		$login_k5 = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 WHERE password = '$password'");

		$signin_k1 = mysqli_fetch_array($login_k1);
		$signin_k2 = mysqli_fetch_array($login_k2);
		$signin_k3 = mysqli_fetch_array($login_k3);
		$signin_k4 = mysqli_fetch_array($login_k4);
		$signin_k5 = mysqli_fetch_array($login_k5);

		$signin_row1 = mysqli_num_rows($login_k1);
		$signin_row2 = mysqli_num_rows($login_k2);
		$signin_row3 = mysqli_num_rows($login_k3);
		$signin_row4 = mysqli_num_rows($login_k4);
		$signin_row5 = mysqli_num_rows($login_k5);

		if($signin_row1 > 0)
		{
			session_start();
			$_SESSION['name'] = $signin_k1['name'];
			$_SESSION['kelas'] = $signin_k1['kelas'];
			$_SESSION['password'] = $signin_k1['password'];
			$id = $signin_k1['password'];
			header("Location: ../muridorg.php?id=$id");
		}
		if($signin_row2 > 0)
		{
			session_start();
			$_SESSION['name'] = $signin_k2['name'];
			$_SESSION['kelas'] = $signin_k2['kelas'];
			$_SESSION['password'] = $signin_k2['password'];
			$id = $signin_k2['password'];
			header("Location: ../muridorg.php?id=$id");
		}
		if($signin_row3 > 0)
		{
			session_start();
			$_SESSION['name'] = $signin_k3['name'];
			$_SESSION['kelas'] = $signin_k3['kelas'];
			$_SESSION['password'] = $signin_k3['password'];
			$id = $signin['password'];
			header("Location: ../muridorg.php?id=$id");
		}
		if($signin_row4 > 0)
		{
			session_start();
			$_SESSION['name'] = $signin_k4['name'];
			$_SESSION['kelas'] = $signin_k4['kelas'];
			$_SESSION['password'] = $signin_k4['password'];
			$id = $signin_k4['password'];
			header("Location: ../muridorg.php?id=$id");
		}
		if($signin_row5 > 0)
		{
			session_start();
			$_SESSION['name'] = $signin_k5['name'];
			$_SESSION['kelas'] = $signin_k5['kelas'];
			$_SESSION['password'] = $signin_k5['password'];
			$id = $signin_k5['password'];
			header("Location: ../muridorg.php?id=$id");
		}
	}

?>