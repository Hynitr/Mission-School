<?php
include("functions/init.php");

$id  = $_GET['id'];
$cls = $_GET['cls'];
$trm = $_GET['term'];
$ses = $_GET['ses'];
$stat = $_GET['stat'];

if($stat == "unapprove"){

    //update result
    $sql = "UPDATE motor SET `approved` = 'unapproved' WHERE `admno` = '$id' AND `class` = '$cls' AND `term` = '$trm' AND `ses` = '$ses'";
    $res = query($sql);
    
    redirect("./results");

} else {

    //update result
}

?>