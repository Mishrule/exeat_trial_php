<?php 
    require_once('exeatdb.php');
    require_once('../headers/dateTime.php');
    $outarray =  array();
    if(isset($_POST['student_name'])){
        $student_id = mysqli_real_escape_string($conn, $_POST['student_name']);
        $student_nameSQL = "SELECT * FROM student_registration WHERE s_id = '$student_id'";

        $student_nameResult = mysqli_query($conn, $student_nameSQL);
        while($student_nameRow = mysqli_fetch_array($student_nameResult)){
            $outarray['id'] = $student_nameRow['studentid'];
            $outarray['name'] = $student_nameRow['studentname'];
            $outarray['form'] = $student_nameRow['studentform'];
            $outarray['program'] = $student_nameRow['studentprogram'];
        }
        echo json_encode($outarray);
    }

    // ========================================| ASSIGN EXEAT|==============================================
    if(isset($_POST['submitBtn'])){
        $exeatShow = '';
        // $exeat_date = mysqli_real_escape_string($conn, $_POST['exeat_date']);
        $exeat_name = mysqli_real_escape_string($conn, $_POST['exeat_name']);
        $exeat_id = mysqli_real_escape_string($conn, $_POST['exeat_id']);
        $exeat_form = mysqli_real_escape_string($conn, $_POST['exeat_form']);
        $exeatProgram = mysqli_real_escape_string($conn, $_POST['exeatProgram']);
        $reason = mysqli_real_escape_string($conn, $_POST['reason']);
        $exeat_assign = mysqli_real_escape_string($conn, $_POST['exeat_assign']);
        $no_of_days = mysqli_real_escape_string($conn, $_POST['no_of_days']);
        $date_return = mysqli_real_escape_string($conn, $_POST['date_return']);
        $parent_approved = 'Not Approved';
        $parent_approved_date = 'n/a';
        $statuss = 'Not Returned';

        $assignSQL = "INSERT INTO exeat VALUES('$dateTime','$exeat_name','$exeat_id','$exeat_form','$exeatProgram','$reason','$exeat_assign','$no_of_days','$date_return','$parent_approved','$parent_approved_date','$statuss')";

        $assignResult = mysqli_query($conn, $assignSQL);

        if($assignResult){
            $exeatShow .= '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>'.$exeat_name.'</strong> exeat has been approved on '.$dateTime.' successfully, Make sure you write the date and time for the student.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }else{
            $exeatShow .= '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>'.mysqli_error($conn).'</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }

        echo $exeatShow;
                
    }

    // ========================================| MANAGE EXEAT|==============================================
    $manageExeatoutarray =  array();
    if(isset($_POST['exeat_date'])){    
        $manageExeat_date = mysqli_real_escape_string($conn, $_POST['exeat_date']);
        $manageExeatSQL = "SELECT * FROM exeat WHERE assign_date = '$manageExeat_date'";

       $manageExeatResult = mysqli_query($conn, $manageExeatSQL);
        while($manageExeatRow = mysqli_fetch_array($manageExeatResult)){
            $manageExeatoutarray['studentExeatStat'] = $manageExeatRow['status_'];
            $manageExeatoutarray['student_name'] = $manageExeatRow['student_name'];
            $manageExeatoutarray['student_id'] = $manageExeatRow['s_id'];
            $manageExeatoutarray['assign_date'] = $manageExeatRow['assign_date'];
            // $manageExeatoutarray['exeat_approve'] = $$manageExeatRow['re'];
            $manageExeatoutarray['exeat_status'] = $manageExeatRow['status_'];
        }
        echo json_encode($manageExeatoutarray);
    }

    // ========================================| UPDATE EXEAT |============================================
   
    if(isset($_POST['updatesubmitBtn'])){    
        $updatestudent_name = mysqli_real_escape_string($conn, $_POST['updatestudent_name']);
        $updatestudent_id = mysqli_real_escape_string($conn, $_POST['updatestudent_id']);
        $updateassign_date = mysqli_real_escape_string($conn, $_POST['updateassign_date']);
        $updateexeat_approve = mysqli_real_escape_string($conn, $_POST['updateexeat_approve']);
        $updateexeat_status = mysqli_real_escape_string($conn, $_POST['updateexeat_status']);
        

        $updateExeatSQL = "UPDATE exeat SET return_approved_by = '$updateexeat_approve', return_approved_date = '$dateTime', status_ = '$updateexeat_status' WHERE assign_date = '$updateassign_date' AND student_name = '$updatestudent_name' AND s_id = '$updatestudent_id'";

       $updateExeatResult = mysqli_query($conn, $updateExeatSQL);
        if($updateExeatResult){
            echo $updatestudent_name.' EXEAT STATUS UPDATED SUCCESSFULLY';
        }else{
            echo mysqli_error($conn);
        }
    }

     // ========================================| VIEW EXEAT|==============================================
  
    if(isset($_POST['show'])){    
        $exeat_limit = intval(mysqli_real_escape_string($conn, $_POST['exeat_limit']));
        $exeat_limitSQL = "SELECT * FROM exeat ORDER BY assign_date DESC LIMIT $exeat_limit";

       $exeat_limitResult = mysqli_query($conn, $exeat_limitSQL);
        $exeat_limitShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Sudent ID</th>
                     <th>Student Name</th>
                     <th>Assign Exeat Date</th>
                     <th>Reason for Exeat</th>
                     <th>Return Date</th>
                     <th>Return Approved by</th>
                     <th>Return Approved date</th>
                     <th>Status</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $exeat_limitCount = 1;
        if(mysqli_num_rows($exeat_limitResult)>0){
            while($exeat_limitRow = mysqli_fetch_array($exeat_limitResult)){
                $exeat_limitShow .= ' 
                    <tr>
                        <th scope="row">'.$exeat_limitCount++.'</th>
                        <td>'.$exeat_limitRow['s_id'].'</td>
                        <td>'.$exeat_limitRow['student_name'].'</td>
                        <td>'.$exeat_limitRow['assign_date'].'</td>
                        <td>'.$exeat_limitRow['reason'].'</td>
                        <td>'.$exeat_limitRow['return_date'].'</td>
                        <td>'.$exeat_limitRow['return_approved_by'].'</td>
                        <td>'.$exeat_limitRow['return_approved_date'].'</td>
                        <td>'.$exeat_limitRow['status_'].'</td>
                    </tr>
                ';
            }
        }else{
            $exeat_limitShow .= ' 
                <tr>
                    <td colspan="9"><marquee><span style="color:red">SORRY NO STUDENT HAVE BEEN ASSIGNED EXEAT</span></marquee></td>
                </tr>
            ';
        }
            $exeat_limitShow .= '
                    </body>
                </table>
                <div align="center">
                   <button type="button" name="submitBtn" id="submitBtn" value="submitBtn" class="btn btn-primary col-md-6 submitBtn">PRINT EXEAT REPORT</button>
                 </div>
            ';
        echo $exeat_limitShow;
    }

    // ========================================| SEARCH EXEAT|==============================================
  
    if(isset($_POST['searchBYIndex'])){    
        $exeat_searchText = mysqli_real_escape_string($conn, $_POST['searchBYIndex']);
        $exeat_searchTextSQL = "SELECT * FROM exeat WHERE s_id LIKE '%$exeat_searchText' OR student_name LIKE '%$exeat_searchText%' OR assign_date LIKE '%$exeat_searchText%' ORDER BY assign_date DESC";

       $exeat_searchTextResult = mysqli_query($conn, $exeat_searchTextSQL);
        $exeat_searchTextShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Sudent ID</th>
                     <th>Student Name</th>
                     <th>Assign Exeat Date</th>
                     <th>Reason for Exeat</th>
                     <th>Return Date</th>
                     <th>Return Approved by</th>
                     <th>Return Approved date</th>
                     <th>Status</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $exeat_searchTextCount = 1;
        if(mysqli_num_rows($exeat_searchTextResult)>0){
            while($exeat_searchTextRow = mysqli_fetch_array($exeat_searchTextResult)){
                $exeat_searchTextShow .= ' 
                    <tr>
                        <th scope="row">'.$exeat_searchTextCount++.'</th>
                        <td>'.$exeat_searchTextRow['s_id'].'</td>
                        <td>'.$exeat_searchTextRow['student_name'].'</td>
                        <td>'.$exeat_searchTextRow['assign_date'].'</td>
                        <td>'.$exeat_searchTextRow['reason'].'</td>
                        <td>'.$exeat_searchTextRow['return_date'].'</td>
                        <td>'.$exeat_searchTextRow['return_approved_by'].'</td>
                        <td>'.$exeat_searchTextRow['return_approved_date'].'</td>
                        <td>'.$exeat_searchTextRow['status_'].'</td>
                    </tr>
                ';
            }
        }else{
            $exeat_searchTextShow .= ' 
                <tr>
                    <td colspan="9"><marquee><span style="color:red">SORRY NO STUDENT HAVE BEEN ASSIGNED EXEAT</span></marquee></td>
                </tr>
            ';
        }
            $exeat_searchTextShow .= '
                    </body>
                </table>
                 <div align="center">
                   <button type="button" name="submitBtn" id="submitBtn" value="submitBtn" class="btn btn-primary col-md-6 submitBtn">PRINT EXEAT REPORT</button>
                 </div>
            ';
        echo $exeat_searchTextShow;
    }

    // ========================================| EXEAT RETURN |==============================================
  
    if(isset($_POST['exeat_Returnstatus'])){    
        $exeat_return = mysqli_real_escape_string($conn, $_POST['exeat_Returnstatus']);
        $exeat_returnSQL = "SELECT * FROM exeat WHERE status_ = '$exeat_return' ORDER BY assign_date DESC";

       $exeat_returnResult = mysqli_query($conn, $exeat_returnSQL);
        $exeat_returnShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Sudent ID</th>
                     <th>Student Name</th>
                     <th>Assign Exeat Date</th>
                     <th>Reason for Exeat</th>
                     <th>Return Date</th>
                     <th>Return Approved by</th>
                     <th>Return Approved date</th>
                     <th>Status</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $exeat_returnCount = 1;
        if(mysqli_num_rows($exeat_returnResult)>0){
            while($exeat_returnRow = mysqli_fetch_array($exeat_returnResult)){
                $exeat_returnShow .= ' 
                    <tr>
                        <th scope="row">'.$exeat_returnCount++.'</th>
                        <td>'.$exeat_returnRow['s_id'].'</td>
                        <td>'.$exeat_returnRow['student_name'].'</td>
                        <td>'.$exeat_returnRow['assign_date'].'</td>
                        <td>'.$exeat_returnRow['reason'].'</td>
                        <td>'.$exeat_returnRow['return_date'].'</td>
                        <td>'.$exeat_returnRow['return_approved_by'].'</td>
                        <td>'.$exeat_returnRow['return_approved_date'].'</td>
                        <td>'.$exeat_returnRow['status_'].'</td>
                    </tr>
                ';
            }
        }else{
            $exeat_returnShow .= ' 
                <tr>
                    <td colspan="9"><marquee><span style="color:red">SORRY STUDENT FOUND</span></marquee></td>
                </tr>
            ';
        }
            $exeat_returnShow .= '
                    </body>
                </table>
                 <div align="center">
                   <button type="button" name="submitBtn" id="submitBtn" value="submitBtn" class="btn btn-primary col-md-6 submitBtn">PRINT EXEAT REPORT</button>
                 </div>
            ';
        echo $exeat_returnShow;
    }
    
    // ========================================| EXEAT <|> LIMIT |==============================================
  
    if(isset($_POST['exeat_limit_search'])){    
        $exeat_limit_search = intval(mysqli_real_escape_string($conn, $_POST['exeat_limit_search']));
        $exeat_limit_searchSQL = "SELECT * FROM exeat ORDER BY assign_date DESC LIMIT $exeat_limit_search";

       $exeat_limit_searchResult = mysqli_query($conn, $exeat_limit_searchSQL);
        $exeat_limit_searchShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Sudent ID</th>
                     <th>Student Name</th>
                     <th>Assign Exeat Date</th>
                     <th>Reason for Exeat</th>
                     <th>Return Date</th>
                     <th>Return Approved by</th>
                     <th>Return Approved date</th>
                     <th>Status</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $exeat_limit_searchCount = 1;
        if(mysqli_num_rows($exeat_limit_searchResult)>0){
            while($exeat_limit_searchRow = mysqli_fetch_array($exeat_limit_searchResult)){
                $exeat_limit_searchShow .= ' 
                    <tr>
                        <th scope="row">'.$exeat_limit_searchCount++.'</th>
                        <td>'.$exeat_limit_searchRow['s_id'].'</td>
                        <td>'.$exeat_limit_searchRow['student_name'].'</td>
                        <td>'.$exeat_limit_searchRow['assign_date'].'</td>
                        <td>'.$exeat_limit_searchRow['reason'].'</td>
                        <td>'.$exeat_limit_searchRow['return_date'].'</td>
                        <td>'.$exeat_limit_searchRow['return_approved_by'].'</td>
                        <td>'.$exeat_limit_searchRow['return_approved_date'].'</td>
                        <td>'.$exeat_limit_searchRow['status_'].'</td>
                    </tr>
                ';
            }
        }else{
            $exeat_limit_searchShow .= ' 
                <tr>
                    <td colspan="9"><marquee><span style="color:red">SORRY STUDENT FOUND</span></marquee></td>
                </tr>
            ';
        }
            $exeat_limit_searchShow .= '
                    </body>
                </table>
                 <div align="center">
                   <button type="button" name="submitBtn" id="submitBtn" value="submitBtn" class="btn btn-primary col-md-6 submitBtn">PRINT EXEAT REPORT</button>
                 </div>
            ';
        echo $exeat_limit_searchShow;
    }
?>