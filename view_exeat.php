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
                <a href="assign_exeat.php" class="list-group-item list-group-item-action  waves-effect">
                    <i class="fas fa-user mr-3"></i>Assign Exeat</a>
                <a href="manage_exeat.php" class="list-group-item list-group-item-action  waves-effect">
                    <i class="fas fa-table mr-3"></i>Manage Exeat</a>
                <a href="view_exeat.php" class="list-group-item list-group-item-action active waves-effect">
                    <i class="fas fa-map mr-3"></i>View Exeat</a>

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
                        <a href="assign_exeat.php">Assign Exeat</a>
                        <span>/</span>
                        <a href="manage_exeat.php">Manage Exeat</a>
                        <span>/</span>
                        <span>View Exeat</span>
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

                            <div class="row">
                                <div class="col-md-5">

                                    <div class="form-group row">
                                        <label for="search_exeat_student" class="col-md-3 col-form-label">Search
                                            Student</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="search_exeat_student"
                                                name="search_exeat_student" placeholder="Search Student Name/Index">
                                            <small id="infostudentForm" class="form-text"></small>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="exeatstatus" class="col-md-3 col-form-label">Exeat Status</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="exeatstatus" name="exeatstatus">
                                                <option>Choose Status</option>
                                                <option value='Return'>Return</option>
                                                <option value='Not Returned'>Not Returned</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label for="exeatLimit" class="col-md-6 col-form-label"
                                            style="text-align:right">LIMIT</label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="exeatLimit" name="exeatLimit">
                                                <option value='10'>10</option>
                                                <option value='20'>20</option>
                                                <option value='50'>50</option>
                                                <option value='100'>100</option>
                                                <option value='500'>500</option>
                                                <option value='100000'>All</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="displayExeatInformation"></div>
                                </div>
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
    show();

    function show() {
        var show = "display";
        var exeat_limit = $('#exeatLimit').val();

        $.ajax({
            url: 'inc/scripts/exeatScripts.php',
            method: 'POST',
            data: {
                show,
                exeat_limit
            },
            success: function(data) {
                $('#displayExeatInformation').html(data);
            }
        });
    }
    // ===================================| SEARCH BY NAME OR INDEX |============================================
    $('#search_exeat_student').keyup(function() {
        var searchBYIndex = $('#search_exeat_student').val();

        $.ajax({
            url: 'inc/scripts/exeatScripts.php',
            method: 'POST',
            data: {
                searchBYIndex
            },
            success: function(data) {
                $('#displayExeatInformation').html(data);
            }
        });

    });

    // ===================================| RETURN <|> NOT RETURN |============================================
    $('#exeatstatus').change(function() {
        var exeat_Returnstatus = $('#exeatstatus').val();

        $.ajax({
            url: 'inc/scripts/exeatScripts.php',
            method: 'POST',
            data: {
                exeat_Returnstatus
            },
            success: function(data) {
                $('#displayExeatInformation').html(data);
            }
        });

    });

    // ===================================| EXEAT <|> LIMIT |============================================
    $('#exeatLimit').change(function() {
        var exeat_limit_search = $('#exeatLimit').val();

        $.ajax({
            url: 'inc/scripts/exeatScripts.php',
            method: 'POST',
            data: {
                exeat_limit_search
            },
            success: function(data) {
                $('#displayExeatInformation').html(data);
            }
        });

    });
})
</script>