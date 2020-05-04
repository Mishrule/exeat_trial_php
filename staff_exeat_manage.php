<?php 
    require_once('./inc/scripts/exeatdb.php');
    require_once('./inc/headers/dateTime.php');
    require_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/headers/head.php'); ?>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="#">
                    <strong class="blue-text">
                        <marquee>Welcome: <?php echo $usernamelogin;?></marquee>
                    </strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link waves-effect">
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect"></a>
                        </li>
                        <li class=" nav-item">
                            <a class="nav-link waves-effect"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect"></a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link border border-light rounded waves-effect">
                                <i class="fab fa-github mr-2"></i>Logout
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

             <?php require_once('inc/headers/brand.php'); ?>

            <div class="list-group list-group-flush">

                <a href="staff_exeat_assign.php" class="list-group-item list-group-item-action  waves-effect">
                    <i class="fas fa-user mr-3"></i>Assign Exeat</a>
                <a href="staff_exeat_manage.php" class="list-group-item active list-group-item-action waves-effect">
                    <i class="fas fa-table mr-3"></i>Manage Exeat</a>

            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="staff_exeat_assign.php">Assign Exeat</a>
                        <span>/</span>
                        <span>Manage Exeat</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-7 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Student Exeat Status:</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 id="studentExeatStat" style="color:red">Not Return</h4>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label for="student_name" class="col-md-3 col-form-label">Student
                                    Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="student_name" name="student_name"
                                        disabled>
                                    <small id="infostudentForm" class="form-text"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="student_id" class="col-md-3 col-form-label">Student
                                    ID</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="student_id" name="student_id" disabled>
                                    <small id="infostudentForm" class="form-text"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="assign_date" class="col-md-3 col-form-label">Assigned Date</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="assign_date" name="assign_date"
                                        disabled>
                                    <small id="infostudentForm" class="form-text"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exeat_approve" class="col-md-3 col-form-label">Return Approved by</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="exeat_approve" name="exeat_approve"
                                        value="<?php echo $usernamelogin; ?>" disabled>
                                    <small id="infostudentForm" class="form-text"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exeat_status" class="col-md-3 col-form-label">Status</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="exeat_status" name="exeat_status"
                                        disabled>
                                    <small id="infostudentForm" class="form-text"></small>
                                </div>
                            </div>

                            <div align="center">
                                <button type="button" name="submitBtn" id="submitBtn" value="submitBtn"
                                    class="btn btn-primary col-md-6">UPDATE EXEAT</button>
                            </div>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-5 mb-4">

                    <!--Card-->
                    <div class="card mb-4">

                        <!-- Card header -->
                        <div class="card-header text-center">
                            CHECK STUDENT STATUS
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <?php 
                                $manageExeatDateShow = '';
                                $manageExeatDateSQL = "SELECT * FROM exeat WHERE status_ = 'Not Returned' ORDER BY assign_date DESC";
                                $manageExeatDateResult = mysqli_query($conn, $manageExeatDateSQL);
                                if(mysqli_num_rows($manageExeatDateResult)>0){
                                    while($manageExeatDateRow = mysqli_fetch_array($manageExeatDateResult)){
                                        $manageExeatDateShow .= '
                                            <option value="'.$manageExeatDateRow['assign_date'].'">'.$manageExeatDateRow['assign_date'].'</option>
                                        ';
                                    }
                                    
                                }else{
                                    $manageExeatDateShow .= '
                                        <option>NO EXEAT ASSIGNED YET</option>
                                    ';
                                }

                                                                    
                            ?>
                            <div class="form-group">
                                <label for="exeatdate">Date Assigned Exeat</label>
                                <select class="form-control" id="exeatdate" name="exeatdate">
                                    <option>Choose Date Assigned</option>
                                    <?php echo $manageExeatDateShow; ?>
                                </select>
                            </div>

                        </div>

                    </div>
                    <!--/.Card-->



                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->



        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <?php require_once('inc/headers/footer.php'); ?>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <?php require_once('inc/headers/jsscripts.php'); ?>


</body>

</html>
<script>
$(document).ready(function() {
    $('#submitBtn').attr('disabled', true);
    $('#exeatdate').change(function() {
        var exeat_date = $('#exeatdate').val();
        if (exeat_date === 'Choose Date Assigned') {
            $('#exeat_status').val('');
            $('#submitBtn').attr('disabled', true);
        } else {
            $.ajax({
                url: 'inc/scripts/exeatScripts.php',
                method: 'POST',
                data: {
                    exeat_date
                },
                dataType: 'json',
                success: function(data) {
                    $('#studentExeatStat').text(data.studentExeatStat);
                    $('#student_name').val(data.student_name);
                    $('#student_id').val(data.student_id);
                    $('#assign_date').val(data.assign_date);
                    // $('#exeat_approve').val(data.exeat_approve);
                    $('#exeat_status').val('Return');
                    $('#submitBtn').attr('disabled', false);
                }
            })
        }
    });

    // =============================| UPDATE EXEAT |====================================
    $('#submitBtn').click(function() {

        var updatestudent_name = $('#student_name').val();
        var updatestudent_id = $('#student_id').val();
        var updateassign_date = $('#assign_date').val();
        var updateexeat_approve = $('#exeat_approve').val();
        var updateexeat_status = $('#exeat_status').val();
        var updatesubmitBtn = $('#submitBtn').val();

        if (updatestudent_name === '') {
            alert("STUDENT NAME CAN'T BE EMPTY")
            location.reload();
        } else {

            $.ajax({
                url: 'inc/scripts/exeatScripts.php',
                method: 'POST',
                data: {
                    updatestudent_name,
                    updatestudent_id,
                    updateassign_date,
                    updateexeat_approve,
                    updateexeat_status,
                    updatesubmitBtn
                },

                success: function(data) {
                    alert(data);
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                }
            })
        }
    });
})
</script>