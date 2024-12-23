<?php

function callCounter() {
    static $count = 0;
    $count++;
    echo "The value of count is : $count <br>";
} 
callCounter();
callCounter();
?>