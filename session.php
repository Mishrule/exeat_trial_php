<?php 
    include_once('inc/scripts/exeatdb.php');
    session_start();
    
    
   if(isset($_SESSION['username'])){
        $check_user = $_SESSION['username'];
        $usernameSQL = "SELECT * FROM useraccount WHERE username = '$check_user'";
        $usernameResult = mysqli_query($conn, $usernameSQL);
        $usernameRow = mysqli_fetch_array($usernameResult);
        $usernamelogin = $usernameRow['username'];
        if(!isset($_SESSION['username'])){
            header("Location:index.php");
        }
    }else if(isset($_SESSION['parent']) && isset($_SESSION['student_id'])){
        $check_parent = $_SESSION['parent'];
        $check_studentid = $_SESSION['student_id'];
        $parentSQL = "SELECT * FROM student_registration WHERE studentid = '$check_studentid'";
        $parentResult = mysqli_query($conn, $parentSQL);
        $parentRow = mysqli_fetch_array($parentResult);
        $parentlogin = $parentRow['parentname'];
        $studentlogin = $parentRow['studentid'];
        if(!isset($_SESSION['parent']) && !isset($_SESSION['studentid'])){
            header("Location:index.php");
        }
    }else{
        header("Location:index.php");
    }
?>