<?php
$num = -1;
if ($num < 0) {
    //echo("$num is less than 0");
}

$age = 14;

if (($age>12) && ($age<15)){
    //echo "Sale!!";
}

if ($age>18){
    //echo "You are an adult";
} else {
    //echo "You are underage";
}

if ($num<0){
    //echo "This is a negative number";
} elseif ($num == 0){
    //echo "This number is 0";
} else {
    //echo "This number is higher than 0 ";
}

$student_points = 50;

if (($student_points==100) && ($student_points<100) && ($student_points>89)){
    echo "Your grade is A";
} elseif (($student_points<90) && ($student_points>79)){
    echo "Your grade is B";
} elseif (($student_points<80) && ($student_points>69)){
    echo "Your grade is C";
} elseif (($student_points<70) && ($student_points>59)){
    echo "Your grade is D";
} else {
    echo "Your grade is F";
}
?>

