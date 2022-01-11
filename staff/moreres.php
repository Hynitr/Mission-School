<script>
function goBack() {
    window.history.back()
}
</script>
<?php
include("functions/init.php");
if(!isset($_GET['id']) && !isset($_GET['term']) && !isset($_GET['cls']) && !isset($_GET['ses'])) {

echo "Error 404!";
} else {


$data =  $_GET['id'];
$tms  =  $_GET['term'];
$cls  =  $_GET['cls'];
$ses  =  $_GET['ses'];

$sql3 = "SELECT * FROM `motor` WHERE `admno` = '$data' AND `term` = '$tms' AND `ses` = '$ses'";
$result_set3 = query($sql3);
$row3 = mysqli_fetch_array($result_set3);

if(row_count($result_set3) == 0){

   echo  "No result uploaded for this user yet<br/><a href='#' onclick='goBack()';>Click here to go back</a>";

} else {

$sql4 = "SELECT sum(sn) AS altol FROM students WHERE `Class` = '$cls'";
$res1 = query($sql4);
$qw1  = mysqli_fetch_array($res1);

$sql5 = "SELECT * FROM students WHERE `AdminID` = '$data'";
$res2 = query($sql5);
$qw2  = mysqli_fetch_array($res2);


//percentage calculations
$pee = "SELECT sum(sn) AS pss FROM result WHERE `admno` = '$data' AND `class` = '$cls' AND `term` = '$tms' AND `ses` = '$ses'";
$pes = "SELECT sum(total) AS mobt FROM result WHERE `admno` = '$data' AND `class` = '$cls' AND `term` = '$tms' AND `ses` = '$ses'";
$ds   = query($pee);
$ress = query($pes);
$dws  = mysqli_fetch_array($ds); 
$pos  = mysqli_fetch_array($ress);

 $mrkpos  = $dws['pss'] * 100;
 $mrkobt  = $pos['mobt'];
 if ($mrkpos == 0 && $mrkobt == 0) {
  
  $perc = 0;
  $grade = 0;
 } else {
 $perc    = ($mrkobt/$mrkpos) * 100;

 if ($perc <= 39) {
    
    $grade  = "F9 - Fail";
   
     } else {

  if ($perc <= 44) {
    
  $grade  = "E8 - Pass";
  
  } else {

  if ($perc <= 49) {

  $grade  = "D7 - Pass";
 
  } else {

  if ($perc <= 54) {
  
  $grade  = "C6 - Credit";
  
  } else {

  if ($perc <= 59) {
  
  $grade  = "C5 - Credit";
 
  } else {

  if ($perc <= 64) {

  $grade  = "B3 - Good";
 
  } else {

  if ($perc <= 69) {
  
  $grade  = "B2 - Very Good";
 
  } else {

  if ($perc <= 89) {
  
  $grade  = "A1 - Excellent";
 
  } else {

  if ($perc <= 100) {

  $grade  = "A* - Distinction";
 
  }
  }
  }
  }
  }
  }
  }
  }
  }
}

//update new details'
$updls = "UPDATE motor SET `mrkpos` = '$mrkpos', `mrkobt` = '$mrkobt', `perc` = '$perc', `totgra` = '$grade' WHERE `admno` = '$data' AND `class` = '$cls' AND `term` = '$tms' AND `ses` = '$ses'";
$updlslq = query($updls);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $call['school'] ?> | Staff Portal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $call['school'] ?> | Staff Portal">
    <meta name="keywords" content="<?php echo $call['school'] ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="icon" href="dist/img/logo.png" type="image/png" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
    .table-bordered td,
    .table-bordered th {

        border: 1px solid #000000;
    }
    </style>
</head>

<body>
    <div class="text-center">
        <h1><img style="width: 50px; height: 50px;" src="dist/img/logo.png"> <b><?php echo $call['school'] ?></b></h1>
        <h6><b>Gov`t Approved</b></h6>
        <h5><?php echo $call['addr'] ?></h5>
        <h6><b>Tel.: <?php echo $call['tel'] ?> &nbsp; &nbsp; &nbsp; Website.: <?php echo $call['website'] ?> &nbsp;
                &nbsp; &nbsp;
                Email.:
                <?php echo $call['emal'] ?></b></h6>

        <br />

        <h3>STUDENT PROGRESS REPORT FOR <?php echo strtoupper($tms) ?></h3>
        <br />
    </div>

    <div class="container">
        <div class="row">
            <h5 class="col-sm-6">Name.:
                <b><?php echo $qw2['SurName']." ".$qw2['Middle Name']." ".$qw2['Last Name'] ?></b>
            </h5>
            <h5 class="col-sm-6">Admission Number.: <b><?php echo $data ?></b></h5>
            <h5 class="col-sm-6">Class.: <b><?php echo $cls ?></b></h5>
            <h5 class="col-sm-6">No on Roll.: <b><?php echo $qw1['altol'] ?></b></h5>
            <h5 class="col-sm-6">Times Absent.: <b><?php echo $row3['tsa'] ?></b></h5>
            <h5 class="col-sm-6">School Resumes.:
                <b><?php echo date('l, F d, Y ', strtotime($row3['resm'])); ?></b>
            </h5>
            <!-- <h5 class="col-sm-6">Times Present.: <?php echo $row3['tsp'] ?></h5> -->
        </div>
    </div>
    <br />
    <table class="table table-hover text-center table-bordered table-striped">
        <?php

if($cls == 'Transition' || $cls == 'Reception' || $cls == 'Kindergarten' || $cls == 'Nursery 1') {

            echo '

            <tr>
            <th>Subject</th>
            <th width="90px">CAT 1 <br />(10)</th>
            <th width="90px">CAT 2 <br />(10)</th>
            <th>Exam Score<br>(80)</th>
            <th>Total<br>(100)</th>
            <th>1st Term <br />Score</th>
            <th>2nd Term <br />Score</th>
            <th>3rd Term <br />Score</th>
            <th>Annual <br />Score</th>
            <th>Grade</th>
            <th>Remark</th>
        </tr>

            ';


        } else {

            echo '

            <tr>
            <th>Subject</th>
            <th width="90px">CAT 1 <br />(10)</th>
            <th width="90px">CAT 2 <br />(10)</th>
            <th width="90px">CAT 3<br>(10)</th>
            <th>Exam Score<br>(70)</th>
            <th>Total<br>(100)</th>
            <th>1st Term <br />Score</th>
            <th>2nd Term <br />Score</th>
            <th>3rd Term <br />Score</th>
            <th>Annual <br />Score</th>
            <th>Grade</th>
            <th>Remark</th>
        </tr>
            
            ';
            
            
        }


$sql= "SELECT * FROM `result` WHERE `admno` = '$data' AND `term` = '$tms' AND `ses` = '$ses'";
$result_set=query($sql);
if(row_count($result_set) == "") {
            
          } else {
while($row= mysqli_fetch_array($result_set))
 {
  $frd = $row['subject'];
$sql2= "SELECT * FROM `score` WHERE `admno` = '$data' AND `subject` = '$frd' AND `ses` = '$ses'";
$result_set2=query($sql2);
$row2= mysqli_fetch_array($result_set2);

if($tms == "1st Term"){
    $annual = $row2['fscore'];
    } else {
    if($tms == "2nd Term") {
    $annual = ($row2['fscore'] + $row2['sndscore']) / 2;
    }else {
    if($tms == "3rd Term") {
      $annual = ($row2['fscore'] + $row2['sndscore'] + $row2['tscore']) / 3;  
    }
    }
    }
    
    if($cls == 'Transition' || $cls == 'Reception' || $cls == 'Kindergarten' || $cls == 'Nursery 1') {

        echo '

        <tr>
        <td>'.ucwords($row['subject']).'</td>
        <td>'.$row['test'].'</td>
        <td>'.$row['ass'].'</td>
        <td>'.$row['exam'].'</td>
        <td>'.$row['total'].'</td>
        <td>'.$row2['fscore'].'</td>
        <td>'.$row2['sndscore'].'</td>
        <td>'.$row2['tscore'].'</td>
        <td>'.$annual.'</td>
        <td>'.$row['grade'].'</td>
        <td>'.$row['remark'].'</td>
        </tr>

        ';

        } else {

        echo '

        <tr>
        <td>'.ucwords($row['subject']).'</td>
        <td>'.$row['test'].'</td>
        <td>'.$row['ass'].'</td>
        <td>'.$row['classex'].'</td>
        <td>'.$row['exam'].'</td>
        <td>'.$row['total'].'</td>
        <td>'.$row2['fscore'].'</td>
        <td>'.$row2['sndscore'].'</td>
        <td>'.$row2['tscore'].'</td>
        <td>'.$annual.'</td>
        <td>'.$row['grade'].'</td>
        <td>'.$row['remark'].'</td>
        </tr>


        ';
        }


        }
        }
        ?>
    </table>

    <table style="width: 100%;" class="table table-hover table-bordered table-striped">

        <tr>
            <th class="text-center" colspan="2">Affective Domain</th>
            <th class="text-center" colspan="2">Psychomotor</th>
            <th class="text-center" colspan="2">Academic Performance Summary</th>
        </tr>
        <?php
$sql2 = "SELECT * FROM `motor` WHERE `admno` = '$data' AND `term` = '$tms' AND `ses` = '$ses'";
$result_set2 = query($sql2);
$row2 = mysqli_fetch_array($result_set2);
if(row_count($result_set2) == "") {
    echo "<span style='color:red'>No records found</span>";        
  } else {
?>

        <tr>
            <td>Carrying Out Assignment</td>
            <td><?php echo $row2['attendance'] ?></td>
            <td>Obedience</td>
            <td><?php echo $row2['sport'] ?></td>
            <td><b>Mark Possible .:</b> &nbsp;&nbsp; <?php echo $mrkpos ?></td>
            <td><b>Mark Obtained .:</b> &nbsp;&nbsp; <?php echo $mrkobt ?></td>
        </tr>
        <tr>
            <td>Politeness</td>
            <td><?php echo $row2['punctuality'] ?></td>
            <td>Attitude to Work</td>
            <td><?php echo $row2['societies'] ?></td>
            <td colspan="2"><b>Percentage .:</b> &nbsp;&nbsp; <?php echo(round($perc,1)); ?>%</td>
        </tr>
        <tr>
            <td>Honesty</td>
            <td><?php echo $row2['honesty'] ?></td>
            <td>Attentiveness in class</td>
            <td><?php echo $row2['youth'] ?></td>
            <td><b>Total Grade.:</b> &nbsp;&nbsp; <?php echo $grade ?></td>
            <?php
    if (isset($_SESSION['rep'])) {
   $wed = $_SESSION['rep'];
   echo '<td>'.$wed.'</td>';
} else {
    echo '<td></td>';
}    
?>
        </tr>
        <tr>
            <td>Neatness</td>
            <td><?php echo $row2['neatness'] ?></td>
            <td>Co-operation</td>
            <td><?php echo $row2['aesth'] ?></td>
            <td colspan="2" rowspan="6"><b>Principal Comment.:</b> &nbsp;&nbsp;
                <?php echo ucwords($row2['principal']) ?></td>
        </tr>
        <tr>
            <td>Self Control</td>
            <td><?php echo $row2['nonaggr'] ?></td>
        </tr>
        <tr>
            <td>Organisational Ability</td>
            <td><?php echo $row2['leader'] ?></td>
        </tr>
        <tr>
            <td>Relationship with others</td>
            <td><?php echo $row2['relation'] ?></td>
        </tr>
    </table>

</body>

<script type="text/javascript">
window.addEventListener("load", window.print());
</script>

</html>
<?php
}
}
}
?>