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


$newmobt = 0;

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
    .table-bordered th,
    .table-bordered td {
        border: 2px solid black;
    }

    @media print {
        body {
            background-image: url('dist/img/res.png');
        }

        .table-bordered th,
        .table thead tr td,
        .table tbody tr td {
            border-width: 1px !important;
            border-style: solid !important;
            border-color: black !important;
            background-color: red;
            -webkit-print-color-adjust: exact;
        }
    }
    </style>
</head>

<body
    style="background-image: url('dist/img/res.png'); background-repeat: no-repeat; background-position: center; background-size: contain;">
    <div class="text-center">
        <h1><img style="width: 50px; height: 50px;" src="dist/img/logo.png"> <b>MISSION & COSMOPOLITAN SCHOOLS</b></h1>
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
            <h5 class="col-sm-6">Academic Session.: <b><?php echo $ses ?></b></h5>
            <h5 class="col-sm-6">School Resumes.:
                <b><?php echo date('l, F d, Y ', strtotime($row3['resm'])); ?></b>
            </h5>
            <!-- <h5 class="col-sm-6">Times Present.: <?php echo $row3['tsp'] ?></h5> -->
        </div>
    </div>
    <br />
    <table class="table table-sm table-hover text-center table-bordered table-striped border-primary">
        <?php


            echo '

            <tr>
            <th>Subject</th>
            <th>Test 1 <br />(10)</th>
            <th>Test 2 <br />(10)</th>
            <th>Test 3<br>(10)</th>
            <th>Exam<br>Score(70)</th>
            <th>Total<br>(100)</th>';
            
            if($tms == '1st Term') {
                echo '
                <th>1st Term <br />Score</th>
                '; 
            } else {

            if($tms == '2nd Term') {

                echo '
                <th>1st Term <br />Score</th>
                <th>2nd Term <br />Score</th>
                ';
            } else {

            if($tms == '3rd Term') {

            echo '
            <th>1st Term <br />Score</th>
            
            <th>2nd Term <br />Score</th>

            ';
            }
            }
            }
            
            
           
            echo '
            <th>Cumm <br />Score</th>
            <th>Class <br />Avg.</th>
            <th>Highest <br />in class</th>
            <th>Position</th>
            <th>Grade</th>
            <th>Remark</th>
        </tr>';

        

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


        //class avg
        $aql = "SELECT sum(`total`) as totss, sum(`sn`) as stds from `result` WHERE `subject` = '$frd' AND `ses` = '$ses' AND `term` = '$tms'";
        $aes = query($aql);
        $aow = mysqli_fetch_array($aes);

        $clavg = $aow['totss'] / $aow['stds'];
        
        echo '

        <tr>
        <td>'.ucwords($row['subject']).'</td>
        <td>'.$row['test'].'</td>
        <td>'.$row['ass'].'</td>
        <td>'.$row['classex'].'</td>
        <td>'.$row['exam'].'</td>
        <td>'.$row['total'].'</td>';
            if($tms == '1st Term') {

            $annual = $row['total'];


            //highest score
            $hsl = "SELECT MAX(`fscore` + 0) as highest from `score` WHERE `subject` = '$frd' AND `ses` = '$ses' AND `class` = '$cls'";
            $hes = query($hsl);
            $how = mysqli_fetch_array($hes);

            $highest = $how['highest'];


            //lowest score
            $lsl = "SELECT MIN(`fscore` + 0) as lowest from `score` WHERE `subject` = '$frd' AND `ses` = '$ses' AND `class` = '$cls'";
            $les = query($lsl);
            $low = mysqli_fetch_array($les);
            
            $lowet = $low['lowest'];

            if($lowet == 0) {

                $lowest = 5;

            } else {

                $lowest = $low['lowest'];

            }
            
            echo '
            <td>'.$row2['fscore'].'</td>
            <td>'.$annual.'</td>
            <td>'.round($clavg, 0).'</td>
            <td>'.$highest.'</td>
            ';
            } else {

            if($tms == '2nd Term') {

            //highest score
            $hsl = "SELECT MAX(`fscore` + 0) as highest from `score` WHERE `subject` = '$frd' AND `ses` = '$ses' AND `class` = '$cls'";
            $hes = query($hsl);
            $how = mysqli_fetch_array($hes);

            $highest = $how['highest'];


            //lowest score
            $lsl = "SELECT MIN(`fscore` + 0) as lowest from `score` WHERE `subject` = '$frd' AND `ses` = '$ses' AND `class` = '$cls'";
            $les = query($lsl);
            $low = mysqli_fetch_array($les);
            
            $lowet = $low['lowest'];

            if($lowet == 0) {

                $lowest = 5;

            } else {

                $lowest = $low['lowest'];
            }

            if($row2['fscore'] == 0) {

            $annual = $row2['sndscore'];

            } else {

            $annual = round(($row2['fscore'] + $row2['sndscore']) / 2, 0);

            }

            echo '
            <td>'.$row2['fscore'].'</td>
            <td>'.$row2['sndscore'].'</td>
            <td>'.$annual.'</td>
            <td>'.round($clavg, 0).'</td>
            <td>'.$highest.'</td>
            ';

            } else {

            if($tms == '3rd Term') {

            //highest score
            $hsl = "SELECT MAX(`fscore` + 0) as highest from `score` WHERE `subject` = '$frd' AND `ses` = '$ses' AND `class` = '$cls'";
            $hes = query($hsl);
            $how = mysqli_fetch_array($hes);

            $highest = $how['highest'];


            //lowest score
            $lsl = "SELECT MIN(`fscore` + 0) as lowest from `score` WHERE `subject` = '$frd' AND `ses` = '$ses' AND `class` = '$cls'";
            $les = query($lsl);
            $low = mysqli_fetch_array($les);
            
            $lowet = $low['lowest'];

            if($lowet == 0) {

                $lowest = 5;

            } else {

                $lowest = $low['lowest'];
            }

            if($row2['fscore'] == 0 && $row2['sndscore'] == 0) {

            $annual = $row2['tscore'];

            } else {

            if($row2['fscore'] == 0 && $row2['sndscore'] != 0) {

            $annual = round(($row2['sndscore'] + $row2['tscore']) / 2, 1);

            } else {

            if($row2['fscore'] != 0 && $row2['sndscore'] == 0) {

            $annual = round(($row2['fscore'] + $row2['tscore']) / 2, 1);
            } else {

            $annual = round(($row2['fscore'] + $row2['sndscore'] + $row2['tscore']) / 3, 1);


            }
            }
            }


            echo '
            <td>'.$row2['fscore'].'</td>
            <td>'.$row2['sndscore'].'</td>
            <td>'.$annual.'</td>
            <td>'.round($clavg, 0).'</td>
            <td>'.$highest.'</td>

            ';

            }
            }
            }
            echo '
            <td>'.$row['position'].'</td>
            <td>'.$row['grade'].'</td>
            <td>'.$row['remark'].'</td>
        </tr>


        ';
        }


        }
        ?>

    </table>
    <table style=" width: 100%;" class="table table-bordered">

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
            <td><b>Mark Possible .:</b> &nbsp;&nbsp; <?php echo $row2['mrkpos'] ?></td>
            <td><b>Mark Obtained .:</b> &nbsp;&nbsp; <?php echo $row2['mrkobt'] ?></td>
        </tr>
        <tr>
            <td>Politeness</td>
            <td><?php echo $row2['punctuality'] ?></td>
            <td>Attitude to Work</td>
            <td><?php echo $row2['societies'] ?></td>
            <td colspan="2"><b>Percentage .:</b> &nbsp;&nbsp; <?php echo $row2['perc'] ?></td>
        </tr>
        <tr>
            <td>Honesty</td>
            <td><?php echo $row2['honesty'] ?></td>
            <td>Attentiveness in class</td>
            <td><?php echo $row2['youth'] ?></td>
            <td><b>Total Grade.:</b> &nbsp;&nbsp; <?php echo $row2['totgra'] ?></td>
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
            <td colspan="2"><b>Principal Comment.:</b> &nbsp;&nbsp;
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
<?php
}
}
}
?>

</html>