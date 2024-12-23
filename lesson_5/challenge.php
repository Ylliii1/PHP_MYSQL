<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 50%;
            border-collapse: collapse;
        }
        tr,th, td{
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }
        th{
            background-color: #f2f2f2;
            color: black;
        }
    </style>
</head>
<body>
    <table border = "1">
        <tr>
            <th>Phones</th>
            <th>In Stock</th>
            <th>Sold</th>
        </tr>
<?php
 $phone = array(
    array("Iphone 14", 10, 20),
    array("Iphone 13", 10 , 30),
    array("Iphone 12", 10 , 30),
    array("Iphone 11", 10 , 30),
 );


 for($row=0; $row<4; $row++){
    echo "<tr>";
    for($col=0; $col<3; $col++){
        echo "<td>".$phone[$row][$col]."</td>";
    }
    echo "</tr>";
 }


 echo "</table>";
?>