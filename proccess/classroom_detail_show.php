<?php
    include("../config/connect.ini.php");
    include("../config/fnc.php");

    $Date=date("Y-m-d");
    $DateTime=date("Y-m-d H:i:s");
    $Dateimg=date("YmdHis");

    $text_key=filter_input(INPUT_POST,'text_key');
    $course_detail_id=filter_input(INPUT_POST,'course_detail_id');

 ?>
 
 <div class="row">

<?php
    $sqlClaD = "SELECT * FROM tb_classroom_teacher 
                a INNER JOIN tb_classroom_detail b 
                ON a.classroom_t_id=b.classroom_t_id 
                WHERE course_detail_id='{$course_detail_id}' 
                AND user_student_no LIKE '%{$text_key}%'";
    //echo $sqlClaD;
    $rowClaD = result_array($sqlClaD);

    foreach ($rowClaD as $key => $_itemClaD){ 

        $sqlStu="SELECT * FROM tb_student WHERE user_student_no='{$_itemClaD['user_student_no']}'";
        $rowStu = row_array($sqlStu);
?>

        
    <div class="col-md-3" align="center">
        <div class="card card-sm alogn-items-center">
            <div class="card-body">
                <img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=http://www.mse-exam.net/qr/chk_std.php?std_id=<?php echo $rowStu['user_student_no'];?>&choe=UTF-8";><br>
                <?php echo $rowStu['user_student_no'];?><br>
                <?php echo $rowStu['user_name']."&nbsp;".$rowStu['user_name_buddhist']."&nbsp;".$rowStu['user_surname']; ?>																		
            </div>
        </div>
    </div>


    <?php
    }
    ?>        

</div>