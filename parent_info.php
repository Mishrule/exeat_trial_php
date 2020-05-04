<?php require_once('inc/scripts/exeatdb.php'); ?>
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
                <a href="parent_info.php" class="list-group-item list-group-item-action active waves-effect">
                    <i class="fas fa-user mr-3"></i>Parent_Info</a>

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
                        <span>Information</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-9 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <div id="parentshow">
                                <?php 
                                $manageUserFetchShow = '';
                                $manageUserFetchSQL = "SELECT * FROM student_registration ORDER BY registrationdate DESC LIMIT 10";
                                $manageUserFetchResult = mysqli_query($conn, $manageUserFetchSQL);
                                $manageUserFetchShow = '
                                <table class="table table-hover">
                                    <thead class="blue lighten-4">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Parent Name</th>
                                            <th>Student Name</th>
                                            <th>Parent Contact</th>
                                            <th>Parent Location</th>
                                            
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
                                            <td>'.$manageUserFetchRow['parentname'].'</td>
                                            <td>'.$manageUserFetchRow['studentname'].'</td>
                                            <td>'.$manageUserFetchRow['parentcontact'].'</td>
                                            <td>'.$manageUserFetchRow['parentlocation'].'</td>
                                            
                                        </tr>
                                        ';
                                        }
                                        }else{
                                        $manageUserFetchShow .= '
                                        <tr>
                                            <td colspan="5">
                                                <marquee><span style="color:red">NO PARENT/STUDENT RECORDS FOUND</span></marquee>
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
                            SETTINGS
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <div class="col-md-12">
                                <div style="text-align:center;">LIMIT</div>
                                <select class="custom-select mr-sm-2" id="parent_limit" name="parent_limit">

                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="100000">All</option>

                                </select>
                                <small id="infoStaffForm" class="form-text"></small>
                            </div>
                            <br>
                            <input type="text" class="form-control" id="parentSearch" name="parentSearch"
                                placeholder="Search Student/Parent Name" />

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
    $('#parent_limit').change(function() {
        var parentlimit = $('#parent_limit').val();
        $.ajax({
            url: 'inc/scripts/studentRegistrationScript.php',
            method: 'POST',
            data: {
                parentlimit
            },
            success: function(data) {
                $('#parentshow').html(data);
            }
        })
    })
    // =========================|SEARCH
    $('#parentSearch').keyup(function() {
        var parentSearch = $('#parentSearch').val();
        $.ajax({
            url: 'inc/scripts/studentRegistrationScript.php',
            method: 'POST',
            data: {
                parentSearch
            },
            success: function(data) {
                $('#parentshow').html(data);
            }
        })
    })
});
</script>