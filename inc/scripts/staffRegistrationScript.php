<?php 
    require_once('exeatdb.php');
    //========================================= MANAGE STUDENT ===================================================
    //                                          MANAGE STUDENT
    //=============================================================================================================
        $manageStaffFetchShow = '';
    if(isset($_POST['select'])){
        $changeLimit = intval(mysqli_real_escape_string($conn, $_POST['changeLimit']));
        $manageStaffFetchSQL = "SELECT * FROM staff_registration ORDER BY registration_date LIMIT $changeLimit";
        $manageStaffFetchResult = mysqli_query($conn, $manageStaffFetchSQL);
        $manageStaffFetchShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Staff ID</th>
                     <th>Staff Name</th>
                     <th>Staff Position</th>
                     <th>Parent Contact</th>
                     <th>Registration Date</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $manageStaffFetchCount = 1;
        if(mysqli_num_rows($manageStaffFetchResult)>0){
            while($manageStaffFetchRow = mysqli_fetch_array($manageStaffFetchResult)){
                $manageStaffFetchShow .= ' 
                    <tr>
                        <th scope="row">'.$manageStaffFetchCount++.'</th>
                        <td>'.$manageStaffFetchRow['staff_id'].'</td>
                        <td>'.$manageStaffFetchRow['staff_name'].'</td>
                        <td>'.$manageStaffFetchRow['staff_position'].'</td>
                        <td>'.$manageStaffFetchRow['staff_contact'].'</td>
                        <td>'.$manageStaffFetchRow['registration_date'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$manageStaffFetchRow['stf_id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$manageStaffFetchRow['stf_id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $manageStaffFetchShow .= ' 
                <tr>
                    <td colspan="7"><marquee><span style="color:red">NO STAFF RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $manageStaffFetchShow .= '
                    </body>
                </table>
            ';
        echo $manageStaffFetchShow;
    }
    //================================================================================================================
    //============================================ LIMIT
    if(isset($_POST['staff_manage_lim'])){
        $staff_manage_limit = intval(mysqli_real_escape_string($conn, $_POST['staff_manage_lim']));
        $manageStaff_FetchLimitSQL = "SELECT * FROM staff_registration ORDER BY registration_date LIMIT $staff_manage_limit";
        $manageStaff_FetchLimitResult = mysqli_query($conn, $manageStaff_FetchLimitSQL);
        $manageStaff_FetchLimitShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Staff ID</th>
                     <th>Staff Name</th>
                     <th>Staff Position</th>
                     <th>Parent Contact</th>
                     <th>Registration Date</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $manageStaff_FetchLimitCount = 1;
        if(mysqli_num_rows($manageStaff_FetchLimitResult)>0){
            while($manageStaffFetchLimitRow = mysqli_fetch_array($manageStaff_FetchLimitResult)){
                $manageStaff_FetchLimitShow .= ' 
                    <tr>
                        <th scope="row">'.$manageStaff_FetchLimitCount++.'</th>
                        <td>'.$manageStaffFetchLimitRow['staff_id'].'</td>
                        <td>'.$manageStaffFetchLimitRow['staff_name'].'</td>
                        <td>'.$manageStaffFetchLimitRow['staff_position'].'</td>
                        <td>'.$manageStaffFetchLimitRow['staff_contact'].'</td>
                        <td>'.$manageStaffFetchLimitRow['registration_date'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$manageStaffFetchLimitRow['stf_id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$manageStaffFetchLimitRow['stf_id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $manageStaff_FetchLimitShow .= ' 
                <tr>
                    <td colspan="7"><marquee><span style="color:red">NO STUDENTS RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $manageStaff_FetchLimitShow .= '
                    </body>
                </table>
            ';
        echo $manageStaff_FetchLimitShow;
    }
    // ===============================================================================================================
    // =========================================== SEARCH
    if(isset($_POST['keysearch'])){
        $keysearch = mysqli_real_escape_string($conn, $_POST['keysearch']);
        $searchStaffFetchLimitSQL = "SELECT * FROM staff_registration WHERE staff_id LIKE '%$keysearch' OR staff_name LIKE '%$keysearch' ORDER BY registration_date";
        $searchStaff_FetchLimitResult = mysqli_query($conn, $searchStaffFetchLimitSQL);
        $searcheStaffFetchLimitShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>Staff ID</th>
                     <th>Staff Name</th>
                     <th>Staff Position</th>
                     <th>Parent Contact</th>
                     <th>Registration Date</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $searchStaffFetchLimitCount = 1;
        if(mysqli_num_rows($searchStaff_FetchLimitResult)>0){
            while($searchStaffFetchLimitRow = mysqli_fetch_array($searchStaff_FetchLimitResult)){
                $searcheStaffFetchLimitShow .= ' 
                    <tr>
                        <th scope="row">'.$searchStaffFetchLimitCount++.'</th>
                        <td>'.$searchStaffFetchLimitRow['staff_id'].'</td>
                        <td>'.$searchStaffFetchLimitRow['staff_name'].'</td>
                        <td>'.$searchStaffFetchLimitRow['staff_position'].'</td>
                        <td>'.$searchStaffFetchLimitRow['staff_contact'].'</td>
                        <td>'.$searchStaffFetchLimitRow['registration_date'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$searchStaffFetchLimitRow['stf_id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$searchStaffFetchLimitRow['stf_id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $searcheStaffFetchLimitShow .= ' 
                <tr>
                    <td colspan="7"><marquee><span style="color:red">NO STUDENTS RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $searcheStaffFetchLimitShow .= '
                    </body>
                </table>
            ';
        echo $searcheStaffFetchLimitShow;
    }
    // ===============================================================================================================
    // =========================================== INDIVIDUAL SEARCH 
    if(isset($_POST['searchStaff_NameBTN'])){
        

        $individual_key_search = mysqli_real_escape_string($conn, $_POST['searchStaff_ID']);
        $individual_StaffFetchLimitSQL = "SELECT * FROM staff_registration WHERE staff_id = '$individual_key_search' OR staff_name = '$individual_key_search'";
        $individual_StaffFetchLimitResult = mysqli_query($conn, $individual_StaffFetchLimitSQL);
        $individual_StaffFetchLimitShow = '';
        
        if(mysqli_num_rows($individual_StaffFetchLimitResult)>0){
            while($individual_StaffFetchLimitRow = mysqli_fetch_array($individual_StaffFetchLimitResult)){
                $individual_StaffFetchLimitShow .= ' 
                    
                        <div class="text-center">
                            
                            <img src="img/'.$individual_StaffFetchLimitRow['staff_image'].'" class="rounded img-thumbnail" width="50%;" alt="Staff Image here">
                                <h5 class="card-title">STAFF INFORMATION</h5>
                            <p>'.$individual_StaffFetchLimitRow['staff_id'].'</p>
                            <p>'.$individual_StaffFetchLimitRow['staff_name'].'</p>
                            <p>'.$individual_StaffFetchLimitRow['staff_position'].'</p>
                            <p>'.$individual_StaffFetchLimitRow['staff_contact'].'</p>
                            <p>'.$individual_StaffFetchLimitRow['registration_date'].'</p>
                            
                            <p><i class="fas fa-edit ml-1 fa-lg edit" style="color:blue"  id="'.$individual_StaffFetchLimitRow['stf_id'].'"></i>
                        <i class="fas fa-trash ml-2 fa-lg del" style="color:red" id="'.$individual_StaffFetchLimitRow['stf_id'].'"></i></p>
                            
                        </div>
                    
                ';
            }
        }else{
            $individual_StaffFetchLimitShow .= ' 
               
                            <div">
                                <h3 style="color:red;"><marquee><strong>NO STAFF FOUND </strong></marquee></h3>
                                <p>'.mysqli_error($conn).'</p>
                            </div>
                       
            ';
        }
           
        echo $individual_StaffFetchLimitShow;
    }
?>