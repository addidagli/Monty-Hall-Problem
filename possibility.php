<?php

                //!!!!!!!!!!!!!!!!!THE CODE ASSUMES THAT YOU WILL CHANGE YOUR DOOR!!!!!!!!!!!!!!!!!!!!
$doors = [1,2,3];
$testNumber = 1000000;

$winningCounter = 0;
$losingCounter = 0;

for($i = 1; $i <= $testNumber; $i++){
    //we will manipulate the temp,temp2 arrays
    $temp = $doors;
    $temp2 = $doors;

    //choose random door
    $chosen = $doors[array_rand($doors,1)];

    //choose random door for car
    $car =  $doors[array_rand($doors,1)];

    //goat door can not be chosen or car door, so we remove them to show exactly goat door
    $temp = remove($chosen,$temp);
    $temp = remove($car,$temp);

    //goat door is not car door or chosen door, if chosen and car door is equal we will choose randomly
    $goat = $temp[array_rand($temp,1)];

    //If you don't want to change the door, comment following code block
    for($j = 0; $j < count($doors); $j++){      
        if($temp2[$j] != $chosen && $temp2[$j] != $goat){   //check unselected door to change your door
            $chosen = $temp2[$j];
             break;
        }
    }

    //we need to remove goat door
    $temp2 = remove($goat,$temp2);

    //if chosen door is correct we will win a car
    if($car == $chosen){
        $winningCounter++;
    } else {
        $losingCounter++;       
    }
}

echo "winning car number : ".$winningCounter."</br>";
echo "losing car number: ".$losingCounter."</br>";

echo "probability of winning the car : %".round($winningCounter/$testNumber*100,1)."</br>";
echo "probability of losing the car: %".round($losingCounter/$testNumber*100,1)."</br>";


 function remove($del_val,$temp){
    $key = array_search($del_val, $temp);
    if (false !== $key) {
        unset($temp[$key]);
    }
    return $temp;
}


?>

