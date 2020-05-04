<?php 
     require_once('exeatdb.php');
     session_start();

     if(isset($_POST['userpick'])){
        $userarray = array();
        $userpick = mysqli_real_escape_string($conn, $_POST['userpick']);
        $personSQL = "SELECT * FROM useraccount WHERE username = '$userpick'";
        $personResult = mysqli_query($conn, $personSQL);
        if(mysqli_num_rows($personResult)>0){
            while($userrow = mysqli_fetch_array($personResult)){
                $userarray['img_label'] = $userrow['image'];
                $userarray['personname'] = $userrow['firstname'].' '.$userrow['middlename'].' '.$userrow['lastname'];
            }
        }else{
            $userarray['img_label'] = "invalid user.jpg";
                $userarray['personname'] = 'Invalid User';
        }

        echo json_encode($userarray);
     }

    
?>