<?php
for ($x = 16; $x <= 25; $x += 2) {
    echo "$x<br>";
}

$age = 15;

while($age<=18){
    echo "Age is $age<br>";
    $age++;
}



$num = 15;

do{
    echo "Number is $num <br>";
    $num++;
}while($num<=18);

$cars = ["BMW", "Audi", "Mercedes"];

foreach($cars as $car){
    echo "The car is a $car<br>";
}
?>
