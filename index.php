#!/usr/bin/env php
<?php

	require_once 'vendor/autoload.php';
	use GorAlex97\Dates\VagrantPhp;	

	$opts_d = @$_GET['d']?@$_GET['d']:'1997-06-06';
	$opts_n = @$_GET['n']?@$_GET['n']:'1997-06-06';
	
	if(isset($opts_d)){
		$birthDate = $opts_d ?? '1997-06-06';
		$days = new VagrantPhp($birthDate);
	}elseif(isset($opts_n)){
		$names = parse_ini_file(__DIR__.'/src/names.ini',true);
		$birthDate = $names['dates'][$opts_n];
		$days = new VagrantPhp($birthDate);
	}else{
		$birthDate = '1997-06-06';
		$days = new VagrantPhp($birthDate);
	}

	$totalDays = $days->findTotalDays();
	echo $birthDate.' : '.$totalDays."\n";
?>
