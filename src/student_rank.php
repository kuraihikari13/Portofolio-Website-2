<?

	$a = 0;

	$rank_year = 0;

	$rank_class = 0;

	$ver = 0;

	$overall_rows = mysqli_num_rows($overall_rank);

	$rank_rows = mysqli_num_rows($rank);

	while($overall_fetch = mysqli_fetch_array($overall_rank))
	{
		if($d['name'] != $overall_fetch[$a]['name'] && $ver == 0)
		{
			$rank_year++;
		}
		else if($d['name'] == $overall_fetch[$a]['name'] && $ver == 0)
		{
			$rank_year++;
			$ver = 1;
		}

		$a++;
	}

	$ver = 0;

	$a = 0;

	while($rank_fetch = mysqli_fetch_array($rank))
	{
		if($d['name'] != $rank_fetch[$a]['name'] && $ver == 0)
		{
			$rank_class++;
		}
		else if($d['name'] == $rank_fetch[$a]['name'] && $ver == 0)
		{
			$rank_class++;
			$ver = 1;
		}

		$a++;
	}

?>