<?php 
    require_once('./inc/scripts/exeatdb.php');
    require_once('./inc/headers/dateTime.php');
    $studentRegShow = '';

    if(isset($_POST['submitBtn'])){
        
        $studentID = mysqli_real_escape_string($conn, $_POST['student_ID']);
        $studentname = mysqli_real_escape_string($conn, $_POST['student_name']);
        $studentgender = mysqli_real_escape_string($conn, $_POST['student_gender']);
        $studentform = mysqli_real_escape_string($conn, $_POST['student_form']);
        $studenthealth = mysqli_real_escape_string($conn, $_POST['student_health']);
        $studentprogram = mysqli_real_escape_string($conn, $_POST['student_program']);
        $parentname = mysqli_real_escape_string($conn, $_POST['parent_name']);
        $parentcontact = mysqli_real_escape_string($conn, $_POST['parent_contact']);
        $parentlocation = mysqli_real_escape_string($conn, $_POST['parent_location']);
        $registrationdate = mysqli_real_escape_string($conn, $_POST['registration_date']);
        // $student_Image = mysqli_real_escape_string($conn, $_POST['student_Image']);

        $image =$_FILES['student_Image']['name'];
        $target = "img/".basename($_FILES['student_Image']['name']);

        $studentRegistrationSQL = "INSERT INTO student_registration VALUES('','$studentID','$studentname','$studentgender','$studentform','$studenthealth','$studentprogram','$parentname','$parentcontact','$parentlocation','$registrationdate', '$image')";

        $studentRegistrationResult = mysqli_query($conn, $studentRegistrationSQL);
        move_uploaded_file($_FILES['student_Image']['tmp_name'], $target);
        if($studentRegistrationResult){
            $studentRegShow .= '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>'.$studentname.'</strong>\'s  Registration have been saved on'.$dateTime.' successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
           
        }else{
            $studentRegShow .= '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>'.$studentname.'</strong> Registration has Failed '.mysqli_error($conn).'.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }
                
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/headers/head.php'); ?>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php require_once('inc/headers/nav.php'); ?>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

            <?php require_once('inc/headers/brand.php'); ?>

            <div class="list-group list-group-flush">
                <a href="dashboard.php" class="list-group-item waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>Dashboard
                </a>
                <a href="student_registration.php" class="list-group-item active list-group-item-action waves-effect">
                    <i class="fas fa-user mr-3"></i>Register Students</a>
                <a href="student_management.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-table mr-3"></i>Manage Students</a>
                <a href="student_profile.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-map mr-3"></i>Student Profile</a>
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
                        <span>Student Registration</span>
                    </h4>



                </div>

            </div>
            <!-- Heading -->
            <?php echo $studentRegShow; ?>

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-9 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <form method="POST" action="<?php $_PHP_SELF; ?>" enctype="multipart/form-data">
                                <legend align="center">Register Student</legend>

                                <div class="form-group row">
                                    <label for="student_ID" class="col-sm-2 col-form-label">Student ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="student_ID" name="student_ID">
                                        <small id="infoStudentID" class="form-text" style="color:red"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="student_name" class="col-sm-2 col-form-label">Student Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="student_name" name="student_name">
                                        <small id="infoStudentName" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="student_gender" class="col-sm-2 col-form-label">Student Gender</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select mr-sm-2" id="student_gender" name="student_gender">
                                            <option selected>Choose...</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>

                                        </select>
                                        <small id="infoStudentGender" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="student_form" class="col-sm-2 col-form-label">Student Form</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select mr-sm-2" id="student_form" name="student_form">
                                            <option selected>Choose...</option>
                                            <option value="Form_1">Form 1</option>
                                            <option value="Form_2">Form 2</option>
                                            <option value="Form_3">Form 3</option>

                                        </select>
                                        <small id="infoStudentForm" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="student_health" class="col-sm-2 col-form-label">Student Health</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select mr-sm-2" id="student_health" name="student_health">
                                            <option selected>Choose...</option>
                                            <option value="healthy">Healthy</option>
                                            <option value="partial">Partial</option>
                                            <option value="bad">Bad</option>

                                        </select>
                                        <small id="infoStudentHealth" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="student_program" class="col-sm-2 col-form-label">Student Program</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="student_program"
                                            name="student_program">
                                        <small id="infoStudentProgram" class="form-text"></small>
                                    </div>
                                </div>
                                <strong>
                                    <marquee>
                                        <p align="center" style="color:red">PARENT INFORMATION</p>
                                    </marquee>
                                </strong>

                                <div class="form-group row">
                                    <label for="parent_name" class="col-sm-2 col-form-label">Parent Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="parent_name" name="parent_name">
                                        <small id="infoStudentParentName" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="parent_contact" class="col-sm-2 col-form-label">Parent
                                        Contact</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="parent_contact"
                                            name="parent_contact">
                                        <small id="infoStudentParentcontact" class="form-text"></small>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="parent_location" class="col-sm-2 col-form-label">Parent
                                        Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="parent_location"
                                            name="parent_location">
                                        <small id="infoStudentParentLocation" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="registration_date" class="col-sm-2 col-form-label">Registration
                                        Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="registration_date"
                                            name="registration_date">
                                        <small id="infoStudentDate" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="student_Image" class="col-sm-2 col-form-label">Student Image</label>
                                    <div class="custom-file col-sm-10">
                                        <input type="file" class="custom-file-input" id="student_Image"
                                            name="student_Image">
                                        <label class="custom-file-label" for="customFile">Browse Image</label>
                                    </div>
                                </div>

                                <div align="center">
                                    <button type="submit" name="submitBtn" id="submitBtn" value="submitBtn"
                                        class="btn btn-primary col-md-6">Register</button>
                                </div>

                            </form>


                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 mb-4">

                    <!--Card-->
                    <div class="card mb-4">

                        <!-- Card header -->
                        <div class="card-header text-center">
                            Last (5) Persons Registered
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <?php 
                                $lastRegisteredShow = '';
                                $lastRegisteredSQL = "SELECT * FROM student_registration ORDER BY registrationdate DESC LIMIT 5";
                                $lastRegisteredResult = mysqli_query($conn, $lastRegisteredSQL);
                                $lastRegisteredCount = 1;
                                $lastRegisteredShow = '<ul class="list-group list-group-flush">';
                                 if(mysqli_num_rows($lastRegisteredResult)> 0){
                                      
                                    while($lastRegisteredRow = mysqli_fetch_array($lastRegisteredResult)){
                                       $lastRegisteredShow .= '
                                            <li class="list-group-item">'.$lastRegisteredCount++.'. '.$lastRegisteredRow['studentname'].' <span class="badge badge-primary badge-pill">'.$lastRegisteredRow['studentform'].'</span>
                                            </li>
                                            
                                        ';
                                    }
                                 }else{
                                    $lastRegisteredShow .= '
                                         <li class="list-group-item" style="color:red"><marquee>'.mysqli_error($conn).'</marquee></li>
                                    ';
                                 }
                                 $lastRegisteredShow .= '
                                    </ul>
                                 ';
                                 echo $lastRegisteredShow;
                            ?>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4">

                        <!--Card content-->
                        <div class="card-body">
                            <!-- ==================== COUNT MALE AND FEMALE ===================== -->
                            <?php 
                                $maleRegisteredShow = '';
                                $maleRegisteredSQL = "SELECT COUNT(*) AS male FROM student_registration WHERE studentgender = 'M'";
                                $maleRegisteredResult = mysqli_query($conn, $maleRegisteredSQL);
                                
                                 if(mysqli_num_rows($maleRegisteredResult)> 0){
                                      
                                    while($maleRegisteredRow = mysqli_fetch_array($maleRegisteredResult)){
                                       $maleRegisteredShow = $maleRegisteredRow['male'];
                                       
                                    }
                                 }else{
                                    $maleRegisteredShow = 0;
                                    
                                 }

                                 $femaleRegisteredShow = '';
                                $femaleRegisteredSQL = "SELECT COUNT(*) AS female FROM student_registration WHERE studentgender = 'F'";
                                $femaleRegisteredResult = mysqli_query($conn, $femaleRegisteredSQL);
                                
                                 if(mysqli_num_rows($femaleRegisteredResult)> 0){
                                      
                                    while($femaleRegisteredRow = mysqli_fetch_array($femaleRegisteredResult)){
                                       $femaleRegisteredShow = $femaleRegisteredRow['female'];
                                       
                                    }
                                 }else{
                                    $femaleRegisteredShow = 0;
                                    
                                 }
                            ?>
                            <!-- List group links -->
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action waves-effect">Males
                                    <span class="badge badge-success badge-pill pull-right">
                                        <?php echo $maleRegisteredShow;?> %
                                        <i class="fas fa-arrow-up ml-1"></i>
                                    </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">Female
                                    <span
                                        class="badge badge-danger badge-pill pull-right"><?php echo $femaleRegisteredShow;?>
                                        %
                                        <i class="fas fa-arrow-down ml-1"></i>
                                    </span>
                                </a><br>
                                <p align="center" style="color:red">
                                    <strong>
                                        <marquee>Total Health Status</marquee>
                                    </strong>
                                </p>
                                <!-- =================================== HEALTHY CONDITION, PARTIAL AND BAD CONDITION ======================= -->
                                <?php 
                                $healthyRegisteredShow = '';
                                $healthyRegisteredSQL = "SELECT COUNT(*) AS healthy FROM student_registration WHERE studenthealth = 'healthy'";
                                $healthyRegisteredResult = mysqli_query($conn, $healthyRegisteredSQL);
                                
                                 if(mysqli_num_rows($healthyRegisteredResult)> 0){
                                      
                                    while($healthyRegisteredRow = mysqli_fetch_array($healthyRegisteredResult)){
                                       $healthyRegisteredShow = $healthyRegisteredRow['healthy'];
                                       
                                    }
                                 }else{
                                    $healthyRegisteredShow = 0;
                                    
                                 }

                                 $partialRegisteredShow = '';
                                $partialRegisteredSQL = "SELECT COUNT(*) AS partial FROM student_registration WHERE studenthealth = 'partial'";
                                $partialRegisteredResult = mysqli_query($conn, $partialRegisteredSQL);
                                
                                 if(mysqli_num_rows($partialRegisteredResult)> 0){
                                      
                                    while($partialRegisteredRow = mysqli_fetch_array($partialRegisteredResult)){
                                       $partialRegisteredShow = $partialRegisteredRow['partial'];
                                       
                                    }
                                 }else{
                                    $partialRegisteredShow = 0;
                                    
                                 }

                                  $badRegisteredShow = '';
                                $badRegisteredSQL = "SELECT COUNT(*) AS bad FROM student_registration WHERE studenthealth = 'bad'";
                                $badRegisteredResult = mysqli_query($conn, $badRegisteredSQL);
                                
                                 if(mysqli_num_rows($badRegisteredResult)> 0){
                                      
                                    while($badRegisteredRow = mysqli_fetch_array($badRegisteredResult)){
                                       $badRegisteredShow = $badRegisteredRow['bad'];
                                       
                                    }
                                 }else{
                                    $badRegisteredShow = 0;
                                    
                                 }
                            ?>
                                <a class="list-group-item list-group-item-action waves-effect"
                                    style="text-align:center">
                                    <span
                                        class="badge badge-primary badge-pill pull-right"><?php echo $healthyRegisteredShow; ?></span><br>
                                    Healthy Student(s)
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect"
                                    style="text-align:center">
                                    <span
                                        class="badge badge-primary badge-pill pull-right"><?php echo $partialRegisteredShow; ?></span><br>
                                    Partial Health Condition
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect"
                                    style="text-align:center">
                                    <span
                                        class="badge badge-primary badge-pill pull-right"><?php echo $badRegisteredShow; ?></span><br>
                                    Bad Health Condition
                                </a>
                            </div>
                            <!-- List group links -->

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
    <?php require_once('inc/headers/jsscripts.php'); ?>


</body>

</html>
<script>
$('document').ready(function() {

    // $('.toast').toast({
    //     animation: false,
    //     autohide: false,
    //     delay: 15000
    // });
    // $('.toast').toast('show');

    $('#submitBtn').attr("disabled", true);

    $('#student_Image').change(function() {
        if ($('#student_Image').val() == null) {
            $('#submitBtn').attr("disabled", true);
        } else {
            if ($('#student_ID').val() === '') {
                $('#infoStudentID').text("Sorry Field can't be empty");
                $('#student_ID').css({
                    'border': '2px solid red'
                })
                $('#infoStudentID').css({
                    'color': 'red'
                });

            } else if ($('#student_name').val() === '') {
                $('#infoStudentName').text("Sorry Field can't be empty");
                $('#student_name').css({
                    'border': '2px solid red'
                })
                $('#infoStudentName').css({
                    'color': 'red'
                });

            } else if ($('#student_gender').val() === 'Choose...') {
                $('#infoStudentGender').text("Sorry Field can't be empty");
                $('#student_gender').css({
                    'border': '2px solid red'
                })
                $('#infoStudentGender').css({
                    'color': 'red'
                });

            } else if ($('#student_form').val() === 'Choose...') {
                $('#infoStudentForm').text("Sorry Field can't be empty");
                $('#student_form').css({
                    'border': '2px solid red'
                })
                $('#infoStudentForm').css({
                    'color': 'red'
                });

            } else if ($('#student_health').val() === 'Choose...') {

                $('#infoStudentHealth').text("Sorry Field can't be empty");
                $('#student_health').css({
                    'border': '2px solid red'
                })
                $('#infoStudentHealth').css({
                    'color': 'red'
                });

            } else if ($('#student_program').val() === '') {

                $('#infoStudentProgram').text("Sorry Field can't be empty");
                $('#student_program').css({
                    'border': '2px solid red'
                })
                $('#infoStudentProgram').css({
                    'color': 'red'
                });

            } else if ($('#parent_name').val() === '') {

                $('#infoStudentParentName').text("Sorry Field can't be empty");
                $('#parent_name').css({
                    'border': '2px solid red'
                })
                $('#infoStudentParentName').css({
                    'color': 'red'
                });

            } else if ($('#parent_contact').val() === '') {

                $('#infoStudentParentcontact').text("Sorry Field can't be empty");
                $('#parent_contact').css({
                    'border': '2px solid red'
                })
                $('#infoStudentParentcontact').css({
                    'color': 'red'
                });

            } else if ($('#parent_location').val() === '') {

                $('#infoStudentParentLocation').text("Sorry Field can't be empty");
                $('#parent_location').css({
                    'border': '2px solid red'
                })
                $('#infoStudentParentLocation').css({
                    'color': 'red'
                });

            } else if ($('#registration_date').val() === '') {

                $('#infoStudentDate').text("Sorry Field can't be empty");
                $('#registration_date').css({
                    'border': '2px solid red'
                })
                $('#infoStudentDate').css({
                    'color': 'red'
                });

            }
            $('#submitBtn').attr("disabled", false);
        }
    });

    $('#submitBtn').click(function() {
        if ($('#student_ID').val() === '') {
            $('#infoStudentID').text("Sorry Field can't be empty");
            $('#student_ID').css({
                'border': '2px solid red'
            })
            $('#infoStudentID').css({
                'color': 'red'
            });

        } else if ($('#student_name').val() === '') {
            $('#infoStudentName').text("Sorry Field can't be empty");
            $('#student_name').css({
                'border': '2px solid red'
            })
            $('#infoStudentName').css({
                'color': 'red'
            });

        } else if ($('#student_gender').val() === 'Choose...') {
            $('#infoStudentGender').text("Sorry Field can't be empty");
            $('#student_gender').css({
                'border': '2px solid red'
            })
            $('#infoStudentGender').css({
                'color': 'red'
            });

        } else if ($('#student_form').val() === 'Choose...') {
            $('#infoStudentForm').text("Sorry Field can't be empty");
            $('#student_form').css({
                'border': '2px solid red'
            })
            $('#infoStudentForm').css({
                'color': 'red'
            });

        } else if ($('#student_health').val() === 'Choose...') {

            $('#infoStudentHealth').text("Sorry Field can't be empty");
            $('#student_health').css({
                'border': '2px solid red'
            })
            $('#infoStudentHealth').css({
                'color': 'red'
            });

        } else if ($('#student_program').val() === '') {

            $('#infoStudentProgram').text("Sorry Field can't be empty");
            $('#student_program').css({
                'border': '2px solid red'
            })
            $('#infoStudentProgram').css({
                'color': 'red'
            });

        } else if ($('#parent_name').val() === '') {

            $('#infoStudentParentName').text("Sorry Field can't be empty");
            $('#parent_name').css({
                'border': '2px solid red'
            })
            $('#infoStudentParentName').css({
                'color': 'red'
            });

        } else if ($('#parent_contact').val() === '') {

            $('#infoStudentParentcontact').text("Sorry Field can't be empty");
            $('#parent_contact').css({
                'border': '2px solid red'
            })
            $('#infoStudentParentcontact').css({
                'color': 'red'
            });

        } else if ($('#parent_location').val() === '') {

            $('#infoStudentParentLocation').text("Sorry Field can't be empty");
            $('#parent_location').css({
                'border': '2px solid red'
            })
            $('#infoStudentParentLocation').css({
                'color': 'red'
            });

        } else if ($('#registration_date').val() === '') {

            $('#infoStudentDate').text("Sorry Field can't be empty");
            $('#registration_date').css({
                'border': '2px solid red'
            })
            $('#infoStudentDate').css({
                'color': 'red'
            });

        } else {
            setTimeout(() => {
                location.reload();
            }, 5000);
        }
    })

    $(document).on('click', '.close', function() {
        window.location = "student_registration.php";
    })

})
</script>