<?php
include("functions/init.php");

$data = 'S.S.S 1';
$tms = '1st Term';
$ses = '2022/2023';

$sl = "SELECT * FROM motor WHERE `class` = '$data' AND `term` = '$tms' AND `ses` = '$ses'";
$ww = query($sl);
if(row_count($ww) == 0) {

  echo "<span class='text-center' style='color:red; font-size: 50px'>No result found</span>";
} else {

while ($rw = mysqli_fetch_array($ww)) {

    $id = $rw['admno'];
    $asl = "UPDATE students SET `class` = '$data' WHERE `AdminID` = '$id'";
    $aes = query($asl);
    
}
}