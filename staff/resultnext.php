<?php include("functions/top.php"); ?>
<?php
if(!isset($_GET['id']) && !isset($_GET['cls']) && !isset($_GET['term']) && !isset($_GET['ses'])) {
  header("location: ../opps");
}

$data = $_GET['id'];
$cls  = $_GET['cls'];
$term = $_GET['term'];
$ses  = $_GET['ses'];


//get student name from admission no.
$sl = "SELECT * FROM students WHERE `AdminID` = '$data'";
$res = query("$sl");
$rower = mysqli_fetch_array($res);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Upload Result Details for <?php echo $term ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">Upload Result</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- right column -->
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Upload Result Details for <strong>
                            <?php echo $rower['SurName']." ".$rower['Middle Name']." ".$rower['Last Name'] ?></strong> -
                        <?php echo $term ?> </h3>
                    <div class="card-tools">
                        <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool"
                            data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form name="uploadQuestionaire" role="form">

                        <div class="form-group">
                            <div class="row">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Carrying Out Assignment.:</label>

                                            <input type="number" name="date" id="attd"
                                                placeholder="Carrying Out Assignment" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Politeness.:</label>
                                            <input type="number" name="month" id="punc" placeholder="Politeness"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Honesty.:</label>
                                            <input type="number" name="year" id="hons" placeholder="Honesty"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Neatness.:</label>
                                            <input type="number" name="year" id="neat" placeholder="Neatness"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Self Control.:</label>
                                            <input type="number" name="year" id="nonaggr" placeholder="Self Control"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Organisational Ability.:</label>
                                            <input type="number" name="year" id="ldsk"
                                                placeholder="Organisational Ability" class="form-control">
                                        </div>
                                        <!-- /.input group -->

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Obedience.:</label>
                                            <input type="number" name="date" id="sprt" placeholder="Obedience"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Attitude to Work.:</label>
                                            <input type="number" name="month" id="soci" placeholder="Attitude to Work"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Attentiveness in class.:</label>
                                            <input type="number" name="year" id="yth"
                                                placeholder="Attentiveness in class" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Co-operation.:</label>
                                            <input type="number" name="year" id="aes" placeholder="Co-operation"
                                                class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Relationship with others.:</label>
                                            <input type="number" name="year" id="rel"
                                                placeholder="Relationship with others" class="form-control">
                                        </div>

                                        <div class="form-group col-md-3" hidden>
                                            <label for="exampleInputEmail1">Times school opened.:</label>
                                            <input type="number" name="year" id="tso" value='0'
                                                placeholder="Times school opened" class="form-control">
                                        </div>

                                        <div class="form-group col-md-3" hidden>
                                            <label for="exampleInputEmail1">Times student absent.:</label>
                                            <input type="number" name="year" id="tsa" value='0'
                                                placeholder="Times student absent" class="form-control">
                                        </div>

                                        <div class="form-group col-md-3" hidden>
                                            <label for="exampleInputEmail1">Times student present.:</label>
                                            <input type="number" name="year" id="tsp"
                                                placeholder="Times student present" value='0' class="form-control">
                                        </div>


                                        <?php
