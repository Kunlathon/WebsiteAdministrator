<div class="page-body">
    <div class="container-xl">

        <div class="row row-cards">
            <div class="col-md-12">
                <div class="page-body">
                    <div class="container-xl">

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
    if((isset($_POST["id"]))){
        $id=filter_input(INPUT_POST,'id');
    }else{
        if((isset($_GET["id"]))){
            $id=filter_input(INPUT_GET,'id');
        }else{
            $id=null;
        }
    }

    if((isset($_POST["text_key"]))){
        $text_key=filter_input(INPUT_POST,'text_key');
    }else{
        if((isset($_GET["text_key"]))){
            $text_key=filter_input(INPUT_GET,'text_key');
        }else{
            $text_key=null;
        }
    }
//$id = $_REQUEST['id'];
//$text_key = $_REQUEST['text_key'];
$sql = "SELECT * FROM tb_course a INNER JOIN  tb_course_detail b ON a.course_id=b.course_id INNER JOIN tb_teacher c ON b.teacher_id=c.teacher_id WHERE  course_detail_id='$id' AND b.course_detail_status ='2' AND c.teacher_status = '1' ORDER BY b.course_detail_id DESC";
//echo $sql;
$row = row_array($sql);

				if((isset($row["course_name"]))){
                    $course_name=$row["course_name"];
                }else{
                    $course_name=null;
                }

                if((isset($row["meeting_id"]))){
                    $meeting_id=$row["meeting_id"];
                }else{
                    $meeting_id=null;
                }

                if((isset($row["passcode"]))){
                    $passcode=$row["passcode"];
                }else{
                    $passcode=null;
                }

                if((isset($row["course_name_en"]))){
                    $course_name_en=$row["course_name_en"];
                }else{
                    $course_name_en=null;
                }

                if((isset($row["course_detail_date_start"]))){
                    $cdds=date_en($row["course_detail_date_start"]);
                }else{
                    $cdds=null;
                }

                if((isset($row["course_detail_date_finnish"]))){
                    $cddf=date_en($row["course_detail_date_finnish"]);
                }else{
                    $cddf=null;
                }

                if((isset($row["picture_class"]))){
                    $picture_class=$row["picture_class"];
                }else{
                    $picture_class=null;
                }

				/*if((isset($text_key))){
                    $text_key=$text_key;
                }else{
                    $text_key=null;
                }*/

?>
						<div class="row row-cards">
                            <div class="col-md-12">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-2 alogn-items-center">
                                                <div class="row row-cards">
                                                    <div class="col-md-12">
                                                        <div class="page-header d=print-none">
                                                            <div class="container-xl">
                                                                <div class="row g-2 alogn-items-center">

                                                                    <div class="col-md-4">
																	<a href="?modules=classroom_detail&id=<?php echo $row['course_detail_id'];?>" class="d-block">
																		<img src="../uploads/teacher/<?php echo $row['teacher_picture'];?>" alt="<?php echo $row['teacher_name'];?>" class="card-img-top"></a>

                                                                    </div>
																	<div class="col-md-5">                                                                        
                                                                                    <div><span ><h2><?php echo $course_name;?></h2></span></div>
                                                                                    <div><span ><h2><?php echo $course_name_en;?></h2></span></div>
                                                                                    <div><span ><h2><?php echo $cdds." - ".$cddf;?></h2></span></div>
                                                                                    <div><span ><h2>Zoom Meeting ID : <?php echo $meeting_id;?></h2></span></div>
																					<div><span ><h2>Passcode : <?php echo $passcode;?></h2></span></div>
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        
    <?php
        if(($picture_class!=null)){
            if((file_exists("../uploads/picture_class/".$picture_class))){ ?>

                                                                        <div align="right"><input type="image" class="img-thumbnail" name="picture_class_show" id="picture_class_show" src="../uploads/picture_class/<?php echo $picture_class;?>" style="widex: 40%; height:200px;" data-toggle="modal" data-target="#myModal"></div>
                                                                        <div align="right">Schedule&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>                                                                    


    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <img src="../uploads/picture_class/<?php echo $picture_class;?>" class="img-thumbnail" alt="Cinque Terre" style="widex: 100%;"> 
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
    </div>


    <?php   }else{}
        }else{}
    
    ?>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-5 alogn-items-center">
                                                <div class="row row-cards">
                                                <div class="col-md-12">
                                                    <div class="page-header d=print-none">
                                                            <div class="container-xl">
                                                                <div class="row g-2 alogn-items-center">
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <div id="text_key-null">
                                                                            <input name="text_key"  id="text_key" type="text" class="form-control" required="required" placeholder="กรอกข้อมูลเพื่อค้นหา (Search)">
                                                                            </div>
                                                                        </div>                                                                        
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="card-footer text-end" style="margin: 0 auto; text-align: center;">
                                                                        <center>
                                                                            <button type="button" name="but_clink" id="but_clink" class="btn btn-success">Search</button>
                                                                            <button type="button" name="but_delete" id="but_delete" class="btn btn-danger" value="but_delete">Cancel</button>
                                                                        </center>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-5 alogn-items-center">
                                                <div class="row row-cards">
                                                    <div class="col-md-12">

                                                        <div class="card">
                                                            <div class="card-status-top bg-green"></div>
                                                            <div class="card-header">
                                                                <h3 class="card-title">รายชื่อนักเรียน (Student Name List)</h3>
                                                            </div>
                                                            <div class="card-body">															
																
                                                                <div id="Run_List">
                                                                    <div class="row">

                                                                    <?php
                                                                        $sqlClaD = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id=b.classroom_t_id WHERE course_detail_id='{$row['course_detail_id']}'";
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
                                                                </div>
															</div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
          
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $("#but_delete").on("click",function(){
            var but_delete=$("#but_delete").val();
            var course_detail_id="<?php echo $id;?>";
                if(but_delete==="but_delete"){
                    document.location="?modules=classroom_detail&id="+course_detail_id;
                }else{}
        })
    })
</script>

<script>
    $(document).ready(function(){
        $("#but_clink").on("click",function(){
            var text_key=$("#text_key").val();
            var course_detail_id="<?php echo $id;?>";
                if(text_key!==""){
                    if(text_key.length>=101){
                        document.getElementById("text_key-null").innerHTML=
                        '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control is-invalid">'
                        +'<div class="invalid-feedback">จำนวนตัวอักษรจำกัดไม่เกิน 100 ตัวอักษร</div>';
                    }else{
                        $.post("../proccess/classroom_detail_show.php",{
                            text_key:text_key,
                            course_detail_id:course_detail_id
                        },function(RunList){
                            if(RunList!==""){
                                $("#Run_List").html(RunList);
                                document.getElementById("text_key-null").innerHTML=
                                '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control">'
                                +'<div class="invalid-feedback"></div>';
                            }else{
                                document.getElementById("Run_List").innerHTML=
                                '<div class="row">'
                                +'  <div class="alert alert-warning" role="alert">'
                                +'      เกิดข้อผิดพลาดไม่สามารถดำเนินการได้'
                                +'  </div>'
                                +'</div>';
                            }
                        })
                    }
                }else{
                    document.getElementById("text_key-null").innerHTML=
                        '<input type="text" name="text_key" id="text_key" value="'+text_key+'" class="form-control is-invalid">'
                        +'<div class="invalid-feedback">กรุณาพิมพ์ เพื่อค้นหา</div>';
                }
        })
    })
</script>