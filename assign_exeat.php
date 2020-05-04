<?php 
    require_once('./inc/scripts/exeatdb.php');
    require_once('./inc/headers/dateTime.php');

?>
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
                <a href="assign_exeat.php" class="list-group-item list-group-item-action active waves-effect">
                    <i class="fas fa-user mr-3"></i>Assign Exeat</a>
                <a href="manage_exeat.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-table mr-3"></i>Manage Exeat</a>
                <a href="view_exeat.php" class="list-group-item list-group-item-action waves-effect">
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
                        <span>ASSIGN EXEAT</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-7 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!--Grid column-->
                            <div class="col-md-12 mb-4">

                                <!--Card-->
                                <div>

                                    <!--Card content-->
                                    <div>
                                        <form method="POST">
                                            <legend align="center">ASSIGN EXEAT</legend>
                                            <div id="assign_show"></div>

                                            <!-- <div class="form-group row">
                                                <label for="exeat_date" class="col-md-3 col-form-label">Exeat
                                                    Date</label>
                                                <div class="col-md-9">
                                                    <input type="date" class="form-control" id="exeat_date"
                                                        name="exeat_date">
                                                    <small id="infoexeatDate" class="form-text"></small>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label for="student_name" class="col-md-3 col-form-label">Student
                                                    Name</label>
                                                <div class="col-md-9">

                                                    <select class="custom-select mr-md-2" id="student_name"
                                                        name="student_name">
                                                        <option selected>Choose...</option>
                                                        <?php
                                                        $studentNameSQL = "SELECT * FROM student_registration";
                                                        $studentNameResult = mysqli_query($conn, $studentNameSQL);

                                                        while($studentNameRow = mysqli_fetch_array($studentNameResult)){
                                                           echo '<option value="'.$studentNameRow['s_id'].'">'.$studentNameRow['studentname'].'</option> .';
                                                        }
                                                    ?>
                                                    </select>
                                                    <small id="infoStudentName" class="form-text"></small>
                                                </div>
                                            </div>

                                            <div class="form-group row" hidden>
                                                <label for="student_original_name"
                                                    class="col-md-3 col-form-label">Student
                                                    Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="student_original_name"
                                                        name="student_original_name" disabled>
                                                    <small id="infostudentId" class="form-text"></small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="student_id" class="col-md-3 col-form-label">Student
                                                    ID</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="student_id"
                                                        name="student_id" disabled>
                                                    <small id="infostudentId" class="form-text"></small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="student_form" class="col-md-3 col-form-label">Student
                                                    Form</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="student_form"
                                                        name="student_form" disabled>
                                                    <small id="infostudentForm" class="form-text"></small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="studentProgram" class="col-md-3 col-form-label">Student
                                                    Program</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="studentProgram"
                                                        name="studentProgram" disabled>
                                                    <small id="infoprogram" class="form-text"></small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="exeat_reason" class="col-md-3 col-form-label">Reason For
                                                    Exeat</label>
                                                <div class="col-md-9">
                                                    <textarea rows="7" cols="4" class="form-control" id="reason"
                                                        name="reason"></textarea>
                                                    <small id="infoexeat_reason" class="form-text"></small>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="student_assign" class="col-md-3 col-form-label">Assign
                                                    Exeat</label>
                                                <div class="col-md-9">

                                                    <select class="custom-select mr-md-2" id="student_assign"
                                                        name="student_assign">
                                                        <option value="assign">Assign</option>

                                                    </select>
                                                    <small id="infoStudentName" class="form-text"></small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="no_of_days" class="col-md-3 col-form-label">Number of
                                                    Days</label>
                                                <div class="col-md-9">

                                                    <select class="custom-select mr-md-2" id="no_of_days"
                                                        name="no_of_days">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                        <option value="32">32</option>
                                                        <option value="33">33</option>
                                                        <option value="34">34</option>
                                                        <option value="35">35</option>
                                                        <option value="36">36</option>
                                                        <option value="37">37</option>
                                                        <option value="38">38</option>
                                                        <option value="39">39</option>
                                                        <option value="40">40</option>
                                                        <option value="41">41</option>
                                                        <option value="42">42</option>
                                                        <option value="43">43</option>
                                                        <option value="44">44</option>
                                                        <option value="45">45</option>
                                                        <option value="46">46</option>
                                                        <option value="47">47</option>
                                                        <option value="48">48</option>
                                                        <option value="49">49</option>
                                                        <option value="50">50</option>
                                                        <option value="51">51</option>
                                                        <option value="52">52</option>
                                                        <option value="53">53</option>
                                                        <option value="54">54</option>
                                                        <option value="55">55</option>
                                                        <option value="56">56</option>
                                                        <option value="57">57</option>
                                                        <option value="58">58</option>
                                                        <option value="59">59</option>
                                                        <option value="60">60</option>
                                                    </select>
                                                    <small id="infoNum_of_days" class="form-text"></small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="date_return" class="col-md-3 col-form-label">Return
                                                    Date</label>
                                                <div class="col-md-9">
                                                    <input type="date" class="form-control" id="date_return"
                                                        name="date_return">

                                                </div>
                                                <small id="infodatereturn" class="form-text"></small>
                                            </div>

                                            <div align="center">
                                                <button type="button" name="submitBtn" id="submitBtn" value="submitBtn"
                                                    class="btn btn-primary col-md-6">Assign Exeat</button>
                                            </div><br>
                                            <div id="assign_buttom_show"></div>

                                        </form>


                                    </div>

                                </div>
                                <!--/.Card-->

                            </div>
                            <!--Grid column-->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-5 mb-4">

                    <!--Card-->
                    <div class="card mb-4">

                        <!-- Card header -->
                        <div class="card-header text-center">
                            STUDENT ASSIGNED
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <?php 
                                $assignShow = '';
                                $assignSQL = "SELECT * FROM exeat WHERE status_ = 'Not Returned' ORDER BY assign_date DESC LIMIT 5 ";
                                $assignResult = mysqli_query($conn, $assignSQL);
                                 $assignCount = 1;
                                 $assignShow .='
                                 <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                  <table class="table table-striped mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">STUDENT</th>
                                        <th scope="col">ASSIGN DATE</th>
                                        <th scope="col">RETURN DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                 ';
                                  if(mysqli_num_rows($assignResult)>0){
                                    while($assignRow = mysqli_fetch_array($assignResult)){
                                         $assignShow .='
                                             <tr>
                                                <th scope="row">'.$assignCount++.'</th>
                                                <td>'.$assignRow['student_name'].'</td>
                                                <td>'.$assignRow['assign_date'].'</td>
                                                <td>'.$assignRow['return_date'].'</td>
                                            </tr>
                                         ';
                                    }
                                  }else{
                                     $assignShow .='
                                        <tr>
                                            <td colspan="4"><marquee><strong>SORRY NO EXEAT AS BEEN ASSIGNED</strong></marquee></td>
                                            
                                        </tr>
                                     ';
                                  }
                                   $assignShow .= '
                                          
                                        </tbody>
                                    </table>
                                    </div>
                                   ';
                                  echo $assignShow;

                            ?>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4">

                        <div class="card-header text-center">STUDENT RETURNED</div>

                        <!--Card content-->
                        <div class="card-body">

                            <!-- List group links -->
                            <?php 
                                $returnShow = '';
                                $returnSQL = "SELECT * FROM exeat WHERE status_ = 'Return' ORDER BY assign_date DESC LIMIT 5 ";
                                $returnResult = mysqli_query($conn, $returnSQL);
                                 $returnCount = 1;
                                 $returnShow .='
                                 <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                  <table class="table table-striped mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">STUDENT</th>
                                        <th scope="col">APPROVED BY</th>
                                        <th scope="col">RETURN DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                 ';
                                  if(mysqli_num_rows($returnResult)>0){
                                    while($returnRow = mysqli_fetch_array($returnResult)){
                                         $returnShow .='
                                             <tr>
                                                <th scope="row">'.$returnCount++.'</th>
                                                <td>'.$returnRow['student_name'].'</td>
                                                <td>'.$returnRow['return_approved_by'].'</td>
                                                <td>'.$returnRow['return_approved_date'].'</td>
                                            </tr>
                                         ';
                                    }
                                  }else{
                                     $returnShow .='
                                        <tr>
                                            <td colspan="4"><marquee><strong><span style="color:red">SORRY NO STUDENT HAS RETURNED</span></strong></marquee></td>
                                            
                                        </tr>
                                     ';
                                  }
                                   $returnShow .= '
                                          
                                        </tbody>
                                    </table>
                                    </div>
                                   ';
                                  echo $returnShow;

                            ?>
                            <!-- List group links -->

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
    $('#submitBtn').attr('disabled', true);
    // $('.alert').alert();
    $('#student_name').change(function() {
        var student_name = $('#student_name').val();
        $.ajax({
            url: 'inc/scripts/exeatScripts.php',
            method: 'POST',
            data: {
                student_name
            },
            dataType: 'json',
            success: function(data) {
                $('#student_form').val(data.form);
                $('#studentProgram').val(data.program);
                $('#student_id').val(data.id);
                $('#student_original_name').val(data.name);
                $('#submitBtn').attr('disabled', false);
            }
        })
    });
    //===========================================| Assign |==========================================
    $('#submitBtn').click(function() {
        var exeat_date = $('#exeat_date').val();
        var student_name = $('#student_name').val();
        var original_name = $('#student_original_name').val();
        var student_id = $('#student_id').val();
        var student_form = $('#student_form').val();
        var studentProgram = $('#studentProgram').val();
        var reason = $('#reason').val();
        var student_assign = $('#student_assign').val();
        var no_of_days = $('#no_of_days').val();
        var date_return = $('#date_return').val();
        var submitBtn = $('#submitBtn').val();
        if (student_name === 'Choose...') {
            $('#submitBtn').attr('disabled', true);
            $('#student_name').css('border', '2px solid red ');
            $('#infoStudentName').text("PLEASE SELECT STUDENT NAME");
            $('#infoStudentName').css('color', 'red');
        } else if (reason === '') {
            $('#reason').css('border', '2px solid red ');
            $('#infoexeat_reason').text("PLEASE ADD A REASON FOR THE EXEAT");
            $('#infoexeat_reason').css('color', 'red');
        } else if (date_return === '') {
            $('#date_return').css('border', '2px solid red ');
            $('#infodatereturn').text("PLEASE DATE STUDENT MUST RETURN CAN'T BE EMPTY");
            $('#infodatereturn').css('color', 'red');
        } else {
            $.ajax({
                url: 'inc/scripts/exeatScripts.php',
                method: 'POST',
                data: {
                    // exeat_date,
                    exeat_name: original_name,
                    exeat_id: student_id,
                    exeat_form: student_form,
                    exeatProgram: studentProgram,
                    reason: reason,
                    exeat_assign: student_assign,
                    no_of_days: no_of_days,
                    date_return: date_return,
                    submitBtn: submitBtn
                },
                success: function(data) {
                    $('#assign_show').html(data);
                    $('#assign_buttom_show').html(data);
                    $('#submitBtn').attr('disabled', true);
                }
            });
        }
    });

    // =========================================| CLOSE ALERT | ===================================
    $(document).on('click', '.close', function() {
        location.reload();
    });

})
</script>