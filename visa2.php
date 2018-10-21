<?php 
//cd c:/OSPanel/domains/netology/php1.4/2

print_r($argv);

$f = fopen("https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8", "r") or die ("Ошибка!");

$data = fgetcsv($f,1000,",");


/*foreach ($data as $key => $value) {
	echo $value;
    echo PHP_EOL;
}
exit;*/

	for ($i = 0; ($data = fgetcsv($f,1000,",") )!= false; $i++) {
//$arr[] = $data;
	//print_r($data[1]) ;
	//echo PHP_EOL;		

		if ($data[1] === $argv[1]) {
			echo "$data[1]: $data[4]";
			
			break;
		} elseif (($data != false) || ($data[1] !== $argv[1])) {
			echo "Ошибка";
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