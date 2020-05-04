<?php 
    require_once('./inc/scripts/exeatdb.php');
    require_once('./inc/headers/dateTime.php');
    $staffRegShow = '';

    if(isset($_POST['submitBtn'])){
        
        $staffID = mysqli_real_escape_string($conn, $_POST['staff_ID']);
        $staffname = mysqli_real_escape_string($conn, $_POST['staff_name']);
        $staffposition = mysqli_real_escape_string($conn, $_POST['staff_position']);
        $staff_contact = mysqli_real_escape_string($conn, $_POST['staff_contact']);
        // $staffhealth = mysqli_real_escape_string($conn, $_POST['staff_health']);
        // $staffprogram = mysqli_real_escape_string($conn, $_POST['staff_program']);
        $registrationdate = mysqli_real_escape_string($conn, $_POST['registration_date']);
        
        $image =$_FILES['staff_image']['name'];
        $target = "img/".basename($_FILES['staff_image']['name']);

        $staffRegistrationSQL = "INSERT INTO staff_registration VALUES('','$staffID','$staffname','$staffposition','$staff_contact','$image','$registrationdate')";

        $staffRegistrationResult = mysqli_query($conn, $staffRegistrationSQL);
        move_uploaded_file($_FILES['staff_image']['tmp_name'], $target);
        if($staffRegistrationResult){
            $staffRegShow .= '
                <!-- Flexbox container for aligning the toasts -->
                    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;">

                    <!-- Then put toasts within -->
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
                        <div class="toast-header">
                        <strong class="mr-auto">Success</strong>
                        <small>'.$dateTime.'</small>
                        <button type="button" class="ml-12 mb-12 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="toast-body">
                            '.$staffname.' is registered successfully.
                        </div>
                    </div>
                    </div>
            ';
           
        }else{
            $staffRegShow .= '
                <!-- Flexbox container for aligning the toasts -->
                    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;">

                    <!-- Then put toasts within -->
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
                        <div class="toast-header">
                        <strong class="mr-auto">FAILED</strong>
                        <small>'.$dateTime.'</small>
                        <button type="button" class="ml-12 mb-12 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="toast-body">
                            '.mysqli_error($conn).' 
                        </div>
                    </div>
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
                <a href="dashboard.php" class="list-group-item  waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>Dashboard
                </a>
                <a href="staff_registration.php" class="list-group-item active list-group-item-action waves-effect">
                    <i class="fas fa-user mr-3"></i>Staff Registration</a>
                <a href="staff_management.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-table mr-3"></i>Manage Staff</a>
                <a href="staff_profile.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-map mr-3"></i>Staff Profile</a>

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
                        <span>Staff Registration</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->
            <?php echo $staffRegShow; ?>
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-9 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <form method="POST" action="<?php $_PHP_SELF; ?>" enctype="multipart/form-data">
                                <legend align="center">Register Staff</legend>

                                <div class="form-group row">
                                    <label for="staff_ID" class="col-sm-2 col-form-label">Staff ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staff_ID" name="staff_ID">
                                        <small id="infostaffID" class="form-text" style="color:red"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="staff_name" class="col-sm-2 col-form-label">Staff Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staff_name" name="staff_name">
                                        <small id="infostaffName" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="staff_position" class="col-sm-2 col-form-label">Staff Position</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staff_position"
                                            name="staff_position">
                                        <small id="infostaffposition" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="staff_contact" class="col-sm-2 col-form-label">Staff Contact</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staff_contact" name="staff_contact">
                                        <small id="infostaffcontact" class="form-text"></small>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="registration_date" class="col-sm-2 col-form-label">Registration
                                        Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="registration_date"
                                            name="registration_date">
                                        <small id="infostaffDate" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="staff_image" class="col-sm-2 col-form-label">staff Image</label>
                                    <div class="custom-file col-sm-10">
                                        <input type="file" class="custom-file-input" id="staff_image"
                                            name="staff_image">
                                        <label class="custom-file-label" for="staff_image">Browse Image</label>
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
                                $lastRegisteredSQL = "SELECT * FROM staff_registration ORDER BY registration_date DESC LIMIT 5";
                                $lastRegisteredResult = mysqli_query($conn, $lastRegisteredSQL);
                                $lastRegisteredCount = 1;
                                $lastRegisteredShow = '<ul class="list-group list-group-flush">';
                                 if(mysqli_num_rows($lastRegisteredResult)> 0){
                                      
                                    while($lastRegisteredRow = mysqli_fetch_array($lastRegisteredResult)){
                                       $lastRegisteredShow .= '
                                            <li class="list-group-item">'.$lastRegisteredCount++.'. '.$lastRegisteredRow['staff_name'].' <span style="text-align:center" class="badge badge-primary badge-pill">'.$lastRegisteredRow['staff_position'].'</span>
                                            </li>
                                            
                                        ';
                                    }
                                 }else{
                                    $lastRegisteredShow .= '
                                         <li class="list-group-item" style="color:red"><marquee>NO STAFF REGISTERED YET'.mysqli_error($conn).'</marquee></li>
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
$('document').ready(function() {

    $('.toast').toast({
        animation: false,
        autohide: false,
        delay: 15000
    });
    $('.toast').toast('show');

    $('#submitBtn').attr("disabled", true);

    $('#staff_image').change(function() {
        if ($('#staff_image').val() == 'Browse Image') {
            $('#submitBtn').attr("disabled", true);
        } else {
            if ($('#staff_ID').val() === '') {
                $('#submitBtn').attr("disabled", true);
                $('#infostaffID').text("Sorry Field can't be empty");
                $('#staff_ID').css({
                    'border': '2px solid red'
                });
                $('#infostaffID').css({
                    'color': 'red'
                });

            } else if ($('#staff_name').val() === '') {
                $('#infostaffName').text("Sorry Field can't be empty");
                $('#staff_name').css({
                    'border': '2px solid red'
                })
                $('#infostaffName').css({
                    'color': 'red'
                });

            } else if ($('#staff_position').val() === '') {

                $('#infostaffposition').text("Sorry Field can't be empty");
                $('#staff_position').css({
                    'border': '2px solid red'
                })
                $('#infostaffposition').css({
                    'color': 'red'
                });

            } else if ($('#registration_date').val() === '') {

                $('#infostaffDate').text("Sorry Field can't be empty");
                $('#registration_date').css({
                    'border': '2px solid red'
                })
                $('#infostaffDate').css({
                    'color': 'red'
                });

            }
            $('#submitBtn').attr("disabled", false);
        }
    });

    $('#submitBtn').click(function() {
        if ($('#staff_ID').val() === '') {
            $('#infostaffID').text("Sorry Field can't be empty");
            $('#staff_ID').css({
                'border': '2px solid red'
            })
            $('#infostaffID').css({
                'color': 'red'
            });

        } else if ($('#staff_name').val() === '') {
            $('#infostaffName').text("Sorry Field can't be empty");
            $('#staff_name').css({
                'border': '2px solid red'
            })
            $('#infostaffName').css({
                'color': 'red'
            });

        } else if ($('#staff_position').val() === '') {

            $('#infostaffposition').text("Sorry Field can't be empty");
            $('#staff_position').css({
                'border': '2px solid red'
            })
            $('#infostaffposition').css({
                'color': 'red'
            });

        }
    })

    $(document).on('click', '.close', function() {
        window.location = "staff_registration.php";
    })

})
</script>