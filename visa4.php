<?php 
//cd c:/OSPanel/domains/netology/php1.4/2

print_r($argv);

$f = fopen("https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8", "r") or die ("Ошибка!");



/*foreach ($data as $key => $value) {
	echo $value;
    echo PHP_EOL;
}
exit;*/
    $i=0;
	while(($data = fgetcsv($f, 1000, ",")) !== FALSE)  {
//print_r($data) ;

$arr[] = $data;
$i++;


	//Факультатив 

	


// массив сверяемых слов
$words[]  = $data[1];

}
$num = count($arr);
	//;
//echo $num;	
//print_r($words);

foreach ($arr as $key => $value) {

		if ($value[1] === $argv[1]) {
			echo "$value[1]: $value[4]";			
			break;
		} elseif (($key == ($num - 1)) || ($value[1] === $argv[1]))  {
			echo "Ошибка! Название страны введено некорректно!";


// кратчайшее расстояние пока еще не найдено
$shortest = -1;

// проходим по словам для нахождения самого близкого варианта
foreach ($words as $word) {

    // вычисляем расстояние между входным словом и текущим
    $lev = levenshtein($argv[1], $word);

    // проверяем полное совпадение
    if ($lev == 0) {

        // это ближайшее слово (точное совпадение)
        $closest = $word;
        $shortest = 0;

        // выходим из цикла - мы нашли точное совпадение
        break;
    }

    // если это расстояние меньше следующего наименьшего расстояния
    // ИЛИ если следующее самое короткое слово еще не было найдено
    if ($lev <= $shortest || $shortest < 0) {
        // устанивливаем ближайшее совпадение и кратчайшее расстояние
        $closest  = $word;
        $shortest = $lev;
    }
}

//echo "Вы ввели: $argv[1]\n";
if ($shortest != 0) {
    echo "Вы не имели в виду: $closest?\n";
    foreach ($arr as $key => $value) {

		if ($value[1] === $closest) {
			echo "$value[1]: $value[4]";			
			break;
		} elseif (($key == ($num - 1)) || ($value[1] === $argv[1]))  {
			echo "Ошибка! Название страны введено некорректно!";
		}
}
		}
}
	//Факультатив 
}
	
	fclose($f);
?>


