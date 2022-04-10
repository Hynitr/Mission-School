<?php
include("functions/init.php");

$sql= "SELECT * FROM `result` WHERE `ses` = '2021/2022' AND `term` = '2nd Term'";
$result_set=query($sql);
if(row_count($result_set) == "") {
            
          } else {
while($row= mysqli_fetch_array($result_set))
 {
	 $tst = $row['total'];
	 $sbj = $row['subject'];

	 echo $tst." ".$sbj."<br/>"; 

	 $sndsc = "UPDATE score SET `sndscore` = '$tst' WHERE `term` = '2nd Term'"

 }
}