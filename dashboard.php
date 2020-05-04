<?php require_once('inc/scripts/exeatdb.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/headers/head.php'); ?>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php require_once('inc/headers/nav.php');?>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

             <?php require_once('inc/headers/brand.php'); ?>

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item active waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>Dashboard
                </a>
                <a href="student_registration.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-user mr-3"></i>Student</a>
                <a href="staff_registration.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-table mr-3"></i>Staff</a>
                <a href="parent_info.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-map mr-3"></i>Parents</a>
                <a href="assign_exeat.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-money-bill-alt mr-3"></i>Exeat</a>
                <a href="user_registration.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-money-bill-alt mr-3"></i>Users</a>
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

                        <span>Dashboard</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-3 mb-4">

                    <!--Card-->
                    <div class="card">
                        <div class="card-header text-white bg-success text-center"><strong>TOTAL REGISTERED
                                STUDENTS</strong></div>
                        <!--Card content-->
                        <div class="card-body">
                            <?php 
                                $totalStudentShow = 0;
                                $totalStudentSQL = "SELECT COUNT(*) AS TStudent FROM student_registration";
                                $totalStudentResult = mysqli_query($conn, $totalStudentSQL);
                                if(mysqli_num_rows($totalStudentResult)>0){
                                    while($totalStudentRow = mysqli_fetch_array($totalStudentResult)){
                                        $totalStudentShow = $totalStudentRow['TStudent'];
                                    }
                                }else{
                                    $totalStudentShow = 0;
                                }
                            ?>
                            <h2 class="text-center"><?php echo $totalStudentShow; ?></h2>
                        </div>

                    </div>
                    <!--/.Card-->
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 mb-4">

                    <!--Card-->
                    <div class="card">
                        <div class="card-header text-white bg-success text-center"><strong>TOTAL STUDENTS ON
                                EXEAT</strong></div>
                        <!--Card content-->
                        <div class="card-body">

                            <?php 
                                $totalStudentExeatShow = 0;
                                $totalStudentExeatSQL = "SELECT DISTINCT COUNT(s_id) AS TEStudent FROM exeat WHERE status_ = 'Not Returned'";
                                $totalStudentExeatResult = mysqli_query($conn, $totalStudentExeatSQL);
                                if(mysqli_num_rows($totalStudentExeatResult)>0){
                                    while($totalStudentExeatRow = mysqli_fetch_array($totalStudentExeatResult)){
                                        $totalStudentExeatShow = $totalStudentExeatRow['TEStudent'];
                                    }
                                }else{
                                    $totalStudentExeatShow = 0;
                                }
                            ?>
                            <h2 class="text-center"><?php echo $totalStudentExeatShow; ?></h2>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 mb-4">

                    <!--Card-->
                    <div class="card">
                        <div class="card-header text-white bg-success text-center"><strong>NO. OF STUDENTS RETURNED FROM
                                EXEAT</strong>
                        </div>
                        <!--Card content-->
                        <div class="card-body">

                            <?php 
                                $totalStudentRetExeatShow = 0;
                                $totalStudentRetExeatSQL = "SELECT DISTINCT COUNT(s_id) AS TEStudent FROM exeat WHERE status_ = 'Return'";
                                $totalStudentRetExeatResult = mysqli_query($conn, $totalStudentRetExeatSQL);
                                if(mysqli_num_rows($totalStudentRetExeatResult)>0){
                                    while($totalStudentRetExeatRow = mysqli_fetch_array($totalStudentRetExeatResult)){
                                        $totalStudentRetExeatShow = $totalStudentRetExeatRow['TEStudent'];
                                    }
                                }else{
                                    $totalStudentRetExeatShow = 0;
                                }
                            ?>
                            <h2 class="text-center"><?php echo $totalStudentRetExeatShow; ?></h2>

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
                        <div class="card-header text-white bg-success text-center">
                            <strong>TOTAL REGISTERED STAFF</strong>
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <?php 
                                $totalStaffShow = 0;
                                $totalStaffSQL = "SELECT COUNT(*) AS TStudent FROM staff_registration";
                                $totalStaffResult = mysqli_query($conn, $totalStaffSQL);
                                if(mysqli_num_rows($totalStaffResult)>0){
                                    while($totalStaffRow = mysqli_fetch_array($totalStaffResult)){
                                        $totalStaffShow = $totalStaffRow['TStudent'];
                                    }
                                }else{
                                    $totalStaffShow = 0;
                                }
                            ?>
                            <h2 class="text-center"><?php echo $totalStaffShow; ?></h2>

                        </div>

                    </div>
                    <!--/.Card-->
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <?php 
                                $totalStudentShow = 0;
                                $totalStudentSQL = "SELECT COUNT(*) AS usercount FROM useraccount";
                                $totalStudentResult = mysqli_query($conn, $totalStudentSQL);
                                if(mysqli_num_rows($totalStudentResult)>0){
                                    while($totalStudentRow = mysqli_fetch_array($totalStudentResult)){
                                        $totalStudentShow = $totalStudentRow['usercount'];
                                    }
                                }else{
                                    $totalStudentShow = 0;
                                }
                            ?>

                    <!--Card-->
                    <div class="card">
                        <div class="card-header text-white bg-success text-center"><strong>TOTAL REGISTERED
                                STAFF <span>(<?php echo $totalStudentShow; ?>)</span></strong></div>
                        <!--Card content-->
                        <div class="card-body">
                            <?php 
                                $totalStudentShow = 0;
                                $totalStudentSQL = "SELECT COUNT(*) AS staff FROM useraccount";
                                $totalStudentResult = mysqli_query($conn, $totalStudentSQL);
                                if(mysqli_num_rows($totalStudentResult)>0){
                                    while($totalStudentRow = mysqli_fetch_array($totalStudentResult)){
                                        $totalStudentShow = $totalStudentRow['staff'];
                                    }
                                }else{
                                    $totalStudentShow = 0;
                                }
                            ?>
                            <h2 class="text-center"></h2>
                            <?php 
                                $manageUserFetchShow = '';
                                $manageUserFetchSQL = "SELECT * FROM useraccount ORDER BY registration_date DESC";
                                $manageUserFetchResult = mysqli_query($conn, $manageUserFetchSQL);
                                $manageUserFetchShow = '
                                <table class="table table-hover">
                                    <thead class="blue lighten-4">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                            <th>Location</th>
                                            <th>Registration Date</th>
                                            <th>Account Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ';
                                        $manageUserFetchCount = 1;
                                        if(mysqli_num_rows($manageUserFetchResult)>0){
                                        while($manageUserFetchRow = mysqli_fetch_array($manageUserFetchResult)){
                                        $manageUserFetchShow .= '
                                        <tr>
                                            <th scope="row">'.$manageUserFetchCount++.'</th>
                                            <td>'.$manageUserFetchRow['username'].'</td>
                                            <td>'.$manageUserFetchRow['firstname'].'</td>
                                            <td>'.$manageUserFetchRow['middlename'].'</td>
                                            <td>'.$manageUserFetchRow['lastname'].'</td>
                                            <td>'.$manageUserFetchRow['contact'].'</td>
                                            <td>'.$manageUserFetchRow['location'].'</td>
                                            <td>'.$manageUserFetchRow['registration_date'].'</td>
                                            <td>'.$manageUserFetchRow['account_type'].'</td>
                                        </tr>
                                        ';
                                        }
                                        }else{
                                        $manageUserFetchShow .= '
                                        <tr>
                                            <td colspan="9">
                                                <marquee><span style="color:red">NO USER RECORDS FOUND</span></marquee>
                                            </td>
                                        </tr>
                                        ';
                                        }
                                        $manageUserFetchShow .= '
                                        </body>
                                        </table>
                                        ';
                                        echo $manageUserFetchShow;

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
    <?php require_once('inc/headers/footer.php');?>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <?php require_once('inc/headers/jsscripts.php');?>


</body>

</html>