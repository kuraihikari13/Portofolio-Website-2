<?php

	//include 'connect.php';

	//$sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 ORDER BY total DESC");

	$total = mysqli_num_rows($sorting);

	$rank_draft;

	$a = 0;

	while($d = mysqli_fetch_array($sorting)){
		$rank_draft[$a] = $d;
		$a++;
	}

	$end = $total - 1;

	$rank_max = $rank_draft[0];
	$rank_min = $rank_draft[$end];

	$median = $total / 2;

	$rank_median = $rank_draft[$median];

	$rank_calc;

	$check = 0;

	while($check < $total)
	{
		$sum_max = floatval(0);
		$sum_median = floatval(0);
		$sum_min = floatval(0);

		// Max, Median, Min dari Nilai Agama

		$agama = floatval($rank_draft[$check]['agama']);
		$agama_max = floatval($rank_max['agama']);
		$agama_median = floatval($rank_median['agama']);
		$agama_min = floatval($rank_min['agama']);

		$agama_max = $agama_max - $agama; $agama_max = $agama_max * $agama_max;
		$sum_max += $agama_max;
		$agama_median = $agama_median - $agama; $agama_median = $agama_median * $agama_median;
		$sum_median += $agama_median;
		$agama_min = $agama_min - $agama; $agama_min = $agama_min * $agama_min;
		$sum_min += $agama_min;

		// Max, Median, Min dari Nilai PPKn 

		$ppkn = floatval($rank_draft[$check]['ppkn']);
		$ppkn_max = floatval($rank_max['ppkn']);
		$ppkn_median = floatval($rank_median['ppkn']);
		$ppkn_min = floatval($rank_min['ppkn']);

		$ppkn_max = $ppkn_max - $ppkn; $ppkn_max = $ppkn_max * $ppkn_max;
		$sum_max += $ppkn_max;
		$ppkn_median = $ppkn_median - $ppkn; $ppkn_median = $ppkn_median * $ppkn_median;
		$sum_median += $ppkn_median;
		$ppkn_min = $ppkn_min - $ppkn; $ppkn_min = $ppkn_min * $ppkn_min;
		$sum_min += $ppkn_min;

		// Max, Median, Min dari Nilai Matematika

		$mm = floatval($rank_draft[$check]['matematika']);
		$mm_max = floatval($rank_max['matematika']);
		$mm_median = floatval($rank_median['matematika']);
		$mm_min = floatval($rank_min['matematika']);

		$mm_max =  $mm_max - $mm; $mm_max = $mm_max * $mm_max;
		$sum_max += $mm_max;
		$mm_median =  $mm_median - $mm; $mm_median = $mm_median * $mm_median;
		$sum_median += $mm_median;
		$mm_min =  $mm_min - $mm; $mm_min = $mm_min * $mm_min;
		$sum_min += $mm_min;

		// Max, Median, Min dari Nilai Bahasa Inggris

		$inggris = floatval($rank_draft[$check]['inggris']);
		$inggris_max = floatval($rank_max['inggris']);
		$inggris_median = floatval($rank_median['inggris']);
		$inggris_min = floatval($rank_min['inggris']);

		$inggris_max =  $inggris_max - $inggris; $inggris_max = $inggris_max * $inggris_max;
		$sum_max += $inggris_max;
		$inggris_median =  $inggris_median - $inggris; $inggris_median = $inggris_median * $inggris_median;
		$sum_median += $inggris_median;
		$inggris_min =  $inggris_min - $inggris; $inggris_min = $inggris_min * $inggris_min;
		$sum_min += $inggris_min;

		// Max, Median, Min dari Nilai Qiroat

		$qiroat = floatval($rank_draft[$check]['qiroat']);
		$qiroat_max = floatval($rank_max['qiroat']);
		$qiroat_median = floatval($rank_median['qiroat']);
		$qiroat_min = floatval($rank_min['qiroat']);

		$qiroat_max =  $qiroat_max - $qiroat; $qiroat_max = $qiroat_max * $qiroat_max;
		$sum_max += $qiroat_max;
		$qiroat_median =  $qiroat_median - $qiroat; $qiroat_median = $qiroat_median * $qiroat_median;
		$sum_median += $qiroat_median;
		$qiroat_min =  $qiroat_min - $qiroat; $qiroat_min = $qiroat_min * $qiroat_min;
		$sum_min += $qiroat_min;

		// Max, Median, Min dari Nilai Seni Budaya dan Keterampilan

		$sbdp = floatval($rank_draft[$check]['sbdp']);
		$sbdp_max = floatval($rank_max['sbdp']);
		$sbdp_median = floatval($rank_median['sbdp']);
		$sbdp_min = floatval($rank_min['sbdp']);

		$sbdp_max =  $sbdp_max - $sbdp;	$sbdp_max = $sbdp_max * $sbdp_max;
		$sum_max += $sbdp_max;
		$sbdp_median =  $sbdp_median - $sbdp;	$sbdp_median = $sbdp_median * $sbdp_median;
		$sum_median += $sbdp_median;
		$sbdp_min =  $sbdp_min - $sbdp;	$sbdp_min = $sbdp_min * $sbdp_min;
		$sum_min += $sbdp_min;

		// Max, Median, Min dari Nilai Pendidikan Jasmani dan Olahraga

		$pjok = floatval($rank_draft[$check]['pjok']);
		$pjok_max = floatval($rank_max['pjok']);
		$pjok_median = floatval($rank_median['pjok']);
		$pjok_min = floatval($rank_min['pjok']);

		$pjok_max =  $pjok_max - $pjok; $pjok_max = $pjok_max * $pjok_max;
		$sum_max += $pjok_max;
		$pjok_median =  $pjok_median - $pjok; $pjok_median = $pjok_median * $pjok_median;
		$sum_median += $pjok_median;
		$pjok_min =  $pjok_min - $pjok; $pjok_min = $pjok_min * $pjok_min;
		$sum_min += $pjok_min;

		// Max, Median, Min dari Nilai Bahasa Indonesia

		$indo = floatval($rank_draft[$check]['indonesia']);
		$indo_max = floatval($rank_max['indonesia']);
		$indo_median = floatval($rank_median['indonesia']);
		$indo_min = floatval($rank_min['indonesia']);
		
		$indo_max = $indo_max - $indo; $indo_max = $indo_max * $indo_max;
		$sum_max += $indo_max;
		$indo_median = $indo_median - $indo; $indo_median = $indo_median * $indo_median;
		$sum_median += $indo_median;
		$indo_min = $indo_min - $indo; $indo_min = $indo_min * $indo_min;
		$sum_min += $indo_min;

		// SQRT dari Nilai SUM Max, Median dan Min

		$sum_max = sqrt($sum_max);
		$sum_median = sqrt($sum_median);
		$sum_min = sqrt($sum_min);

		//Input ke Array Kalkulasi

		$rank_calc[$check]['id'] = $rank_draft[$check]['id'];
		$rank_calc[$check]['name'] = $rank_draft[$check]['name'];
		$rank_calc[$check]['result_max'] = $sum_max;
		$rank_calc[$check]['result_median'] = $sum_median;
		$rank_calc[$check]['result_min'] = $sum_min;

		$check++;

	}

	$rank_max_calc = $rank_calc[0];
	$rank_median_calc = $rank_calc[$median];
	$rank_min_calc = $rank_calc[$end];

	//var_dump($rank_max_sorted);

	$class_a; $class_b; $class_c;

	$check = 0;
	$check_a = 0; $check_b = 0; $check_c = 0;

	while($check < $total)
	{
		$max_value = floatval($rank_calc[$check]['result_max']);
		$median_value = floatval($rank_calc[$check]['result_median']);
		$min_value = floatval($rank_calc[$check]['result_min']);

		$validate = min($max_value, $median_value, $min_value);

		if($validate == $max_value)
		{
			$class_a[$check_a] = $rank_calc[$check];
			$check_a++;
		}
		else if($validate == $median_value)
		{
			$class_b[$check_b] = $rank_calc[$check];
			$check_b++;
		}
		else if($validate == $min_value)
		{
			$class_c[$check_c] = $rank_calc[$check];
			$check_c++;
		}

		$check++;
	}

	$fix_a = 0; $fix_c = $check_b - 1; $fix_b = 0;

	while($check_a < 12)
	{
		$class_a[$check_a] = $class_b[$fix_a];
		unset($class_b[$fix_a]);
		$fix_a++; $check_a++;
	}

	while($check_c < 12)
	{
		$class_c[$check_c] = $class_b[$fix_c];
		unset($class_b[$fix_c]);
		$fix_c--; $check_c++; $fix_b++;
	}

	$check_b = $check_b - $fix_a;
	$check_b = $check_b - $fix_b;
	
	//print_r($class_a);
	//echo "<br>" . $check_a . "<br>";
	//print_r($class_b);
	//echo "<br>" . $check_b . "<br>";
	//print_r($class_c);
	//echo "<br>" . $check_c . "<br>";

?>