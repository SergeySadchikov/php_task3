<?php 
	
	$continents = [
		'Africa' => ['Hippopotamus amphibius', 'Giraffa camelopardalis', 'Pythoninae'],
		'Australia' => ['Tachyglossidae', 'Moloch horridus', 'Macropus giganteus'],
		'Antarctica' => ['Aptenodytes patagonicus', 'Physeter macrocephalus', 'Phocidae'],
		'South America' => ['Chinchilla lanigera', 'Rhea', 'Serrasalmus altispinis'],
		'North America' => ['Canis latrans', 'Castor fiber', 'Ovibos moschatus'],
	];

echo "<pre>";
print_r($continents);

//животные из 2 слов

$newAnimals = [];
$words = [];
foreach ($continents as $continent => $animals) {
	foreach ($animals as $animal) {
		 if (str_word_count($animal, 0) == 2) { 
            $newAnimals[] = $animal;
        	$words[] = explode(' ', $animal);
        }
	}
}

echo "<pre>";
print_r($newAnimals);

// mix

$randomWords=[];
foreach ($words as $word) {
 	$randomWords[] = $word[1];
 }
shuffle($randomWords);

//результат

$result=[];
for ($i=0; $i <count($words); $i++) { 
	$result[] = $words[$i][0]." ".$randomWords[$i];
}
echo "<pre>";
print_r($result);

//extra-task

$extra_continents=[];

foreach ($continents as $continent => $animals) {
	$extra_animals=[];
	foreach ($animals as $animal) {
		for ($i=0; $i <count($result); $i++) { 
			if (stripos($animal, explode(' ', $result[$i])[0])!==false) {
				$extra_animals[] =$result[$i];
 				}	
		}		
	}
	$extra_continents[$continent] = $extra_animals;
}

foreach ($extra_continents as $continent => $extra_animals) {
 	echo '<h2>' . $continent . '</h2>';
 	echo implode(", ", $extra_animals);
}

?>