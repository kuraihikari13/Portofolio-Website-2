<?php

	$ver_a = 0; $ver_b = 0; $ver_c = 0;
    $verify = 0; $ver = 0;
    $lulus = ''; 

    if($fix_a > 0)
    {
    	$ver = $fix_a;
    }

    if($verify == 0 && $ver_a == 0)
    {
    	while($ver_a < $check_a)
	    {
	    	if($d['name'] == $class_a[$ver_a]['name'])
	    	{
	    		$verify++;
	    		$lulus = 'A';
	    	}

	    	$ver_a++;
	    }
    }

    if($verify == 0 && $ver_b == 0)
    {
    	while($ver_b < $check_b)
	    {
	    	if($d['name'] == $class_b[$ver]['name'])
		    {
		    	$verify++;
		    	$lulus = 'B';
		    }
		   	$ver_b++;
		   	$ver++; 	
	    }

    }

    if($verify == 0 && $ver_c == 0)
    {
    	while($ver_c < $check_c)
	    {
	    	if($d['name'] == $class_c[$ver_c]['name'])
	    	{
	    		$verify++;
	    		$lulus = 'C';
	    	}
	    	$ver_c++;
	    }
    }

    $verify = 0;
    $ver_a = 0; $ver_b = 0; $ver_c = 0;
?>