<?php 
//cd c:/OSPanel/domains/netology/php1.4/2

print_r($argv);



$f = fopen("https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8", "r") or die ("Ошибка!");





/*foreach ($data as $key => $value) {
	echo $value;
    echo PHP_EOL;
}*/
	$words = array(); 
	while (($data = fgetcsv($f,1000,",")) !== false ) {
//$arr[] = $data;
	//print_r($data[1]) ;
	//echo PHP_EOL;		
		$input = $argv[1];
		$words[] = $data[1];
		$data = fgetcsv($f,1000,",");
		print_r($words);
		exit;
		
		if ($data[1] === $argv[1]) {
			echo "$data[1]: $data[4]";
			//$number = $i;
		//	echo $number;
			break;
		} elseif (($i < 197) || ($data[1] !== $argv[1])) {
			continue;
		} else {
			echo "Ошибка";
		}
	}

	/*foreach ($arr as $key => $value) {
		$a = array_search($argv[1], $value);
		if ($a != false) {
			echo $a;
		}
	}*/




fclose($f);