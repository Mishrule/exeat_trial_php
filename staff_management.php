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
                <a href="staff_registration.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-user mr-3"></i>Staff Registration</a>
                <a href="staff_management.php" class="list-group-item active list-group-item-action waves-effect">
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
                        <a href="staff_registration.php">Staff Registration</a>
                        <span>/</span>
                        <span>Staff Management</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <h4 style="text-align:center;">REGISTERED STAFF</h4>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-9 ">
                                    <form method="POST">
                                        <div style="text-align:center;">SEARCH</div>
                                        <input type="text" id="manageStaffSearch" class="form-control"
                                            name="manageStaffSearch" placeholder="Search by Name or Student ID" />
                                    </form>
                                </div>
                                <div class="col-sm-3">
                                    <div style="text-align:center;">LIMIT</div>
                                    <select class="custom-select mr-sm-2" id="staff_manage_limit"
                                        name="staff_manage_limit">

                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="100000">All</option>

                                    </select>
                                    <small id="infoStaffForm" class="form-text"></small>
                                </div>
                            </div>
                            <hr>
                            <!-- Table  -->
                            <div id="manageStaffRegistration"></div>

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
    showDefault();

    function showDefault() {
        var select = "show";
        var changeLimit = $('#staff_manage_limit').val()
        $.ajax({
            url: 'inc/scripts/staffRegistrationScript.php',
            method: 'POST',
            data: {
                select,
                changeLimit
            },
            success: function(data) {
                $('#manageStaffRegistration').html(data);
            }
        })
    }
    //==========================================| LIMIT
    $('#staff_manage_limit').change(function() {
        var staff_manage_lim = $('#staff_manage_limit').val();
        $.ajax({
            url: 'inc/scripts/staffRegistrationScript.php',
            method: 'POST',
            data: {
                staff_manage_lim
            },
            success: function(data) {
                $('#manageStaffRegistration').html(data);
            }
        })
    })
    //===============================================|SEARCH TEXT
    $('#manageStaffSearch').keyup(function() {
        // var student_manage_lim = $('#staff_manage_limit').val();
        var keysearch = $('#manageStaffSearch').val();
        $.ajax({
            url: 'inc/scripts/staffRegistrationScript.php',
            method: 'POST',
            data: {
                keysearch
            },
            success: function(data) {
                $('#manageStaffRegistration').html(data);
            }
        })
    })
})
</script>