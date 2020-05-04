<?php 
    require_once('./inc/scripts/exeatdb.php');
    require_once('./inc/headers/dateTime.php');
    $userRegShow = '';

    if(isset($_POST['submitBtn'])){
      
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $userpassword = mysqli_real_escape_string($conn, $_POST['userpassword']);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $accounttype = mysqli_real_escape_string($conn, $_POST['accounttype']);
        $registration_date = mysqli_real_escape_string($conn, $_POST['registration_date']);
        
        $image =$_FILES['user_image']['name'];
        $target = "img/".basename($_FILES['user_image']['name']);

        $userRegistrationSQL = "INSERT INTO useraccount VALUES('','$user_name','$userpassword','$firstName','$middlename','$lastname','$contact','$location','$registration_date','$image','$accounttype')";

        $userRegistrationResult = mysqli_query($conn, $userRegistrationSQL);
        move_uploaded_file($_FILES['user_image']['tmp_name'], $target);
        if($userRegistrationResult){
            $userRegShow .= '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>'.$user_name.'</strong> ACCOUNT HAS BEEN CREATED.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
           
        }else{
            $userRegShow .= '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>'.mysqli_error($conn).'</strong> FAIL TRY AGAIN
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
                <a href="dashboard.php" class="list-group-item  waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>Dashboard
                </a>
                <a href="user_registration.php" class="list-group-item active list-group-item-action waves-effect">
                    <i class="fas fa-user mr-3"></i>User Registration</a>
                <a href="user_management.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-table mr-3"></i>Manage User</a>
                <a href="user_profile.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-map mr-3"></i>User Profile</a>

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
                        <span>User Registration</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->
            <?php echo $userRegShow; ?>
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-9 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <form method="POST" action="<?php $_PHP_SELF; ?>" enctype="multipart/form-data">
                                <legend align="center">Register User</legend>

                                <div class="form-group row">
                                    <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="user_name" name="user_name">
                                        <small id="infousername" class="form-text" style="color:red"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="userpassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="userpassword"
                                            name="userpassword">
                                        <small id="infopassword" class="form-text" style="color:red"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="firstName" name="firstName">
                                        <small id="infofirstname" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="middlename" class="col-sm-2 col-form-label">Middle Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="middlename" name="middlename">
                                        <small id="infomiddlename" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lastname" name="lastname">
                                        <small id="infocontact" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                                    <div class="col-sm-10">
                                        <input type="Number" class="form-control" id="contact" name="contact">
                                        <small id="infouserDate" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="location" name="location">
                                        <small id="infolocation" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="registration_date" class="col-sm-2 col-form-label">Registration
                                        Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="registration_date"
                                            name="registration_date">
                                        <small id="infouserDate" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="accounttype" class="col-md-2 col-form-label">Account Type</label>
                                    <div class="col-md-10">

                                        <select class="custom-select mr-md-2" id="accounttype" name="accounttype">
                                            <option value="staff">Staff</option>
                                            <option value="administrator">Administrator</option>

                                        </select>
                                        <small id="infoStudentName" class="form-text"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_image" class="col-sm-2 col-form-label">user Image</label>
                                    <div class="custom-file col-sm-10 col-md-10">
                                        <input type="file" class="custom-file-input" id="user_image" name="user_image">
                                        <label class="custom-file-label" for="user_image">Browse Image</label>
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
                            Last (5) User Registered
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <?php 
                                $lastRegisteredShow = '';
                                $lastRegisteredSQL = "SELECT * FROM useraccount ORDER BY registration_date DESC LIMIT 5";
                                $lastRegisteredResult = mysqli_query($conn, $lastRegisteredSQL);
                                $lastRegisteredCount = 1;
                                $lastRegisteredShow = '<ul class="list-group list-group-flush">';
                                 if(mysqli_num_rows($lastRegisteredResult)> 0){
                                      
                                    while($lastRegisteredRow = mysqli_fetch_array($lastRegisteredResult)){
                                       $lastRegisteredShow .= '
                                            <li class="list-group-item">'.$lastRegisteredCount++.'. '.$lastRegisteredRow['username'].' <span style="text-align:center" class="badge badge-primary badge-pill">'.$lastRegisteredRow['contact'].'</span>
                                            </li>
                                            
                                        ';
                                    }
                                 }else{
                                    $lastRegisteredShow .= '
                                         <li class="list-group-item" style="color:red"><marquee>NO user REGISTERED YET'.mysqli_error($conn).'</marquee></li>
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

    $('#user_image').change(function() {
        if ($('#user_image').val() == 'Browse Image') {
            $('#submitBtn').attr("disabled", true);
        } else {
            if ($('#user_ID').val() === '') {
                $('#submitBtn').attr("disabled", true);
                $('#infouserID').text("Sorry Field can't be empty");
                $('#user_ID').css({
                    'border': '2px solid red'
                });
                $('#infouserID').css({
                    'color': 'red'
                });

            } else if ($('#user_name').val() === '') {
                $('#infouserName').text("Sorry Field can't be empty");
                $('#user_name').css({
                    'border': '2px solid red'
                })
                $('#infouserName').css({
                    'color': 'red'
                });

            } else if ($('#user_position').val() === '') {

                $('#infouserposition').text("Sorry Field can't be empty");
                $('#user_position').css({
                    'border': '2px solid red'
                })
                $('#infouserposition').css({
                    'color': 'red'
                });

            } else if ($('#registration_date').val() === '') {

                $('#infouserDate').text("Sorry Field can't be empty");
                $('#registration_date').css({
                    'border': '2px solid red'
                })
                $('#infouserDate').css({
                    'color': 'red'
                });

            }
            $('#submitBtn').attr("disabled", false);
        }
    });

    $('#submitBtn').click(function() {
        if ($('#user_ID').val() === '') {
            $('#infouserID').text("Sorry Field can't be empty");
            $('#user_ID').css({
                'border': '2px solid red'
            })
            $('#infouserID').css({
                'color': 'red'
            });

        } else if ($('#user_name').val() === '') {
            $('#infouserName').text("Sorry Field can't be empty");
            $('#user_name').css({
                'border': '2px solid red'
            })
            $('#infouserName').css({
                'color': 'red'
            });

        } else if ($('#user_position').val() === '') {

            $('#infouserposition').text("Sorry Field can't be empty");
            $('#user_position').css({
                'border': '2px solid red'
            })
            $('#infouserposition').css({
                'color': 'red'
            });

        }
    })

    $(document).on('click', '.close', function() {
        window.location = "user_registration.php";
    })

})
</script>