$sql = "SELECT sum(sn) AS pss FROM result WHERE `admno` = '$data' AND `class` = '$cls' AND `term` = '$term' AND `ses` = '$ses'";
$ssl = "SELECT sum(total) AS mobt FROM result WHERE `admno` = '$data' AND `class` = '$cls' AND `term` = '$term' AND `ses` = '$ses'";
$ds   = query($sql);
$ress = query($ssl);
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
?>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Mark Possible.:</label>
                                            <input type="number" name="year" id="mrkps" value="<?php echo $mrkpos ?>"
                                                class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Mark Obtained.:</label>
                                            <input type="number" name="year" id="mrkbt" value="<?php echo $mrkobt ?>"
                                                class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Percentage.:</label>
                                            <input type="text" name="year" id="perci"
                                                value="<?php echo(round($perc,1)); ?>%" class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Total Grade.:</label>
                                            <input type="text" name="year" id="tog" value="<?php echo $grade ?>"
                                                class="form-control" disabled>
                                        </div>

                                        <?php
     if ($term == "1st Term" || $term == "2nd Term") {

echo '<input type="text" name="year" id="pro" value="null" class="form-control" hidden>';
} elseif ($term == "3rd Term" && $perc < 40)
 {

  $rep = "Advised to repeat";
  
 ?>

                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Promoted .:</label>
                                            <input type="text" name="year" id="pro" value="<?php echo $rep ?>"
                                                class="form-control" disabled>
                                        </div>
                                        <?php
} else {
  if ($cls == 'Basic 1') {
   $cs = 'Basic 2';
  } else {
  if ($cls == 'Basic 2') {
   $cs = 'Basic 3';
  } else {
  if ($cls == 'Basic 3') {
   $cs = 'Basic 4';
  } else {
  if ($cls == 'Basic 4') {
   $cs = 'Basic 5-6';
  } else {
  if ($cls == 'Basic 5-6') {
   $cs = 'J.S.S 1';
  } else {
  if ($cls == 'J.S.S 1') {
   $cs = 'J.S.S 2';
  } else {
  if ($cls == 'J.S.S 2') {
  $cs = 'J.S.S 3';
  } else {
  if ($cls == 'J.S.S 3') {
  $cs = 'S.S.S 1';
  } else {
  if ($cls == 'S.S.S 1') {
  $cs = 'S.S.S 2';
  } else {
  if ($cls == 'S.S.S 2') {
  $cs = 'S.S.S 3';
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
 $rep = "Promoted to ".$cs;
 $_SESSION['rep'] = $rep;
?>

                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Promoted .:</label>
                                            <input type="text" id="pro" value="<?php echo $rep ?>" class="form-control"
                                                disabled>
                                        </div>

                                        <?php
}
?>
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1">School Resumes .:</label>
                                            <input type="date" name="resmes" id="resmes" class="form-control">
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Class Teacher Comment .:</label>
                            <select id="prin" class="form-control">
                                <optgroup label="Positve Comment">
                                    <option id="prin">Excellent Result</option>
                                    <option id="prin">Display Execeptional
                                    </option>
                                    <option id="prin">Shows Commitment</option>
                                    <option id="prin">Consistent in his/her subjects</option>
                                    <option id="prin">Effective and Efficient</option>
                                    <option id="prin">Intelligent and Impressive</option>
                                    <option id="prin">Strives to reach full potential.</option>
                                    <option id="prin">Is committed to doing best.</option>
                                    <option id="prin">Seeks new challenges.</option>
                                    <option id="prin">Takes responsibility for learning.</option>
                                </optgroup>
                                <optgroup label="Average Comment">
                                    <option id="prin">Satisfactory</option>
                                    <option id="prin">After school, assitant/extra help recommended</option>
                                    <option id="prin">Making clear progress in all subjects
                                    </option>
                                    <option id="prin">Requires additional effort</option>
                                    <option id="prin">Demonstrates a limited ability</option>
                                </optgroup>
                                <optgroup label="Improvement comments">
                                    <option id="prin">Needs to listen to directions fully so that he/she can learn to
                                        work independently
                                    </option>
                                    <option id="prin">Work well but needs to learn how to work better cooperatively with
                                        peers</option>
                                    <option id="prin">Gives up easily when something is difficult and needs extensive
                                        encouragement</option>
                                    <option id="prin">Has a difficult time concentrating and gets easily distracted
                                    </option>
                                    <option id="prin">Fair result, try more next time</option>
                                </optgroup>
                            </select>

                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $data; ?>" id="admis" hidden>
                            <input type="text" class="form-control"
                                value="<?php echo $rower['SurName']." ".$rower['Middle Name']." ".$rower['Last Name'] ?>"
                                id="name" hidden>
                            <input type="text" class="form-control" value="<?php echo $cls; ?>" id="cla" hidden>
                            <input type="text" class="form-control" value="<?php echo $term; ?>" id="term" hidden>
                            <input type="text" class="form-control" value="<?php echo $ses; ?>" id="ses" hidden>
                        </div>

                        <p class="text-danger">Make sure you recheck all details typed in before submitting</p>

                        <button type="button" id="subdone" class="btn float-right btn-primary btn-outline-light">Submit
                            Result</button>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->

        </div>
        <!--/.col (right) -->
    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<?php include("include/footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!---modal reset--->
<div class="modal fade" id="modal-reset">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Reset
                    <?php echo $rower['SurName']." ".$rower['Middle Name']." ".$rower['Last Name']. " ".$term ?>
                    Result(s)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <p class="text-grey">Resetting will clear off all uploaded result(s) for the above named person.</p>
                    <p class="text-grey">Are you sure you want to continue?</p>
                    <input type="text" value="<?php echo $data; ?>" id="subb" hidden>
                    <input type="text" value="<?php echo $term; ?>" id="trm" hidden>
                    <input type="text" value="<?php echo $cls; ?>" id="ccs" hidden>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No! Cancel</button>
                <button type="button" id="reseted" class="btn btn-outline-light">Yes! Continue</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->











<!---modal delete--->
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete a Subject Result <span id="msg"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <p class="text-grey">Deleting a subject result will delete all records for that subject result and
                        also the the subject. <br>If you are not sure about this, kindly contact the school ICT or
                        cancel this dialog.</p>

                    <form name="deleting">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Subject Uploaded</span>
                            </div>
                            <select id="position" class="form-control">
                                <?php
                 
 $sql= "SELECT * FROM `result` WHERE `admno` = '$data' AND `term` = '$term'";;
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
          ?>
                                <option id="sbjjr"><?php echo $row['subject']; ?></option>

                                <?php
                  }
                  ?>
                            </select>
                            <input type="text" value="<?php echo $data; ?>" id="subbr" hidden>
                            <input type="text" value="<?php echo $term; ?>" id="trmr" hidden>
                            <input type="text" value="<?php echo $cls; ?>" id="ccsr" hidden>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                <button type="button" id="movedel" class="btn btn-outline-light">Continue</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->





<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>
<script src="ajax.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
});
</script>

<?php


//notification for deleted

if(isset($_SESSION['del'])) {
   unset($_SESSION['del']);
 
}


//notification for upload result
if(isset($_SESSION['upup'])) {
    unset($_SESSION['upup']);

}


//notification for reset result
if(isset($_SESSION['res'])) {
    unset($_SESSION['res']);

}

//notification for update result
if(isset($_SESSION['upupl'])) {
   unset($_SESSION['upupl']);

}

?>
<!-- page script -->
</body>

</html>