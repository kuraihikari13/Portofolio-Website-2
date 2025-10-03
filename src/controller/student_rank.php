<?php

	//include 'connect.php';
/*
	$data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 WHERE id = '3' AND kelas = '3A'");
	$overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 ORDER BY total DESC");
    $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 WHERE kelas = '3A' ORDER BY total DESC");
*/

    $rank_year = 0;
    $rank_class = 0;

	$a = 0;

	$ver = 0;

	$overall_rows = mysqli_num_rows($overall_rank);
	$rank_rows = mysqli_num_rows($rank);

	while($overall_fetch = mysqli_fetch_array($overall_rank))
	{
		if($name != $overall_fetch['name'] && $ver == 0)
		{
			$rank_year++;
		}
		else if($name == $overall_fetch['name'] && $ver == 0)
		{
			$rank_year++;
			$ver = 1;
		}

		$a++;
	}

	$a = 0;
	$ver = 0;

	while($rank_fetch = mysqli_fetch_array($rank))
	{

		if($name != $rank_fetch['name'] && $ver == 0)
		{
			$rank_class++;
		} 
		else if($name == $rank_fetch['name'] && $ver == 0)
		{
			$rank_class++;
			$ver = 1;
		}

		$a++;
	}

	//echo $a;

	//echo $rank_year;
	//echo $rank_class;

?>