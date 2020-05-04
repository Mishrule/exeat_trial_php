<?php 
    require_once('exeatdb.php');
    //========================================= MANAGE USER ============================================
    //                                          MANAGE USER
    //==================================================================================================
        $manageUserFetchShow = '';
    if(isset($_POST['select'])){
        $changeLimit = intval(mysqli_real_escape_string($conn, $_POST['changeLimit']));
        $manageUserFetchSQL = "SELECT * FROM useraccount ORDER BY registration_date LIMIT $changeLimit";
        $manageUserFetchResult = mysqli_query($conn, $manageUserFetchSQL);
        $manageUserFetchShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>User ID</th>
                     <th>Password</th>
                     <th>First Name</th>
                     <th>Middle Name</th>
                     <th>Last Name</th>
                     <th>Contact</th>
                     <th>Location</th>
                     <th>Registration Date</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $manageUserFetchCount = 1;
        if(mysqli_num_rows($manageUserFetchResult)>0){
            while($manageUserFetchRow = mysqli_fetch_array($manageUserFetchResult)){
                $manageUserFetchShow .= ' 
                    <tr>
                        <th scope="row">'.$manageUserFetchCount++.'</th>
                        <td>'.$manageUserFetchRow['username'].'</td>
                        <td>'.$manageUserFetchRow['pass_word'].'</td>
                        <td>'.$manageUserFetchRow['firstname'].'</td>
                        <td>'.$manageUserFetchRow['middlename'].'</td>
                        <td>'.$manageUserFetchRow['lastname'].'</td>
                        <td>'.$manageUserFetchRow['contact'].'</td>
                         <td>'.$manageUserFetchRow['location'].'</td>
                        <td>'.$manageUserFetchRow['registration_date'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$manageUserFetchRow['id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$manageUserFetchRow['id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $manageUserFetchShow .= ' 
                <tr>
                    <td colspan="10"><marquee><span style="color:red">NO USER RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $manageUserFetchShow .= '
                    </body>
                </table>
            ';
        echo $manageUserFetchShow;
    }
    //=======================================================================================================
    //============================================ LIMIT
    if(isset($_POST['user_manage_lim'])){
        $user_manage_limit = intval(mysqli_real_escape_string($conn, $_POST['user_manage_lim']));
        $manageuser_FetchLimitSQL = "SELECT * FROM useraccount ORDER BY registration_date LIMIT $user_manage_limit";
        $manageuser_FetchLimitResult = mysqli_query($conn, $manageuser_FetchLimitSQL);
        $manageuser_FetchLimitShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>User ID</th>
                     <th>Password</th>
                     <th>First Name</th>
                     <th>Middle Name</th>
                     <th>Last Name</th>
                     <th>Contact</th>
                     <th>Location</th>
                     <th>Registration Date</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $manageuser_FetchLimitCount = 1;
        if(mysqli_num_rows($manageuser_FetchLimitResult)>0){
            while($manageuserFetchLimitRow = mysqli_fetch_array($manageuser_FetchLimitResult)){
                $manageuser_FetchLimitShow .= ' 
                    <tr>
                        <th scope="row">'.$manageuser_FetchLimitCount++.'</th>
                        <td>'.$manageuserFetchLimitRow['username'].'</td>
                        <td>'.$manageuserFetchLimitRow['pass_word'].'</td>
                        <td>'.$manageuserFetchLimitRow['firstname'].'</td>
                        <td>'.$manageuserFetchLimitRow['middlename'].'</td>
                        <td>'.$manageuserFetchLimitRow['lastname'].'</td>
                        <td>'.$manageuserFetchLimitRow['contact'].'</td>
                         <td>'.$manageuserFetchLimitRow['location'].'</td>
                        <td>'.$manageuserFetchLimitRow['registration_date'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$manageuserFetchLimitRow['id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$manageuserFetchLimitRow['id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $manageuser_FetchLimitShow .= ' 
                <tr>
                    <td colspan="10"><marquee><span style="color:red">NO USER RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $manageuser_FetchLimitShow .= '
                    </body>
                </table>
            ';
        echo $manageuser_FetchLimitShow;
    }
    // ===============================================================================================================
    // =========================================== SEARCH
    if(isset($_POST['keysearch'])){
        $keysearch = mysqli_real_escape_string($conn, $_POST['keysearch']);
        $searchuserFetchLimitSQL = "SELECT * FROM useraccount WHERE username LIKE '%$keysearch' OR contact LIKE '%$keysearch' ORDER BY registration_date";
        $searchuser_FetchLimitResult = mysqli_query($conn, $searchuserFetchLimitSQL);
        $searcheuserFetchLimitShow = '
             <table class="table table-hover">
                <thead class="blue lighten-4">
                 <tr>
                     <th>S/N</th>
                     <th>User ID</th>
                     <th>Password</th>
                     <th>First Name</th>
                     <th>Middle Name</th>
                     <th>Last Name</th>
                     <th>Contact</th>
                     <th>Location</th>
                     <th>Registration Date</th>
                     <th>Controls</th>
                 </tr>
              </thead>
             <tbody>
        ';
        $searchuserFetchLimitCount = 1;
        if(mysqli_num_rows($searchuser_FetchLimitResult)>0){
            while($searchuserFetchLimitRow = mysqli_fetch_array($searchuser_FetchLimitResult)){
                $searcheuserFetchLimitShow .= ' 
                    <tr>
                        <th scope="row">'.$searchuserFetchLimitCount++.'</th>
                        <td>'.$searchuserFetchLimitRow['username'].'</td>
                        <td>'.$searchuserFetchLimitRow['pass_word'].'</td>
                        <td>'.$searchuserFetchLimitRow['firstname'].'</td>
                        <td>'.$searchuserFetchLimitRow['middlename'].'</td>
                        <td>'.$searchuserFetchLimitRow['lastname'].'</td>
                        <td>'.$searchuserFetchLimitRow['contact'].'</td>
                         <td>'.$searchuserFetchLimitRow['location'].'</td>
                        <td>'.$searchuserFetchLimitRow['registration_date'].'</td>
                        <td><i class="fas fa-edit ml-1 edit" style="color:blue" id="'.$searchuserFetchLimitRow['id'].'"></i>
                        <i class="fas fa-trash ml-1 del" style="color:red" id="'.$searchuserFetchLimitRow['id'].'"></i>
                           
                        </td>
                    </tr>
                ';
            }
        }else{
            $searcheuserFetchLimitShow .= ' 
                <tr>
                    <td colspan="10"><marquee><span style="color:red">NO STUDENTS RECORDS FOUND</span></marquee></td>
                </tr>
            ';
        }
            $searcheuserFetchLimitShow .= '
                    </body>
                </table>
            ';
        echo $searcheuserFetchLimitShow;
    }
    // ===============================================================================================================
    // =========================================== INDIVIDUAL SEARCH 
    if(isset($_POST['searchuser_NameBTN'])){
        

        $individual_key_search = mysqli_real_escape_string($conn, $_POST['searchuser_ID']);
        $individual_userFetchLimitSQL = "SELECT * FROM useraccount WHERE username = '$individual_key_search'";
        $individual_userFetchLimitResult = mysqli_query($conn, $individual_userFetchLimitSQL);
        $individual_userFetchLimitShow = '';
        
        if(mysqli_num_rows($individual_userFetchLimitResult)>0){
            while($individual_userFetchLimitRow = mysqli_fetch_array($individual_userFetchLimitResult)){
                $individual_userFetchLimitShow .= ' 
                    
                        <div class="text-center">
                            
                            <img src="img/'.$individual_userFetchLimitRow['image'].'" class="rounded img-thumbnail" width="50%;" alt="user Image here">
                                <h5 class="card-title">USER INFORMATION</h5>
                            <p>'.$individual_userFetchLimitRow['username'].'</p>
                            <p>'.$individual_userFetchLimitRow['firstname'].' 
                                '.$individual_userFetchLimitRow['middlename'].' 
                                '.$individual_userFetchLimitRow['lastname'].' 
                            </p>
                            <p>'.$individual_userFetchLimitRow['contact'].'</p>
                            <p>'.$individual_userFetchLimitRow['location'].'</p>
                            <p>'.$individual_userFetchLimitRow['account_type'].'</p>
                            <p>'.$individual_userFetchLimitRow['registration_date'].'</p>
                            
                            <p><i class="fas fa-edit ml-1 fa-lg edit" style="color:blue"  id="'.$individual_userFetchLimitRow['id'].'"></i>
                        <i class="fas fa-trash ml-2 fa-lg del" style="color:red" id="'.$individual_userFetchLimitRow['id'].'"></i></p>
                            
                        </div>
                    
                ';
            }
        }else{
            $individual_userFetchLimitShow .= ' 
               
                            <div">
                                <h3 style="color:red;"><marquee><strong>NO USER FOUND </strong></marquee></h3>
                                <p>'.mysqli_error($conn).'</p>
                            </div>
                       
            ';
        }
           
        echo $individual_userFetchLimitShow;
    }
?>