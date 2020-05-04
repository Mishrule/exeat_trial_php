<?php 
require_once('././session.php');
    echo '
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="#">
                    <strong class="blue-text"><marquee>Welcome: '.$usernamelogin.'</marquee></strong>
</a>

<!-- Collapse -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<!-- Links -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Left -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link waves-effect" href="dashboard.php">DASHBOARD
                <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect" href="student_registration.php">STUDENTS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect" href="staff_registration.php">STAFF</a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect" href="parent_info.php">PARENTS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect" href="assign_exeat.php">EXEAT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect" href="user_registration.php">USERS</a>
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
';
?>