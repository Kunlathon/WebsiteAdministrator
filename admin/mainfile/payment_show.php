<?php
    //Develop By Arnon Manomuang
    //พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
    //Tel 0631146517 , 0946164461
    //โทร 0631146517 , 0946164461
    //Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	

    //ini_set('display_errors', 1);
    //error_reporting(E_ALL ^ E_NOTICE);

?>

<?php
    //error_reporting(E_ALL ^ E_NOTICE);
    if((preg_match("/payment_show.php/", $_SERVER['PHP_SELF']))){
        Header("Location:../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard" class="breadcrumb-item">
                    <i class="icon-home2 mr-2"></i> หน้าแรก</a>
                
                    <a href="#" class="breadcrumb-item">
                    <i class="icon-three-bars mr-2"></i> xxxx</a>

                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=payment_show" class="breadcrumb-item">
                    <i class="icon-list-unordered mr-2"></i> xxxx</a>

                </div>
                <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard"
                    class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

<div class="content">

    <?php
        $manage=filter_input(INPUT_POST,'manage');
            if(($manage=="check_payment")){ ?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<?php
    $rid=filter_input(INPUT_POST,'rid');
    $grade_key=filter_input(INPUT_POST,'check_grade');
    $term_key=filter_input(INPUT_POST,'check_term');
    $cid=filter_input(INPUT_POST,'cid');
    $pay=filter_input(INPUT_POST,'pay');
    $pid=filter_input(INPUT_POST,'pid');
    $aid = check_session("admin_id_lcm");
    $update_date = date('Y-m-d H:i:s');
    $grade_txt=filter_input(INPUT_POST,'grade_txt');


        //echo "rid->".$rid."check_grade->".$grade_key."check_term->".$term_key."cid->".$cid."pay->".$pay."pid->".$pid."aid->".$aid."<br>"; 

    	$show_sql = "SELECT * 
                FROM tb_classroom_detail a 
                INNER JOIN tb_student b ON a.student_id = b.student_id 
                WHERE a.classroom_t_id='{$rid}' 
                AND a.grade_id = '{$grade_key}' 
                AND a.term_id = '{$term_key}' 
                AND a.classroom_detail_status='1' 
                AND (b.student_no != '0' OR b.student_no != '') 
                ORDER BY b.student_no ASC"; 
        $show_list = result_array($show_sql);

        foreach ($show_list as $key => $show_row){
            $cb_chk="chk".$show_row["student_id"];
            $chk=filter_input(INPUT_POST,$cb_chk);

            if((is_null($chk))){
                $chk=0;
            }else{
                $chk;
            }

            $cb_id="id".$show_row["student_id"];
            $id=filter_input(INPUT_POST,$cb_id);

            //echo $chk."<br>";

            if(($pay==5)){
                $data = array(
                    "score_double_student" => $chk,
                    "admin_id" => $aid ,
                    "admin_update" => $update_date
                );
        
                update("tb_payment_student", $data, "payment_student_id = '{$id}' AND payment_id = '{$pid}'");
            }else{

                $data = array(
                    "payment_student_score$pay" => $chk,
                    "admin_id" => $aid ,
                    "admin_update" => $update_date
                );
        
                update("tb_payment_student", $data, "payment_student_id = '{$id}' AND payment_id = '{$pid}'");           
            }

//echo $show_row["student_id"]."/".$chk."/(".$id.") /<br>";

        }

    ?>
 
<div class="row">
    <div class="col-<?php echo $grid;?>-12">
        <div class="card border border-purple">
            <div class="card-header header-elements-inline bg-info text-white">
                <div class="col-<?php echo $grid;?>-6">จัดการการจ่ายเงิน สำเร็จ</div>
                <div class="col-<?php echo $grid;?>-6">
                        <table align="right">
                            <tr>
                                <td>
                                    <div>
<form name="form_list" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_payment">
                                            <button type="submit"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button> 
            <input type="hidden" name="manage"  value="show"> 
            <input type="hidden" name="list"  value="<?php echo $grade_key; ?>"> 
            <input type="hidden" name="grade_txt"  value="<?php echo $grade_txt; ?>"> 
            <input type="hidden" name="check_term" value="<?php echo $term_key;?>">                                     
</form>                                             
                                    </div>
                                </td>
                            </tr>
                        </table>            
                </div>
            </div>

            <div class="card-body">

    <form name="payment_succeed" id="payment_succeed" method="post" action="<?php echo $RunLink->Call_Link_System();?>/?modules=payment_show">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <fieldset class="mb-3">
                        <div class="form-group row">
                            <button type="submit" name="manage" id="manage" class="btn btn-info" value="edit">ตรวจสอบการชำระเงิน</button>&nbsp;
                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                        </div>
                    </fieldset>
                </div>
            </div>

    <input type="hidden" name="rid" id="rid"  value="<?php echo $rid;?>"/>
    <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $grade_key;?>"/>
    <input type="hidden" name="check_term" id="check_term" value="<?php echo $term_key;?>"/>
    <input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>"/>
    <input type="hidden" name="pay" id="pay" value="<?php echo $pay;?>"/>
    <input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
    <input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
    <input type="hidden" name="manage" id="manage" value="edit"/>
    <input type="hidden" name="scorepay" id="scorepay" value="<?php echo $pay;?>" >



    </form>

            </div>

        </div>



    </div>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }elseif(($manage=="edit")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<div class="row">
    <div class="col-<?php echo $grid;?>-12">
        <div class="card border border-purple">

    <?php
        $pid=filter_input(INPUT_POST,"pid");
        $rid=filter_input(INPUT_POST,"rid");
        $term_key=filter_input(INPUT_POST,"check_term");
        $scorepay=filter_input(INPUT_POST,"scorepay");
        $pay=filter_input(INPUT_POST,"pay");
        $grade_key=filter_input(INPUT_POST,"check_grade");
        $grade_txt=filter_input(INPUT_POST,"grade_txt");
        $check_id=filter_input(INPUT_POST,"check_id");
       

            //echo "pid".$pid."rid".$rid."check_term".$term_key."check_grade".$grade_key."scorepay".$scorepay."pay".$pay."++++++++++++++++++++++++++++";

            if((isset($pid,$rid,$term_key,$scorepay,$pay))){ 
                
                $sqlC = "SELECT * FROM `tb_classroom_teacher` WHERE `classroom_t_id`='{$rid}'"; 
                $rowC = row_array($sqlC);                
                
                $txt_pay=array("","คะแนนครั้งที่ 1","คะแนนครั้งที่ 2","ผลสัมฤทธิ์" ,"GPA" ,"ดับเบิ้ลคะแนน");

                ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="card-header header-elements-inline bg-info text-white">
                <div class="col-<?php echo $grid;?>-6">
                    <div>จัดการการจ่ายเงิน ห้องเรียน <?php echo $rowC["classroom_name"]; ?></div> 
                    <div><?php echo $txt_pay[$scorepay];?> </div>  
                </div>              
                <div class="col-<?php echo $grid;?>-6">
                        <table align="right">
                            <tr>
                                <td>
                                    <div>
<form name="form_list" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_payment">
                                            <button type="submit"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button> 
            <input type="hidden" name="manage"  value="show"> 
            <input type="hidden" name="list"  value="<?php echo $grade_key; ?>"> 
            <input type="hidden" name="grade_txt"  value="<?php echo $grade_txt; ?>"> 
            <input type="hidden" name="check_term" value="<?php echo $term_key;?>">                                     
</form>                                             
                                    </div>
                                </td>
                            </tr>
                        </table>            
                </div>
            </div>

            <div class="card-body">
<form name="form_check_payment" id="form_check_payment"  method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/js_code/payment_show/payment_show_process.php" >
                <div class="row">
                    <div class="col-<?php echo $grid;?>-12">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable-button-html5-columns-STDB">
                                <thead>
                                    <tr class="table-info">
                                        <th align="center"><div><center>ลำดับ</center></div></th>
                                        <th align="center"><div><center>รหัส</center></div></th>
                                        <th align="center"><div><center>รายชื่อ</center></div></th>
                                        <th align="center"><div><center>ชื่อเล่น</center></div></th>
                                        <th align="center"><div><center>จัดการ</center></div></th>
                                    </tr>
                                    <tr class="table-warning">
                                        <th colspan="4"><div></div></th>
                                        <th align="center"><div>
                                            <center><label class="custom-control custom-control-success custom-checkbox mb-2">
												<input type="checkbox" class="custom-control-input" id="checkAll">
												<span class="custom-control-label"></span>
				                            </label></center>
                                        </div></th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php
    	$sql = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$rid}' AND a.grade_id = '{$grade_key}' AND a.term_id = '{$term_key}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC"; 
        $list = result_array($sql);
            if((is_array($list) && count($list))){
                $no=1;                
                foreach($list as $key => $row){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                    <tr class="table-active">
                                        <td align="center"><div><?php echo $row["student_no"];?></div></td>
                                        <td align="center"><div><?php echo $row["student_id"];?></div></td>
                                        <td align="left"><div><?php echo $row["student_name"]."&nbsp;".$row["student_surname"];?></div></td>
                                        <td align="left"><?php echo $row['nickname'];?></td>
                                        
                                       
        <?php
            if(($scorepay==1)) {
                $pays = "AND a.payment_score1='1'";
            }elseif(($scorepay==2)){
                $pays = "AND a.payment_score2='1'";
            }elseif(($scorepay==3)){
                $pays = "AND a.payment_score3='1'";
            }elseif(($scorepay==4)){
                $pays = "AND a.payment_score4='1'";
            }else{
                $pays=null;
            }

            $sqlCo = "SELECT * FROM tb_payment a INNER JOIN tb_payment_student b ON a.payment_id = b.payment_id WHERE a.payment_id = '{$pid}' $pays AND a.grade_id = '{$grade_key}' AND a.term_id = '{$term_key}' AND b.student_id = '{$row["student_id"]}'";
            //echo "$sqlCo<br>";
            $rowCo = row_array($sqlCo);	
            
            if(($scorepay==1)) {
                $sscore = $rowCo["payment_student_score1"];
            }elseif (($scorepay==2)) {
                $sscore = $rowCo["payment_student_score2"];
            }elseif (($scorepay==3)) {
                $sscore = $rowCo["payment_student_score3"];
            }elseif (($scorepay==4)) {
                $sscore = $rowCo["payment_student_score4"];
            }elseif(($scorepay==5)){
                $sscore = $rowCo["score_double_student"];
            }else{
                $sscore=0;
            }


            if($sscore == 0) {		
                $checked = null;
            }elseif($sscore == 1) {
                $checked = "checked";
            }else{
                $checked =null;
            }

        ?>
                                        <td align="center"><div>
                                            <center><label class="custom-control custom-control-success custom-checkbox mb-2">
												<input type="checkbox" name="chk<?php echo $row["student_id"];?>" id="chk<?php echo $row["student_id"];?>" class="custom-control-input check" <?php echo $checked;?> value="1">
                                                <input type="hidden" name="id<?php echo $row["student_id"];?>" value="<?php echo $rowCo["payment_student_id"];?>">
												<span class="custom-control-label"></span>
				                            </label></center>
                                        </div></td>    

                                    </tr>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->




<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php       }
            }else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                    <tr class="table-danger">
                                        <td colspan="5"><div>ไมพบข้อมูล</div></td>
                                    </tr>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <fieldset class="mb-3">
                            <div class="form-group row">
                                <button type="submit" name="but_payment" id="but_payment" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                            </div>
                        </fieldset>
                    </div>
                </div>
            



<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>">
<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $grade_key;?>">
<input type="hidden" name="check_term" id="check_term" value="<?php echo $term_key;?>">
<input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>">
<input type="hidden" name="pay" id="pay" value="<?php echo $pay;?>">
<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>">
<input type="hidden" name="check_id" id="check_id"  value="<?php echo $check_id;?>">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="grade_txt" id="grade_txt" value="<?php echo $grade_txt;?>">





</form>

    




<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid;?>-12">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable-button-html5-columns-STDB">
                                <thead>
                                    <tr>
                                        <th align="center"><div>ลำดับ</div></th>
                                        <th align="center"><div>รหัส</div></th>
                                        <th align="center"><div>รายชื่อ</div></th>
                                        <th align="center"><div>ชื่อเล่น</div></th>
                                        <th align="center"><div>จัดการ</div></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-danger">
                                        <td colspan="5"><div>ไมพบข้อมูล</div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>

            </div>            

        </div>



    </div>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php

            if((isset($_POST["check_id"]))){
                $check_id=filter_input(INPUT_POST,'check_id');
            }else{
                if((isset($_GET["check_id"]))){
                    $check_id=base64_decode(filter_input(INPUT_GET,'check_id'));
                }else{}
            }

            if((isset($_POST["check_term"]))){
                $term_key=filter_input(INPUT_POST,'check_term');
            }else{
                if((isset($_GET["check_term"]))){
                    $term_key=base64_decode(filter_input(INPUT_GET,'check_term'));
                }else{}
            }

            if((isset($_POST["check_grade"]))){
                $grade_key=filter_input(INPUT_POST,'check_grade');
            }else{
                if((isset($_GET["check_grade"]))){
                    $grade_key=base64_decode(filter_input(INPUT_GET,'check_grade'));
                }else{}
            }

            if((isset($_POST["grade_txt"]))){
                $grade_txt=filter_input(INPUT_POST,'grade_txt');
            }else{
                if((isset($_GET["grade_txt"]))){
                    $grade_txt=base64_decode(filter_input(INPUT_GET,'grade_txt'));
                }else{}
            }


            //$grade_txt=filter_input(INPUT_POST,'grade_txt');

                if((isset($check_id,$term_key,$grade_key))){

                    $sqlC = "SELECT * FROM `tb_classroom_teacher` WHERE `classroom_t_id` = '{$check_id}'";
                    $rowC=row_array($sqlC);
                        if((is_array($rowC) && count($rowC))){
                            $cid=$rowC["classroom_t_id"];
                            $class=$rowC["classroom_name"];
                        }else{
                            $cid=null;
                            $class=null;
                        }	
    
                        if(($rowC["teacher_id1"] !="0")){
                            $tid=$rowC["teacher_id1"];
                        }elseif(($rowC["teacher_id1"]=="0")){
                            $tid=$rowC["teacher_id2"];
                        }else{
                            $tid=null;
                        }
    
                    $sql = "SELECT * FROM `tb_grade` WHERE `grade_id` = '{$grade_key}'";
                    $row = row_array($sql);
                        if((is_array($row) && count($row))){
                            $grade="ระดับชั้น".$row["grade_name"];
                            $grade_txt=$row["grade_name"];
                        }else{
                            $grade=null;
                            $grade_txt=null;
                        }
    
                    $sql="SELECT * FROM `tb_term` WHERE `term_id` = '{$term_key}' AND `grade_id` = '{$grade_key}' ORDER BY `year` DESC , `term` DESC";
                    $row=row_array($sql);
                        if((is_array($row) && count($row))){
                            $year=$row["year"];
                            $term=$row["term"]."/".$year;
                        }else{
                            $year=null;
                            $term=null;                
                        }
    
                    $tid1=$rowC['teacher_id1'];
                    $sqlT1 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid1}'";
                    $rowT1= row_array($sqlT1);
    
                    $sql = "SELECT * FROM tb_term a INNER JOIN tb_classroom_teacher b ON a.term_id = b.term_id WHERE a.term_id = '{$term_key}' AND b.classroom_t_id = '{$cid}' AND b.classroom_status = '1' ORDER BY b.classroom_name ASC";
                    $row = row_array($sql); ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="row">
    <div class="col-<?php echo $grid;?>-12">
        <div class="row">
            <div class="col-<?php echo $grid;?>-12" style="font-size: 20px;"><?php echo"บัญชีรายชื่อนิสิต ประจำปีการศึกษา ".$year." ภาคเรียน ".$term;?></div>
            <div class="col-<?php echo $grid;?>-12" style="font-size: 20px;"><?php echo $grade." / ".$class;?></div>
<?php
        if(($rowC["teacher_id2"]!=null and $rowC["teacher_id2"]!=0)){
            $tid2=$rowC["teacher_id2"];
            $sqlT2 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid2}'";
            $rowT2= row_array($sqlT2); ?>
            <div class="col-<?php echo $grid;?>-12" style="font-size: 20px;">ครูประจำชั้น(Eng)&nbsp;:&nbsp;<?php echo $rowT1["teacher_name"];?>&nbsp;<?php echo $rowT1["teacher_surname"];?>&nbsp;,&nbsp;ครูประจำชั้น(Thai) : <?php echo $rowT2["teacher_name"];?>&nbsp;<?php echo $rowT2["teacher_surname"];?></div>                
<?php   }else{ ?>
            <div class="col-<?php echo $grid;?>-12" style="font-size: 20px;">ครูประจำชั้น(Eng)&nbsp;:&nbsp;<?php echo $rowT1["teacher_name"];?>&nbsp;<?php echo $rowT1["teacher_surname"];?>&nbsp;,&nbsp;ครูประจำชั้น(Thai) : <?php echo $rowT2["teacher_name"];?>&nbsp;<?php echo $rowT2["teacher_surname"];?></div>
<?php   } ?>   

        </div><br>
    </div>
</div>

<div class="row">
    <div class="col-<?php echo $grid;?>-12">
        <div class="card border border-purple">
            <div class="card border border-purple">
                <div class="card-header header-elements-inline bg-info text-white">
                    <div class="col-<?php echo $grid;?>-6">Student list Academic Year <?php echo $year;?> Semester <?php echo $term;?> </div>
                    <div class="col-<?php echo $grid;?>-6">
                        <table align="right">
                            <tr>
                                <td>
                                    <div>
<form name="form_list" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_payment">
                                            <button type="submit"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button> 
            <input type="hidden" name="manage"  value="show"> 
            <input type="hidden" name="list"  value="<?php echo $grade_key; ?>"> 
            <input type="hidden" name="grade_txt"  value="<?php echo $grade_txt; ?>"> 
            <input type="hidden" name="check_term" value="<?php echo $term_key;?>"> 
                                                
</form>                                             
                                    </div>
                                </td>
                            </tr>
                        </table>                
                    </div>
                </div>
            </div>


    <!--check Student--->
    <?php
        $sqlStu = "SELECT * 
                   FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id 
                   WHERE (a.teacher_id1 = '{$tid1}') AND a.classroom_t_id = '{$cid}' 
                   AND a.term_id = '{$term_key}' AND a.grade_id = '{$grade_key}' 
                   AND b.classroom_detail_status='1'";
        $rowStu = result_array($sqlStu);

        foreach ($rowStu as $key => $_rowStu) { 

            $stuid = $_rowStu['student_id'];
                
            $sqlD = "SELECT * 
                     FROM `tb_payment_student` 
                     WHERE `classroom_t_id` = '{$check_id}' 
                     AND `student_id` = '{$stuid}' 
                     ORDER BY `payment_student_id` ASC";
        
                //echo $sqlD;
                $resultD = row_array($sqlD); 
        
                if($resultD > 0){
        
                } else {
        
                    //echo $stuid;
        
                    $sql = "SELECT * FROM tb_payment WHERE term_id = '{$term_key}' AND grade_id = '{$grade_key}'";
                    $list = result_array($sql); 
        
                    foreach ($list as $key => $row) { 
        
                            $payment_id = $row['payment_id'];
                            //$payment_score1 = $row['payment_score1'];
                            //$payment_score2 = $row['payment_score2'];
                            //$payment_score3 = $row['payment_score3'];
                            //$payment_score4 = $row['payment_score4'];
        
                            $admin_key = check_session("admin_id_lcm");
                            $update_time = date('Y-m-d H:i:s');
        
                            $sqlPAY = "SELECT *,MAX(payment_student_id) AS ID FROM tb_payment_student";
                            $tcrPAY = row_array($sqlPAY);
        
                            $PAY_ID = $tcrPAY['ID'] + 1;
        
                                    $data1 = array(
                                        "payment_student_id" => $PAY_ID ,
                                        "payment_id" => $payment_id ,
                                        "term_id" =>  $term_key,
                                        "grade_id" =>  $grade_key,
                                        "classroom_t_id" =>  $check_id,
                                        "student_id" =>  $stuid,			
                                        "payment_student_score1" => 1,
                                        "payment_student_score2" => 1 ,
                                        "payment_student_score3" => 1 ,
                                        "payment_student_score4" => 1 ,
                                        "score_double_student" => 0 ,
                                        "admin_id" => $aid ,
                                        "admin_update" => $update ,
                                        "payment_student_status" => 1
        
                                    );
        
                                    insert("tb_payment_student", $data1);
                    }
                }
        
        }
    ?>
    <!--check Student End-->


            <div class="card-body">
                <div class="row">
                    <div class="col-<?php echo $grid;?>-12">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable-button-html5-columns-STD">
                                <thead>
                                    <tr>
                                        <th><div></div></th>
                                        <th><div></div></th>
                                        <th><div></div></th>
                                        <th><div></div></th>
                                        <th><div>คะแนนครั้งที่ 1</div></th>
                                        <th><div>คะแนนครั้งที่ 2</div></th>
                                        <th><div>ผลสัมฤทธิ์</div></th>
                                        <th><div>GPA</div></th>
                                        <th><div>ดับเบิ้ลคะแนน</div></th>
                                    </tr>                                     
                                    <tr>
                                        <th align="center"><div>ลำดับ</div></th>
                                        <th align="center"><div>รหัส</div></th>
                                        <th><div>รายชื่อ</div></th>
                                        <th><div>ชื่อเล่น</div></th>
<?php
    $sqlPay = "SELECT * FROM tb_payment WHERE term_id ='{$term_key}' AND grade_id ='{$grade_key}'";
    $rowPay = row_array($sqlPay);
?>                                    
                                        <th align="center">
                                            <div>
                                                <ul class="nav justify-content-center">
	                                                <li class="nav-item">
<form name="ps_a" id="ps_a" method="post" action="<?php echo $RunLink->Call_Link_System();?>/?modules=payment_show">
                                                        <button type="submit" name="manage"  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="คะแนนครั้งที่ 1" data-placement="bottom" value="edit"><i class="icon-search4"></i></button>
                                                        <input name="pid" type="hidden" value="<?php echo $rowPay["payment_id"];?>" /> 
                                                        <input name="rid" type="hidden" value="<?php echo $cid;?>" /> 
                                                        <input name="check_term" type="hidden" value="<?php echo $term_key;?>" /> 
                                                        <input name="scorepay" type="hidden" value="1" /> 
                                                        <input name="pay" type="hidden" value="1" /> 
                                                        <input name="check_grade" type="hidden" value="<?php echo $grade_key;?>"/>
                                                        <input type="hidden" name="grade_txt"  value="<?php echo $grade_txt; ?>"> 
                                                        <input type="hidden" name="check_id" value="<?php echo $check_id;?>">
</form>
                                                    </li>
                                                </ul>
                                            </div>

                                        </th>  
                                        <th align="center">
                                            <div>
                                                <ul class="nav justify-content-center">
	                                                <li class="nav-item">
<form name="ps_b" id="ps_b" method="post" action="<?php echo $RunLink->Call_Link_System();?>/?modules=payment_show">
                                                        <button type="submit" name="manage"  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="คะแนนครั้งที่ 2" data-placement="bottom" value="edit"><i class="icon-search4"></i></button>
                                                        <input name="pid" type="hidden" value="<?php echo $rowPay["payment_id"];?>" /> 
                                                        <input name="rid" type="hidden" value="<?php echo $cid;?>" /> 
                                                        <input name="check_term" type="hidden" value="<?php echo $term_key;?>" /> 
                                                        <input name="scorepay" type="hidden" value="2" /> 
                                                        <input name="pay" type="hidden" value="2" /> 
                                                        <input name="check_grade" type="hidden" value="<?php echo $grade_key;?>"/>
                                                        <input type="hidden" name="grade_txt"  value="<?php echo $grade_txt; ?>"> 
                                                        <input type="hidden" name="check_id" value="<?php echo $check_id;?>">
</form>   
                                                    </li>
                                                </ul>
                                            </div> 

                                        </th>
                                        <th align="center">
                                            <div>
                                                <ul class="nav justify-content-center">
	                                                <li class="nav-item">
<form name="ps_c" id="ps_c" method="post" action="<?php echo $RunLink->Call_Link_System();?>/?modules=payment_show">
                                                        <button type="submit" name="manage"  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="ผลสัมฤทธิ์" data-placement="bottom" value="edit"><i class="icon-search4"></i></button>
                                                        <input name="pid" type="hidden" value="<?php echo $rowPay["payment_id"];?>" /> 
                                                        <input name="rid" type="hidden" value="<?php echo $cid;?>" /> 
                                                        <input name="check_term" type="hidden" value="<?php echo $term_key;?>" /> 
                                                        <input name="scorepay" type="hidden" value="3" /> 
                                                        <input name="pay" type="hidden" value="3" /> 
                                                        <input name="check_grade" type="hidden" value="<?php echo $grade_key;?>"/>
                                                        <input type="hidden" name="grade_txt"  value="<?php echo $grade_txt; ?>">
                                                        <input type="hidden" name="check_id" value="<?php echo $check_id;?>"> 
</form>                                                        
                                                    </li>
                                                </ul>
                                            </div>   

                                        </th>
                                        <th align="center">
                                            <div>
                                                <ul class="nav justify-content-center">
	                                                <li class="nav-item">
<form name="ps_d" id="ps_d" method="post" action="<?php echo $RunLink->Call_Link_System();?>/?modules=payment_show">
                                                        <button type="submit" name="manage"  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="GPA" data-placement="bottom" value="edit"><i class="icon-search4"></i></button>
                                                        <input name="pid" type="hidden" value="<?php echo $rowPay["payment_id"];?>" /> 
                                                        <input name="rid" type="hidden" value="<?php echo $cid;?>" /> 
                                                        <input name="check_term" type="hidden" value="<?php echo $term_key;?>" /> 
                                                        <input name="scorepay" type="hidden" value="4" /> 
                                                        <input name="pay" type="hidden" value="4" /> 
                                                        <input name="check_grade" type="hidden" value="<?php echo $grade_key;?>"/>
                                                        <input type="hidden" name="grade_txt"  value="<?php echo $grade_txt; ?>"> 
                                                        <input type="hidden" name="check_id" value="<?php echo $check_id;?>">
</form>     
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                        <th align="center">
                                            <div>
                                                <ul class="nav justify-content-center">
	                                                <li class="nav-item">
<form name="ps_e" id="ps_e" method="post" action="<?php echo $RunLink->Call_Link_System();?>/?modules=payment_show">
                                                        <button type="submit" name="manage"  class="btn btn-outline-info btn-sm" data-popup="tooltip" title="ดับเบิ้ลคะแนน" data-placement="bottom" value="edit"><i class="icon-search4"></i></button>
                                                        <input name="pid" type="hidden" value="<?php echo $rowPay["payment_id"];?>" /> 
                                                        <input name="rid" type="hidden" value="<?php echo $cid;?>" /> 
                                                        <input name="check_term" type="hidden" value="<?php echo $term_key;?>" /> 
                                                        <input name="scorepay" type="hidden" value="5" /> 
                                                        <input name="pay" type="hidden" value="5" /> 
                                                        <input name="check_grade" type="hidden" value="<?php echo $grade_key;?>"/>
                                                        <input type="hidden" name="grade_txt"  value="<?php echo $grade_txt; ?>">
                                                        <input type="hidden" name="check_id" value="<?php echo $check_id;?>"> 
</form>                                                        
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr> 
                                </thead>
                                <tbody>
<?php
        $sql = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$cid}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' AND a.term_id = '{$term_key}' AND a.grade_id = '{$grade_key}' ORDER BY b.student_no ASC"; 
        $list = result_array($sql);
        $count=1;
        foreach ($list as $key => $row){
            if((is_array($row) && count($row))){ ?>
                                    <tr>
                                        <td align="center"><div><?php echo $count;?></div></td>
                                        <td align="center"><div><?php echo $row["student_id"];?></div></td>
                                        <td><div><?php echo $row["student_name"]."&nbsp;".$row["student_surname"];?></div></td>
                                        <td><div><?php echo $row["nickname"];?></div></td>
            <?php
                $sqlPay1 = "SELECT * FROM tb_payment a INNER JOIN tb_payment_student b ON a.payment_id=b.payment_id WHERE a.term_id ='{$term_key}' AND a.grade_id ='{$grade_key}' AND b.classroom_t_id = '{$cid}' AND b.student_id='{$row["student_id"]}'";
                $rowPay1 = row_array($sqlPay1);
            ?>

            <?php
                    if(($rowPay1['payment_student_score1']=='1')){ ?>
                                        <td align="center"><div><span class="badge badge-success">ชำระแล้ว</span></div></td>
            <?php	}elseif(($rowPay1['payment_student_score1']=='0')){ ?>
                                        <td align="center"><div><span class="badge badge-danger">ค้างชำระ</span></div></td>								
            <?php	}else{ ?>
                                        <td align="center"><div><span class="badge badge-danger">ค้างชำระ</span></div></td>
            <?php   } ?>	

            <?php
                    if(($rowPay1['payment_student_score2']=='1')){ ?>
                                        <td align="center"><div><span class="badge badge-success">ชำระแล้ว</span></div></td>																
            <?php	}elseif(($rowPay1['payment_student_score2']=='0')){ ?>
                                        <td align="center"><div><span class="badge badge-danger">ค้างชำระ</span></div></td>																
            <?php	}else{ ?>
                                        <td align="center"><div><span class="badge badge-danger">ค้างชำระ</span></div></td>
            <?php   } ?>
            
            <?php
                    if(($rowPay1['payment_student_score3']=='1')){ ?>
                                        <td align="center"><div><span class="badge badge-success">ชำระแล้ว</span></div></td>																
            <?php   }elseif(($rowPay1['payment_student_score3']=='0')){ ?>
                                        <td align="center"><div><span class="badge badge-danger">ค้างชำระ</span></div></td>															
            <?php	}else{ ?>
                                        <td align="center"><div><span class="badge badge-danger">ค้างชำระ</span></div></td>
            <?php   } ?>
            
            <?php
                    if(($rowPay1['payment_student_score4']=='1')){ ?>
                                        <td align="center"><div><span class="badge badge-success">ชำระแล้ว</span></div></td>																
            <?php	}elseif(($rowPay1['payment_student_score4']=='0')){ ?>
                                        <td align="center"><div><span class="badge badge-danger">ค้างชำระ</span></div></td>																
            <?php	}else{ ?>
                                        <td align="center"><div><span class="badge badge-danger">ค้างชำระ</span></div></td>
            <?php   } ?>	

            <?php
                    if(($rowPay1['score_double_student']=='1')){ ?>
                                        <td align="center"><div><span class="badge badge-success">ดับเบิ้ล</span></div></td>																
            <?php	}elseif(($rowPay1['score_double_student']=='0')){ ?>
                                        <td align="center"><div><span class="badge badge-secondary">ไม่ดับเบิ้ล</span></div></td>															
            <?php	}else{ ?>
                                        <td align="center"><div><span class="badge badge-secondary">ไม่ดับเบิ้ล</span></div></td>
            <?php   } ?>	
                                  
                                    </tr>
<?php       }else{}
            $count=$count+1;
        } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php   }else{}  ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    } ?>