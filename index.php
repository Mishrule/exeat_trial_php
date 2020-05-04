<?php require_once('inc/scripts/exeatdb.php'); ?>
<?php 
    session_start();
    //  =========================LOGIN
    $loginShow ='';
    if(isset($_POST['loginSubmit'])){
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $accountType = mysqli_real_escape_string($conn, $_POST['accountType']);
        if($accountType == 'administrator'){
            $loginSQL = "SELECT * FROM useraccount WHERE username = '$username' AND pass_word = '$pass' AND account_type = '$accountType'";
            $loginResult = mysqli_query($conn, $loginSQL);
            $loginRow = mysqli_fetch_array($loginResult);
            $_SESSION['username'] = $loginRow['username'];
            if(mysqli_num_rows($loginResult)==1){
                header("Location:dashboard.php");
            }
        }elseif($accountType == 'staff'){
            $loginSQL = "SELECT * FROM useraccount WHERE username = '$username' AND pass_word = '$pass' AND account_type = '$accountType'";
            $loginResult = mysqli_query($conn, $loginSQL);
            $loginRow = mysqli_fetch_array($loginResult);
            $_SESSION['username'] = $loginRow['username'];
            if(mysqli_num_rows($loginResult)==1){
                header("Location:staff_exeat_assign.php");
            }
        }else if($accountType == 'parent'){
            $loginSQL = "SELECT * FROM student_registration WHERE studentname = '$username' AND studentid = '$pass'";
            $loginResult = mysqli_query($conn, $loginSQL);
            $loginRow = mysqli_fetch_array($loginResult);
            $_SESSION['parent'] = $loginRow['parentname'];
            $_SESSION['student_id'] = $loginRow['studentid'];
            if(mysqli_num_rows($loginResult)==1){
                header("Location:parent_approval.php");
            }
        }else{
            $loginShow = 'Invalid User or Password';
        }
        

    }
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/headers/head.php'); ?>

<body class="grey lighten-3">
    <video id="bgvid" playsinline autoplay muted loop>
        <!-- 
- Video needs to be muted, since Chrome 66+ will not autoplay video with sound.
WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
        <source src="img/m.webm" type="video/webm">
        <!-- <source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4"> -->

    </video>

    <div class="background-overlay">
    </div>

    <h1 class="text-center">WELCOME TO MY EXEAT
        <button type="submit" name="submitBtn" id="submitBtn" value="submitBtn" class="btn btn-primary col-md-6"
            data-toggle="modal" data-target="#modalLoginAvatarDemo"><i class="fas fa-sign-in-alt"></i> LOGIN</button>
        <p><strong><span class="text-danger"><?php echo $loginShow; ?></span></strong></p>
    </h1>

    <!--Main Navigation-->

    <!--Main Navigation-->

    <!--Main layout-->

    <!--Main layout-->



    <!-- SCRIPTS -->
    <?php require_once('inc/headers/jsscripts.php');?>


</body>

</html>
<script>
$(document).ready(function() {
    $('#username').keyup(function() {
        var userpick = $('#username').val();
        $.ajax({
            url: 'inc/scripts/indexScript.php',
            method: 'POST',
            dataType: 'json',
            data: {
                userpick
            },
            success: function(data) {
                $('#img_label').attr('src', `img/${data.img_label}`);
                $('#personname').text(data.personname);

            }
        })
    })

    // $('#loginSubmit').click(function() {
    //     var username = $('#username').val();
    //     var pass = $('#pass').val();
    //     var accountType = $('#accountType').val();
    //     var loginSubmit = $('#loginSubmit').val();

    //     $.ajax({
    //         url: 'inc/scripts/indexScript.php',
    //         method: 'POST',
    //         data: {
    //             username,
    //             pass,
    //             accountType,
    //             loginSubmit
    //         },
    //         success: function(data) {
    //             windows.location.url = 'dashboard.php';
    //         }
    //     })
    // })
})
</script>
<!--Modal Form Login with Avatar Demo-->
<div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <img src="img/invalid user.jpg" class="rounded-circle img-responsive" id="img_label" alt="Avatar photo">
            </div>
            <!--Body-->
            <form method="POST" action="<?php $_PHP_SELF; ?>">
                <div class="modal-body text-center mb-1">

                    <h5 class="mt-1 mb-2" id="personname"></h5>

                    <div class="md-form ml-0 mr-0">
                        <input type="text" id="username" name="username" class="form-control ml-0">
                        <label for="username" class="ml-0">Username</label>
                    </div>

                    <div class="md-form ml-0 mr-0">
                        <input type="password" id="pass" name="pass" class="form-control ml-0">
                        <label for="pass" class="ml-0">Enter password</label>
                    </div>

                    <div class="md-form ml-0 mr-0">
                        <select class="form-control" id="accountType" name="accountType">
                            <option>Choose...</option>
                            <option value="administrator">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="parent">Parent</option>
                        </select>
                    </div>


                    <div class="text-center mt-4">
                        <button class="btn btn-cyan" id="loginSubmit" type="submit" name="loginSubmit"
                            value="loginSubmit">Login
                            <i class="fas fa-sign-in-alt ml-1"></i>
                        </button>
                    </div>
                    <p><strong><span class="text-danger"><?php echo $loginShow; ?></span></strong></p>
                </div>
            </form>

        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal Form Login with Avatar Demo-->