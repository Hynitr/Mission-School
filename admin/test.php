<?php
include("functions/init.php");

$sql= "SELECT * FROM `score` WHERE `subject` = 'Civic Education' AND `ses` = '2021/2022' AND `class` = 'S.S.S 2' AND `fscore` = (SELECT MIN('fscore') FROM `score`)";
$result_set=query($sql);

$row = mysqli_fetch_array($result_set);

echo $row['admno'];