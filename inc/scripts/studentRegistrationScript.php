<?php 
    require_once('exeatdb.php');
    //========================================= MANAGE STUDENT ===================================================
    //                                          MANAGE STUDENT
    //=============================================================================================================
        $manageStudentFetchShow = '';
    if(isset($_POST['select'])){
        $changeLimit = intval(mysqli_real_escape_string($conn, $_POST['changeLimit']));
        $manageStudentFetchSQL = "SELECT * FROM student_registration ORDER BY registrationdate LIMIT $changeLimit";
        $manageStudentFetchResult = mysqli_query($conn, $manageStudentFetchSQL);
        $manageStudentFetchShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Sudent ID</th>
                     <th>Student Name</th>
                     <th>Parent Name</th>
                     <th>Parent Contact</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $manageStudentFetchCount = 1;
        if(mysqli_num_rows($manageStudentFetchResult)>0){
            while($manageStudentFetcRow = mysqli_fetch_array($manageStudentFetchResult)){
                $manageStudentFetchShow .= ' 
                    <tr>
                        <th scope="row">'.$manageStudentFetchCount++.'</th>
                        <td>'.$manageStudentFetcRow['studentid'].'</td>
                        <td>'.$manageStudentFetcRow['studentname'].'</td>
                        <td>'.$manageStudentFetcRow['parentname'].'</td>
                        <td>'.$manageStudentFetcRow['parentcontact'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$manageStudentFetcRow['s_id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$manageStudentFetcRow['s_id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $manageStudentFetchShow .= ' 
                <tr>
                    <td colspan="6"><marquee><span style="color:red">NO STUDENTS RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $manageStudentFetchShow .= '
                    </body>
                </table>
            ';
        echo $manageStudentFetchShow;
    }
    //================================================================================================================
    //============================================ LIMIT
    if(isset($_POST['student_manage_lim'])){
        $student_manage_limit = intval(mysqli_real_escape_string($conn, $_POST['student_manage_lim']));
        $manageStudentFetchLimitSQL = "SELECT * FROM student_registration ORDER BY registrationdate LIMIT $student_manage_limit";
        $manageStudentFetchLimitResult = mysqli_query($conn, $manageStudentFetchLimitSQL);
        $manageStudentFetchLimitShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Sudent ID</th>
                     <th>Student Name</th>
                     <th>Parent Name</th>
                     <th>Parent Contact</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $manageStudentFetchLimitCount = 1;
        if(mysqli_num_rows($manageStudentFetchLimitResult)>0){
            while($manageStudentFetchLimitRow = mysqli_fetch_array($manageStudentFetchLimitResult)){
                $manageStudentFetchLimitShow .= ' 
                    <tr>
                        <th scope="row">'.$manageStudentFetchLimitCount++.'</th>
                        <td>'.$manageStudentFetchLimitRow['studentid'].'</td>
                        <td>'.$manageStudentFetchLimitRow['studentname'].'</td>
                        <td>'.$manageStudentFetchLimitRow['parentname'].'</td>
                        <td>'.$manageStudentFetchLimitRow['parentcontact'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$manageStudentFetchLimitRow['s_id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$manageStudentFetchLimitRow['s_id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $manageStudentFetchLimitShow .= ' 
                <tr>
                    <td colspan="6"><marquee><span style="color:red">NO STUDENTS RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $manageStudentFetchLimitShow .= '
                    </body>
                </table>
            ';
        echo $manageStudentFetchLimitShow;
    }
    // ===============================================================================================================
    // =========================================== SEARCH
    if(isset($_POST['keysearch'])){
        $keysearch = mysqli_real_escape_string($conn, $_POST['keysearch']);
        $manageStudentFetchLimitSQL = "SELECT * FROM student_registration WHERE studentid LIKE '%$keysearch' OR studentname LIKE '%$keysearch' ORDER BY registrationdate";
        $manageStudentFetchLimitResult = mysqli_query($conn, $manageStudentFetchLimitSQL);
        $manageStudentFetchLimitShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Sudent ID</th>
                     <th>Student Name</th>
                     <th>Parent Name</th>
                     <th>Parent Contact</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $manageStudentFetchLimitCount = 1;
        if(mysqli_num_rows($manageStudentFetchLimitResult)>0){
            while($manageStudentFetchLimitRow = mysqli_fetch_array($manageStudentFetchLimitResult)){
                $manageStudentFetchLimitShow .= ' 
                    <tr>
                        <th scope="row">'.$manageStudentFetchLimitCount++.'</th>
                        <td>'.$manageStudentFetchLimitRow['studentid'].'</td>
                        <td>'.$manageStudentFetchLimitRow['studentname'].'</td>
                        <td>'.$manageStudentFetchLimitRow['parentname'].'</td>
                        <td>'.$manageStudentFetchLimitRow['parentcontact'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$manageStudentFetchLimitRow['s_id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$manageStudentFetchLimitRow['s_id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $manageStudentFetchLimitShow .= ' 
                <tr>
                    <td colspan="6"><marquee><span style="color:red">NO STUDENTS RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $manageStudentFetchLimitShow .= '
                    </body>
                </table>
            ';
        echo $manageStudentFetchLimitShow;
    }
    // ===============================================================================================================
    // =========================================== INDIVIDUAL SEARCH 
    if(isset($_POST['searchStudent_NameBTN'])){
        

        $individual_key_search = mysqli_real_escape_string($conn, $_POST['searchStudent_ID']);
        $individual_StudentFetchLimitSQL = "SELECT * FROM student_registration WHERE studentid = '$individual_key_search' OR studentname = '$individual_key_search'";
        $individual_StudentFetchLimitResult = mysqli_query($conn, $individual_StudentFetchLimitSQL);
        $individual_StudentFetchLimitShow = '';
        $individual_StudentFetchLimitCount = 1;
        if(mysqli_num_rows($individual_StudentFetchLimitResult)>0){
            while($individual_StudentFetchLimitRow = mysqli_fetch_array($individual_StudentFetchLimitResult)){
                $individual_StudentFetchLimitShow .= ' 
                    
                        <div class="text-center">
                            
                            <img src="img/'.$individual_StudentFetchLimitRow['studentimage'].'" class="rounded img-thumbnail" width="50%;" alt="Student Image here">
                                <h5 class="card-title">STUDENT INFORMATION</h5>
                            <p>'.$individual_StudentFetchLimitRow['studentid'].'</p>
                            <p>'.$individual_StudentFetchLimitRow['studentname'].'</p>
                            <p>'.$individual_StudentFetchLimitRow['studentgender'].'</p>
                            <p>'.$individual_StudentFetchLimitRow['studentform'].'</p>
                            <p>'.$individual_StudentFetchLimitRow['studentprogram'].'</p>
                            <p>'.$individual_StudentFetchLimitRow['parentname'].'</p>
                            <p>'.$individual_StudentFetchLimitRow['parentcontact'].'</p>
                            <p>'.$individual_StudentFetchLimitRow['parentlocation'].'</p>
                            <p>'.$individual_StudentFetchLimitRow['registrationdate'].'</p>
                            <p><i class="fas fa-edit ml-1 fa-lg edit" style="color:blue"  id="'.$individual_StudentFetchLimitRow['s_id'].'"></i>
                        <i class="fas fa-trash ml-2 fa-lg del" style="color:red" id="'.$individual_StudentFetchLimitRow['s_id'].'"></i></p>
                            
                        </div>
                    
                ';
            }
        }else{
            $individual_StudentFetchLimitShow .= ' 
               
                            <div">
                                <h3 style="color:red;"><marquee><strong>NO STUDENT FOUND </strong></marquee></h3>
                                <p>'.mysqli_error($conn).'</p>
                            </div>
                       
            ';
        }
           
        echo $individual_StudentFetchLimitShow;
    }

    // ==============================| SHOW PARENT |
    if(isset($_POST['parentlimit'])){
        $parentlimit =intval(mysqli_real_escape_string($conn, $_POST['parentlimit']));
        $parentStudentLimitShow = '';
        $parentStudentLimitSQL = "SELECT * FROM student_registration ORDER BY registrationdate DESC LIMIT $parentlimit";
        $parentStudentLimitResult = mysqli_query($conn, $parentStudentLimitSQL);
        $parentStudentLimitShow = '
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
        $parentStudentLimitCount = 1;
        if(mysqli_num_rows($parentStudentLimitResult)>0){
           while($parentStudentLimitRow = mysqli_fetch_array($parentStudentLimitResult)){
                $parentStudentLimitShow .= '
                    <tr>
                        <th scope="row">'.$parentStudentLimitCount++.'</th>
                        <td>'.$parentStudentLimitRow['parentname'].'</td>
                        <td>'.$parentStudentLimitRow['studentname'].'</td>
                        <td>'.$parentStudentLimitRow['parentcontact'].'</td>
                        <td>'.$parentStudentLimitRow['parentlocation'].'</td>
                                            
                    </tr>
                    ';
           }
        }else{
        $parentStudentLimitShow .= '
        <tr>
            <td colspan="5">
                <marquee><span style="color:red">NO PARENT/STUDENT RECORDS FOUND</span></marquee>
            </td>
        </tr>
        ';
        }
        $parentStudentLimitShow .= '
        </body>
        </table>
        ';
        echo $parentStudentLimitShow;
    }

    // ==============================| SHOW SEARCH |
    if(isset($_POST['parentSearch'])){
        $parentSearch = mysqli_real_escape_string($conn, $_POST['parentSearch']);
        $parentStudentSearchShow = '';
        $parentStudentSearchSQL = "SELECT * FROM student_registration WHERE studentname LIKE '%$parentSearch%' OR parentname LIKE '%$parentSearch%' ORDER BY registrationdate DESC";
        $parentStudentSearchResult = mysqli_query($conn, $parentStudentSearchSQL);
        $parentStudentSearchShow = '
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
        $parentStudentSearchCount = 1;
        if(mysqli_num_rows($parentStudentSearchResult)>0){
           while($parentStudentSearchRow = mysqli_fetch_array($parentStudentSearchResult)){
                $parentStudentSearchShow .= '
                    <tr>
                        <th scope="row">'.$parentStudentSearchCount++.'</th>
                        <td>'.$parentStudentSearchRow['parentname'].'</td>
                        <td>'.$parentStudentSearchRow['studentname'].'</td>
                        <td>'.$parentStudentSearchRow['parentcontact'].'</td>
                        <td>'.$parentStudentSearchRow['parentlocation'].'</td>
                                            
                    </tr>
                    ';
           }
        }else{
        $parentStudentSearchShow .= '
        <tr>
            <td colspan="5">
                <marquee><span style="color:red">NO PARENT/STUDENT RECORDS FOUND '.mysqli_error($conn).'</span></marquee>
            </td>
        </tr>
        ';
        }
        $parentStudentSearchShow .= '
        </body>
        </table>
        ';
        echo $parentStudentSearchShow;
    }

?>