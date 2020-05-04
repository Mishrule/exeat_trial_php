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
                <a href="user_registration.php" class="list-group-item  list-group-item-action waves-effect">
                    <i class="fas fa-user mr-3"></i>User Registration</a>
                <a href="user_management.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-table mr-3"></i>Manage User</a>
                <a href="user_profile.php" class="list-group-item active list-group-item-action waves-effect">
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
                        <a href="user_registration.php">User Registration</a>
                        <span>/</span>
                        <a href="user_management.php">User Management</a>
                        <span>/</span>
                        <span>User Profile</span>
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
                        <div class="card-header">
                            <div class="text-center">DISPLAY USER INFORMATION</div>
                        </div>
                        <!--Card content-->
                        <div class="card-body">
                            <div id="searchIndividual"></div>
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
                            Search by Username
                        </div>

                        <!--Card content-->
                        <div class="card-body">
                            <label for="searchuser_ID" class="info"></label>
                            <input type="text" class="form-control" id="searchuser_ID" name="searchuser_ID"
                                placeholder="Search by Username" /><br>
                            <button type="button" id="searchuser_NameBTN" name="searchuser_NameBTN"
                                value="searchuser_NameBTN" class="btn btn-primary btn-block"><i
                                    class="fa fa-search"></i> Search</button>

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
    $('#searchuser_NameBTN').click(function() {
        var searchuser_ID = $('#searchuser_ID').val();
        var searchuser_NameBTN = $('#searchuser_NameBTN').val();
        $.ajax({
            url: 'inc/scripts/userRegistrationScript.php',
            method: 'POST',
            data: {
                searchuser_ID,
                searchuser_NameBTN
            },
            success: function(data) {
                $('#searchIndividual').html(data);
            }
        })
    })
})
</script>