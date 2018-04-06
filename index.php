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

//Double-word array

$newAnimals = []; 
foreach ($continents as $continent => $animals) {
	foreach ($animals as $animal) {
		 if (strpos($animal, ' ') !== false) { 
            array_push($newAnimals, $animal);
        }
	}
}

echo "<pre>";
print_r($newAnimals);

//Shuffle array

$explAnimals =[];
foreach ($newAnimals as $animal) {
		$explAnimals = array_merge ($explAnimals, explode(' ', $animal));
}

$randomAnimals =[];
$fantasyAnimals =[];

for($i = 0; $i < count($explAnimals); $i++) {
	if ($i % 2 != 0) {
		$randomAnimals[] = $explAnimals[$i];
		shuffle ($randomAnimals);
	}
	else {
		$fantasyAnimals[] = $explAnimals[$i];
	}
}

$fantasyAnimalsResult=[];
for ($i=0; $i < count($randomAnimals); $i++) { 
	$fantasyAnimalsResult[] = $fantasyAnimals[$i]." ".$randomAnimals[$i];
}

echo "<pre>";
print_r($fantasyAnimalsResult);

//extra-task

$MultifantasyAnimalsResult=[];
foreach ($continents as $continent => $animals) {
	$keyArray = [];
	foreach ($animals as $animal) {
		for ($i=0; $i <count($fantasyAnimalsResult); $i++) { 
			$explFantasyAnimals = explode(" ", $fantasyAnimalsResult[$i]);
			$search = strstr($animal, $explFantasyAnimals[0]);

        if (!(empty($search))) {
          array_push($keyArray, $fantasyAnimalsResult[$i]);
          break;	
		}
		}
	}
 $MultifantasyAnimalsResult[$continent] = $keyArray;
 }

echo "<h4>"."Extra task"."</h4>";
foreach ($MultifantasyAnimalsResult as $continent => $animals) {
	echo "<h2>".$continent."</h2>";
	echo "<br>";

		for ($i=0; $i < count($animals) ; $i++) {
			echo $animals[$i];
		if ($i<(count($animals)-1)) {
			echo ", ";
		} 
		else {
			echo ".";
		}
    	}
}

?>