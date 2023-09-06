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
    //error_reporting(E_ALL ^ E_NOTICE);;
?>

    <?php
        if((preg_match("/character_show.php/", $_SERVER['PHP_SELF']))){
            Header("Location: ../index.php");
            die();
        }else{
            if((check_session("admin_status_aba")=='1') || (check_session("admin_status_aba") == '2') ||(check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')){ ?>

    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard" class="breadcrumb-item">
                    <i class="icon-home2 mr-2"></i> หน้าแรก</a>
                
                    <a href="#" class="breadcrumb-item">
                    <i class="icon-three-bars mr-2"></i>   ประเมินคุณลักษณะนิสิต</a>

                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=character_show" class="breadcrumb-item">
                    <i class="icon-list-unordered mr-2"></i>  ห้องเรียน</a>
					
                    <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=character_show" class="breadcrumb-item">
                    <i class="icon-list-unordered mr-2"></i> รายเอียดห้องเรียน</a>
					

                </div>
                <a href="<?php echo $RunLink->Call_Link_System();?>/?modules=dashboard"
                    class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

        <?php
           
			if((isset($_POST["classroom_t_key"]))){
				$id=filter_input(INPUT_POST, 'classroom_t_key');
				$classroom_t_key=$id;
			}else{
				if((isset($_GET["id"]))){
					$id=base64_decode(filter_input(INPUT_GET, 'id'));
					$classroom_t_key=$id;
				}else{}
			}

			if((isset($_POST["term_key"]))){
				$check_term=filter_input(INPUT_POST, 'term_key');
			}else{
				if((isset($_GET["check_term"]))){
					$check_term=base64_decode(filter_input(INPUT_GET, 'check_term'));
				}else{}				
			}

			if((isset($_POST["grade_key"]))){
				$check_grade=filter_input(INPUT_POST, 'grade_key');
			}else{
				if((isset($_GET["check_grade"]))){
					$check_grade=base64_decode(filter_input(INPUT_GET, 'check_grade'));
				}else{}
			}

		  	//$id="1"; //classroom_t_id
            //$check_term="2";
            //$check_grade="2";

			//echo "id->".$id."check_term->".$check_term."check_grade->".$check_grade;

                if((isset($id))){
                    $check_id=$id;
                    $sqlC = "SELECT * FROM `tb_classroom_teacher` WHERE `classroom_t_id` = '{$check_id}'";
                    //echo $sqlC;
                    $rowC = row_array($sqlC);	
                    $cid = $rowC['classroom_t_id'];
                    $class = $rowC['classroom_name'];
                        if(($rowC['teacher_id1']!="0")){
                            $tid=$rowC['teacher_id1'];
                        }else{
                            $tid=$rowC['teacher_id2'];
                        }
                }else{}
                
                if((isset($check_grade))){
                    //$check_grade=$_REQUEST['check_grade'];
                    $sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
                    $row = row_array($sql);	
                    $grade="ระดับชั้น".$row["grade_name"];
                }else{
                    $grade="";
                }

                if((isset($check_term))){
                    //$check_term=$_REQUEST['check_term'];
                    $sql = "SELECT * FROM tb_term WHERE term_id = '{$check_term}' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                    $row = row_array($sql);	
                    $year = $row['year'];
                    $term=$row["term"]."/".$year;
                }else{
                    $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                    $row = row_array($sql);
                    $check_term=$row['term_id'];
                    $year = $row['year'];
                    $term=$row["term"]."/".$year;
                }

                //check Student
                $sqlStu = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id WHERE (a.teacher_id1 = '{$tid}') AND a.classroom_t_id = '{$check_id}' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' AND b.classroom_detail_status='1'";
                //echo $sqlStu;
                $rowStu = result_array($sqlStu); 

                foreach ($rowStu as $key => $_rowStu) { 

                    $stuid = $_rowStu['student_id'];
                        
                    $sqlD = "SELECT * FROM tb_character_detail WHERE classroom_t_id = '{$check_id}' AND student_id = '$stuid' ORDER BY character_detail_id ASC";
                
                        //echo $sqlD;
                        $resultD = row_array($sqlD); 
                
                        if($resultD > 0){
                
                        } else {
                
                            //echo $stuid;
                
                            $sql = "SELECT * FROM tb_character ORDER BY character_sort ASC";
                            $list = result_array($sql); 
                
                            foreach ($list as $key => $row) { 
                
                            $character_id = $row['character_id'];
                
                                    $data3 = array(
                                        "character_id" => $character_id ,
                                        "classroom_t_id" =>  $check_id,
                                        "student_id" =>  $stuid,				
                                        "character_detail_status" => 1
                
                                    );
                
                                    insert("tb_character_detail", $data3);
                            }
                        }
                
                }

            $tid1=$rowC['teacher_id1'];
            $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
            $rowT1= row_array($sqlT1);

        ?>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div style="font-size: 20px;">บัญชีรายชื่อนิสิต ประจำปีการศึกษา <?php echo $year;?> ภาคเรียน <?php echo $term;?></div>
                <div style="font-size: 20px;"><?php echo $grade;?> / <?php echo $class;?></div>

        <?php
                if(($rowC['teacher_id2']!="" && $rowC['teacher_id2']!=0)){
                    $tid2=$rowC['teacher_id2'];
                    $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid2}'";
                    $rowT2= row_array($sqlT2); ?>

                <div style="font-size: 20px;">ครูประจำชั้น(Eng) : <?php echo $rowT1['teacher_name'];?>&nbsp;<?php echo $rowT1['teacher_surname'];?>&nbsp;,&nbsp;ครูประจำชั้น(Thai) : <?php echo $rowT2['teacher_name'];?>&nbsp;<?php echo $rowT2['teacher_surname'];?></div>

        <?php    }else{} ?>

        <?php
            $sql = "SELECT * FROM tb_term a INNER JOIN tb_classroom_teacher b ON a.term_id = b.term_id WHERE a.term_id = '{$check_term}' AND b.classroom_t_id = '{$cid}' AND b.classroom_status = '1' ORDER BY b.classroom_name ASC";
            $row = row_array($sql);
        ?>

            </div>
        </div><br>
        
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-info">
					<div class="card-header header-elements-inline bg-info text-white">
                        <div clsss="col-<?php echo $grid;?>-6" style="font-size: 16px;">Student list Academic Year <?php echo $year;?> Semester <?php echo $term;?></div>
                        <div clsss="col-<?php echo $grid;?>-6"></div>
					</div>

					<div class="card-body">
						<div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="table-responsive">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                            <table class="table table-bordered table-striped">
                                                <thead>
													<tr>
                                                        <th width="30"> &nbsp; </th>
														<th width="50"> &nbsp; </th>
                                                        <th> &nbsp; </th>
														<th width="100"> &nbsp; </th>
														<?php
															$sqlSco_1 = "SELECT *,COUNT(character_id) AS CC1 FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '1') GROUP BY a.character_cat_id ASC ORDER BY a.character_cat_id ASC, a.character_sort ASC ";

															//echo $sqlSco_1;
															$rowSco_1 = row_array($sqlSco_1);
														?>
														
														<th width="50" colspan="<?php echo $rowSco_1['CC1'];?>" align="center" bgcolor="#9cc2e5">
															<?php echo $rowSco_1['character_cat_name'];?>
														
														</th> 
														<th width="50" bgcolor="#9cc2e5"> &nbsp; </th>
														<th width="50" bgcolor="#9cc2e5"> &nbsp; </th>
														<th width="50" bgcolor="#9cc2e5"> &nbsp; </th>
														<th width="50" bgcolor="#9cc2e5"> &nbsp; </th>

														<?php
															$sqlSco_2 = "SELECT *,COUNT(character_id) AS CC2 FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '2') GROUP BY a.character_cat_id ASC ORDER BY a.character_cat_id ASC, a.character_sort ASC ";

															//echo $sqlSco_2;
															$rowSco_2 = row_array($sqlSco_2);
														?>
														
														<th width="50" colspan="<?php echo $rowSco_2['CC2'];?>" align="center" bgcolor="#c8c6c6">
															<?php echo $rowSco_2['character_cat_name'];?>
														
														</th>

														<th width="50" bgcolor="#c8c6c6"> &nbsp; </th>
														<th width="50" bgcolor="#c8c6c6"> &nbsp; </th>
														<th width="50" bgcolor="#c8c6c6"> &nbsp; </th>

														<?php
															$sqlSco_3 = "SELECT * ,COUNT(character_id) AS CC3 FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '3') ORDER BY a.character_cat_id ASC, a.character_sort ASC ";

															//echo $sqlSco_3;
															$rowSco_3 = row_array($sqlSco_3);
														?>
														
														<th width="50" colspan="<?php echo $rowSco_3['CC3'];?>" align="center" bgcolor="#c5e0b3">
															<?php echo $rowSco_3['character_cat_name'];?>
														
														</th>

                                                        <th width="50" bgcolor="#c5e0b3"> &nbsp; </th>
                                                    </tr>

                                                     <tr>
                                                        <th width="30"> ลำดับ </th>
														<th width="50"> รหัส </th>
                                                        <th> รายชื่อ </th>
														<th width="100"> ชื่อเล่น </th>
														<?php
															$sqlSco_1 = "SELECT * FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '1') ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco_1;
															$rowSco_1 = result_array($sqlSco_1);

                                                           
															foreach ($rowSco_1 as $_rowSco_1) { 
														?>
														
                                                        <th width="50" align="center" bgcolor="#9cc2e5">
															
                                                            <div><a  title="<?php echo $_rowSco_1['character_sort'];?>.&nbsp;<?php echo $_rowSco_1['character_name'];?>" class="badge badge-primary p-1" data-toggle="modal" data-target="#AddRate<?php echo $_rowSco_1['character_id'];?>" ><i class="icon-file-text3"></i></a></div>
                                                        
                                                            <!--<a href="ajax/get_addrate_character.php?id=<?php echo $_rowSco_1['character_id'];?>&clid=<?php echo $cid;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco_1['character_id'];?>" data-target="#AddRate" class="btn btn-sm blue" title="<?php echo $_rowSco_1['character_sort'];?>.&nbsp;<?php echo $_rowSco_1['character_name'];?>">
																<i class="fa fa-file-text-o"></i> </a>-->
														
														</th>




														<?php } ?>

														<th width="50" bgcolor="#9cc2e5"> คะแนนเต็ม </th>
														<th width="50" bgcolor="#9cc2e5"> คะแนน % </th>
														<th width="50" bgcolor="#9cc2e5"> การแปลผล </th>
														<th width="50" bgcolor="#9cc2e5"> แปลผลตัวเลข </th>

														<?php
															$sqlSco_2 = "SELECT * FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '2') ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco_2;
															$rowSco_2 = result_array($sqlSco_2);

															foreach ($rowSco_2 as $_rowSco_2) { 
														?>
														<th width="50" align="center" bgcolor="#c8c6c6">
															
                                                            <div><a  title="<?php echo $_rowSco_2['character_sort'];?>.&nbsp;<?php echo $_rowSco_2['character_name'];?>" class="badge badge-primary p-1" data-toggle="modal" data-target="#AddRate2<?php echo $_rowSco_2['character_id'];?>" ><i class="icon-file-text3"></i></a></div>
                                                        
                                                            <!--<a href="ajax/get_addrate_character.php?id=<?php echo $_rowSco_2['character_id'];?>&clid=<?php echo $cid;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco_2['character_id'];?>" data-target="#AddRate" class="btn btn-sm blue" title="<?php echo $_rowSco_2['character_sort'];?>.&nbsp;<?php echo $_rowSco_2['character_name'];?>">
																<i class="fa fa-file-text-o"></i> </a>-->
														
														</th>
														<?php } ?>

														<th width="50" bgcolor="#c8c6c6"> รวมคะแนน </th>
														<th width="50" bgcolor="#c8c6c6"> การแปลผล </th>
														<th width="50" bgcolor="#c8c6c6"> แปลผลตัวเลข </th>

														<?php
															$sqlSco_3 = "SELECT * FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '3') ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco_3;
															$rowSco_3 = result_array($sqlSco_3);

															foreach ($rowSco_3 as $_rowSco_3) { 
														?>
														<th width="50" align="center" bgcolor="#c5e0b3">
															
                                                            <div><a  title="<?php echo $_rowSco_3['character_sort'];?>.&nbsp;<?php echo $_rowSco_3['character_name'];?>" class="badge badge-primary p-1" data-toggle="modal" data-target="#AddRate3<?php echo $_rowSco_3['character_id'];?>" ><i class="icon-file-text3"></i></a></div>
                                                            
                                                            <!--<a href="ajax/get_addrate_character.php?id=<?php echo $_rowSco_3['character_id'];?>&clid=<?php echo $cid;?>&check_grade=<?php echo $check_grade;?>&check_term=<?php echo $check_term;?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco_3['character_id'];?>" data-target="#AddRate" class="btn btn-sm blue" title="<?php echo $_rowSco_3['character_sort'];?>.&nbsp;<?php echo $_rowSco_3['character_name'];?>">
																<i class="fa fa-file-text-o"></i> </a>-->
														
														</th>
														<?php } ?>

                                                        <th width="50" bgcolor="#c5e0b3"> สรุป </th>
                                                    </tr>

													<tr>
                                                        <th width="30"> &nbsp; </th>
														<th width="50"> &nbsp; </th>
                                                        <th> &nbsp; </th>
														<th width="100"> &nbsp; </th>
														<?php
															foreach ($rowSco_1 as $_rowSco_1) {  
														?>
														<th width="50" align="center" bgcolor="#9cc2e5">
															<?php echo $_rowSco_1['score_max'];?>
														
														</th>
														<?php $score_max_1 = $score_max_1 + $_rowSco_1['score_max'];?>
														<?php $score_max_100_1 = 100;?>
														<?php } ?>

														<th width="50" bgcolor="#9cc2e5"> <?php echo $score_max_1;?> </th>
														<th width="50" bgcolor="#9cc2e5"> <?php echo $score_max_100_1;?> </th>
														<th width="50" bgcolor="#9cc2e5"> &nbsp; </th>
														<th width="50" bgcolor="#9cc2e5"> &nbsp; </th>

														<?php
															foreach ($rowSco_2 as $_rowSco_2) {  
														?>
														<th width="50" align="center" bgcolor="#c8c6c6">
															<?php echo $_rowSco_2['score_max'];?>
														
														</th>
														<?php $score_max_2 = $score_max_2 + $_rowSco_2['score_max'];?>
														<?php } ?>

														<th width="50" bgcolor="#c8c6c6"> <?php echo $score_max_2;?> </th>
														<th width="50" bgcolor="#c8c6c6"> &nbsp; </th>
														<th width="50" bgcolor="#c8c6c6"> &nbsp; </th>

														<?php
															foreach ($rowSco_3 as $_rowSco_3) {  
														?>
														<th width="50" align="center" bgcolor="#c5e0b3">
															<?php echo $_rowSco_3['score_max'];?>
														
														</th>
														<?php } ?>

                                                        <th width="50" bgcolor="#c5e0b3"> &nbsp; </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php 
													$sql = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$cid}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' ORDER BY b.student_no ASC"; 
													$list = result_array($sql);
												?>
												<?php foreach ($list as $key => $row) { ?>
                                                    <tr>
                                                        <td align="center"><?php echo $key+1;?></td>
                                                        <td align="center"> <?php echo $row['student_id'];?> </td>
														<td><?php echo $row['student_name'];?>&nbsp;<?php echo $row['student_surname'];?>					
														</td>
														<td><?php echo $row['nickname'];?></td>

														<?php
															$sqlSco1 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='1') AND b.classroom_t_id = '{$cid}' AND b.student_id='$row[student_id]' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco1;
															$rowSco1 = result_array($sqlSco1);

															foreach ($rowSco1 as $_rowSco1) { 
														?>
														<td width="50" align="center" bgcolor="#9cc2e5">
															<?php echo $_rowSco1['score'];?>														
														
														</td>
														<?php $sum_score_max_1 = $sum_score_max_1 + $_rowSco1['score'];?>
														<?php $sum_score_max_100_1 = ($sum_score_max_1*$score_max_100_1)/$score_max_1;?>
														<?php 
														if($sum_score_max_100_1 >= 90) {
															$analysis1 = "ดีเยี่ยม";
															$analysis_num1 = "3";

														} else if($sum_score_max_100_1 >= 75) {
															$analysis1 = "ดี";
															$analysis_num1 = "2";

														} else if($sum_score_max_100_1 >= 60) {
															$analysis1 = "ผ่าน";
															$analysis_num1 = "1";

														} else if($sum_score_max_100_1 < 60) {
															$analysis1 = "ไม่ผ่าน";
															$analysis_num1 = "0";

														}			
														?>
														<?php 
															} 
														?>
														<th width="50" bgcolor="#9cc2e5"> <?php echo $sum_score_max_1;?> </th>
														<th width="50" bgcolor="#9cc2e5"> <?php echo $sum_score_max_100_1;?> </th>
														<th width="50" bgcolor="#9cc2e5"> <?php echo $analysis1;?> </th>
														<th width="50" bgcolor="#9cc2e5"> <?php echo $analysis_num1;?> </th>

														<?php 
															$sqlSco2 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='2') AND b.classroom_t_id = '{$cid}' AND b.student_id='$row[student_id]' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco2;
															$rowSco2 = result_array($sqlSco2);

															foreach ($rowSco2 as $_rowSco2) { 
														?>
														<td width="50" align="center" bgcolor="#c8c6c6">
															<?php echo $_rowSco2['score'];?>													
														
														</td>
														<?php $sum_score_max_2 = $sum_score_max_2 + $_rowSco2['score'];?>
														<?php 
														if($sum_score_max_2 >= 90) {
															$analysis2 = "ดีเยี่ยม";
															$analysis_num2 = "3";

														} else if($sum_score_max_2 >= 75) {
															$analysis2 = "ดี";
															$analysis_num2 = "2";

														} else if($sum_score_max_2 >= 60) {
															$analysis2 = "ผ่าน";
															$analysis_num2 = "1";

														} else if($sum_score_max_2 < 60) {
															$analysis2 = "ไม่ผ่าน";
															$analysis_num2 = "0";

														}			
														?>
														<?php 
															} 
														?>

														<th width="50" bgcolor="#c8c6c6"> <?php echo $sum_score_max_2;?> </th>
														<th width="50" bgcolor="#c8c6c6"> <?php echo $analysis2;?> </th>
														<th width="50" bgcolor="#c8c6c6"> <?php echo $analysis_num2;?> </th>

														<?php 

															$sqlSco3 = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE (a.character_cat_id ='3') AND b.classroom_t_id = '{$cid}' AND b.student_id='$row[student_id]' ORDER BY a.character_cat_id ASC, a.character_sort ASC";

															//echo $sqlSco3;
															$rowSco3 = result_array($sqlSco3);

															foreach ($rowSco3 as $_rowSco3) { 
														?>
														<td width="50" align="center" bgcolor="#c5e0b3">
															<?php echo $_rowSco3['score'];?>														
														
														</td>
														<?php $sum_score_max_3 = $_rowSco3['score'];?>														
														<?php 
														if($sum_score_max_3 == '0') {
															$analysis3 = "N/A";

														} else if($sum_score_max_3 == '1') {
															$analysis3 = "ผ่าน";

														} else if($sum_score_max_3 == '2') {
															$analysis3 = "ไม่ผ่าน";

														} 		
														?>
														<?php 
															} 
														?>

														<th width="50" bgcolor="#c5e0b3"> <?php echo $analysis3;?> </th>

                                                    </tr>
													<?php 

													//$score_max_1 = 0;
													//$score_max_2 = 0;

													$sum_score_max_1 = 0;
													$sum_score_max_100_1 = 0;

													$sum_score_max_2 = 0;													
													
													?>

													<?php } ?>

                                                </tbody>
                                            </table>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>
        </div>



<!---->

<!--create_AddRate-->

    <?php
    	$sqlSco_1 = "SELECT * FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '1') ORDER BY a.character_cat_id ASC, a.character_sort ASC";
        $rowSco_1 = result_array($sqlSco_1);
            foreach ($rowSco_1 as $_rowSco_1) { 
                $clid=$cid;
                $sql = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id INNER JOIN tb_classroom_teacher c ON b.classroom_t_id=c.classroom_t_id WHERE a.character_id = '{$id}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.classroom_t_id = '{$clid}'";
                $row = row_array($sql);
                
                ?>
            
                    <div id="AddRate<?php echo $_rowSco_1['character_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="formAddRate<?php echo $_rowSco_1['character_id'];?>" method="post" action="<?php echo $RunLink->Call_Link_System();?>/js_code/character_show/character_show_process.php">
								<div class="modal-header bg-info text-white">
									<div class="modal-title">ระดับคะแนน ห้องเรียน <?php echo $row['classroom_name']; ?> (<?php echo $_rowSco_1['character_sort'];?>.&nbsp;<?php echo $_rowSco_1['character_name'];?>)</div>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<div class="modal-body">
                                    <div class="font-weight-semibold">ระดับชั้น <?php echo $check_grade;?> ห้องเรียน <?php echo $row['classroom_name']; ?></div>
                                    <br>
                                
                                                    <table class="table table-bordered table-striped">
														<thead>
															 <tr bgcolor="#dcdcdc">
																<td  align="center"> ลำดับ </td>
																<td  align="center"> รหัส </td>
																<td align="center"> รายชื่อ </td>
																<td  align="center"> ชื่อเล่น </td>
																<td  align="center">
																<?php echo $_rowSco_1['character_name'];?>
																</td>
															</tr>

														<?php
															if($_rowSco_1['character_id']==12){
																$max = $row['score_max'];
														?>
														<tr>
														<td colspan="5" align="right">1: ผ่าน/Pass , 2: ไม่ผ่าน/Fail</td>
														</tr>
														<?php
														} else {

														?>
															<tr>
															<td colspan="4">&nbsp;</td>
															<td align="center" >
															<?php 
															echo $row['score_max'];
															$max = $row['score_max'];
															?>
															</td>
														</tr>
														<?php
														}

														?>

														

                                                    </thead>
														<tbody>
														<?php 
															$sum_s = 0;					
															
															$sql = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$clid}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status = '1' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' ORDER BY b.student_no ASC"; 
															$list = result_array($sql);
														?>
														<?php foreach ($list as $key => $row) { ?>

															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?>
																</td>
																<td align="left"><?php echo $row['nickname'];?></td>

															<?php													

															$sqlSco = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE a.character_id= '{$_rowSco_1["character_id"]}' AND b.classroom_t_id = '{$clid}' AND b.student_id='$row[student_id]' ORDER BY a.character_sort ASC";

															//echo $sqlSco;
															$listSco = result_array($sqlSco);

															foreach ($listSco as $_sqlSco) { 
															}
															?>
																<td>
																<input id="<?php echo $_sqlSco['character_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $_sqlSco['score']; ?>" min="0" max="<?php echo $max;?>">
																<input type="hidden" name="id[]" id="id" value="<?php echo $_sqlSco['character_detail_id']; ?>">
																</td>
															</tr>

															<?php 							
															} 
															?>

														</tbody>
													</table>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
									<button type="submit" name="but_AddRate<?php echo $_rowSco_1['character_id'];?>" class="btn btn-success">บันทึก</button>
								</div>
                        
    <input type="hidden" name="asid" id="asid" value="<?php echo $_rowSco_1["character_id"]; ?>">
	<input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
	<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
	<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
    <input type="hidden" name="action" id="action" value="create_AddRate">
	<input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $classroom_t_key;?>">
</form>
							</div>
						</div>
					</div>

    <?php   } ?>


<!--create_AddRate END-->



<!--create_AddRate2-->
    <?php
        $sqlSco_2 = "SELECT * FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '2') ORDER BY a.character_cat_id ASC, a.character_sort ASC";
        //echo $sqlSco_2;
        $rowSco_2 = result_array($sqlSco_2);
            foreach ($rowSco_2 as $_rowSco_2) {
                    $clid=$cid;
                    $sql = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id INNER JOIN tb_classroom_teacher c ON b.classroom_t_id=c.classroom_t_id WHERE a.character_id = '{$_rowSco_2['character_id']}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.classroom_t_id = '{$clid}'";
                    //$sql = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id INNER JOIN tb_classroom_teacher c ON b.classroom_t_id=c.classroom_t_id WHERE a.character_id = '{$id}' AND c.teacher_id1 = '{$tid}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.classroom_t_id = '{$clid}'";

                    //echo $sql;
                    $row = row_array($sql);
                ?>   

                    <div id="AddRate2<?php echo $_rowSco_2['character_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="formAddRate2<?php echo $_rowSco_2['character_id'];?>" method="post" action="<?php echo $RunLink->Call_Link_System();?>/js_code/character_show/character_show_process.php">
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ระดับคะแนน ห้องเรียน <?php echo $row['classroom_name']; ?> (<?php echo $_rowSco_2['character_sort'];?>.&nbsp;<?php echo $_rowSco_2['character_name'];?>)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<div class="modal-body">
                                    <div class="font-weight-semibold">ระดับชั้น <?php echo $check_grade;?> ห้องเรียน <?php echo $row['classroom_name']; ?></div>
                                    <br>

                                                    <table class="table table-bordered table-striped">
														<thead>
															 <tr bgcolor="#dcdcdc">
																<td  align="center"> ลำดับ </td>
																<td  align="center"> รหัส </td>
																<td align="center"> รายชื่อ </td>
																<td align="center"> ชื่อเล่น </td>
																<td  align="center">
																<?php echo $_rowSco_2['character_name'];?>
																</td>
															</tr>

														<?php
															if($_rowSco_2['character_id']==12){
																$max = $row['score_max'];
														?>
														<tr>
														<td colspan="5" align="right">1: ผ่าน/Pass , 2: ไม่ผ่าน/Fail</td>
														</tr>
														<?php
														} else {

														?>
															<tr>
															<td colspan="4">&nbsp;</td>
															<td align="center">
															<?php 
															echo $row['score_max'];
															$max = $row['score_max'];
															?>
															</td>
														</tr>
														<?php
														}

														?>

														

                                                </thead>
														<tbody>
														<?php 
															$sum_s = 0;					
															
															$sql = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$clid}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status = '1' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' ORDER BY b.student_no ASC"; 
															$list = result_array($sql);
														?>
														<?php foreach ($list as $key => $row) { ?>

															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?>
																</td>
																<td align="left"><?php echo $row['nickname'];?></td>

															<?php													

															$sqlSco = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE a.character_id= '{$_rowSco_2['character_id']}' AND b.classroom_t_id = '{$clid}' AND b.student_id='$row[student_id]' ORDER BY a.character_sort ASC";

															//echo $sqlSco;
															$listSco = result_array($sqlSco);

															foreach ($listSco as $_sqlSco) { 
															}
															?>
																<td>
																<input id="<?php echo $_sqlSco['character_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $_sqlSco['score']; ?>" min="0" max="<?php echo $max;?>">
																<input type="hidden" name="id[]" id="id" value="<?php echo $_sqlSco['character_detail_id']; ?>">
																</td>
															</tr>

															<?php 							
															} 
															?>

														</tbody>
													</table>


								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" name="but_AddRate2<?php echo $_rowSco_2['character_id'];?>" class="btn btn-success">บันทึก</button>
								</div>
    <input type="hidden" name="asid" id="asid" value="<?php echo $_rowSco_2["character_id"]; ?>">
	<input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
	<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
	<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
    <input type="hidden" name="action" id="action" value="create_AddRate2">
	<input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $classroom_t_key;?>">             
</form>
							</div>
						</div>
					</div>

    <?php   } ?>


<!--create_AddRate2 END-->

<!--create_AddRate3-->
    <?php
        $sqlSco_3 = "SELECT * FROM tb_character a INNER JOIN tb_character_category b ON a.character_cat_id=b.character_cat_id WHERE (a.character_cat_id = '3') ORDER BY a.character_cat_id ASC, a.character_sort ASC";
        //echo $sqlSco_3;
        $rowSco_3 = result_array($sqlSco_3);
            foreach ($rowSco_3 as $_rowSco_3) { 
				$clid=$cid;
				$sql = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id INNER JOIN tb_classroom_teacher c ON b.classroom_t_id=c.classroom_t_id WHERE a.character_id = '{$_rowSco_3['character_id']}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.classroom_t_id = '{$clid}'";
				//$sql = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id INNER JOIN tb_classroom_teacher c ON b.classroom_t_id=c.classroom_t_id WHERE a.character_id = '{$id}' AND c.teacher_id1 = '{$tid}' AND c.grade_id = '{$check_grade}' AND c.term_id = '{$check_term}'  AND b.classroom_t_id = '{$clid}'";

				//echo $sql;
				$row = row_array($sql);
				?>

                    <div id="AddRate3<?php echo $_rowSco_3['character_id'];?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
<form name="formAddRate3<?php echo $_rowSco_3['character_id'];?>" method="post" action="<?php echo $RunLink->Call_Link_System();?>/js_code/character_show/character_show_process.php">
								<div class="modal-header bg-info text-white">
									<h6 class="modal-title">ระดับคะแนน ห้องเรียน <?php echo $row['classroom_name']; ?> (<?php echo $_rowSco_3['character_sort'];?>.&nbsp;<?php echo $_rowSco_3['character_name'];?>)</h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<div class="modal-body">
									<div class="font-weight-semibold">ระดับชั้น <?php echo $check_grade;?> ห้องเรียน <?php echo $row['classroom_name']; ?></div>
									<br>

													<table class="table table-bordered table-striped">
														<thead>
															 <tr bgcolor="#dcdcdc">
																<td align="center"> ลำดับ </td>
																<td align="center"> รหัส </td>
																<td align="center"> รายชื่อ </td>
																<td align="center"> ชื่อเล่น </td>
																<td align="center">
																<?php echo $row['character_name'];?>
																</td>
															</tr>

														<?php
															if(($_rowSco_3['character_id']==12)){
																$max = $row['score_max'];
														?>
														<tr>
														<td colspan="5" align="right">1: ผ่าน/Pass , 2: ไม่ผ่าน/Fail</td>
														</tr>
														<?php
														} else {

														?>
															<tr>
															<td colspan="4">&nbsp;</td>
															<td align="center">
															<?php 
															echo $row['score_max'];
															$max = $row['score_max'];
															?>
															</td>
														</tr>
														<?php
														}

														?>

														

                                                </thead>
														<tbody>
														<?php 
															$sum_s = 0;					
															
															$sql = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$clid}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status = '1' AND a.term_id = '{$check_term}' AND a.grade_id = '{$check_grade}' ORDER BY b.student_no ASC"; 
															$list = result_array($sql);
														?>
														<?php foreach ($list as $key => $row) { ?>

															<tr>
																<td align="center"><?php echo $row['student_no'];?></td>
																<td align="center"><?php echo $row['student_id'];?></td>
																<td align="left"><?php echo  $row['student_name']; ?>&nbsp;<?php echo  $row['student_surname']; ?>
																</td>
																<td align="left"><?php echo $row['nickname'];?></td>

															<?php													

															$sqlSco = "SELECT * FROM tb_character a INNER JOIN tb_character_detail b ON a.character_id=b.character_id WHERE a.character_id= '{$_rowSco_3['character_id']}' AND b.classroom_t_id = '{$clid}' AND b.student_id='{$row['student_id']}' ORDER BY a.character_sort ASC";

															//echo $sqlSco;
															$listSco = result_array($sqlSco);

															foreach ($listSco as $_sqlSco) { 
															}
															?>
																<td>
																<input id="<?php echo $_sqlSco['character_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $_sqlSco['score']; ?>" min="0" max="<?php echo $max;?>">
																<input type="hidden" name="id[]" id="id" value="<?php echo $_sqlSco['character_detail_id']; ?>">
																</td>
															</tr>

															<?php 							
															} 
															?>

														</tbody>
													</table>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
									<button type="submit" name="sub_AddRate3<?php echo $_rowSco_3['character_id'];?>" class="btn btn-success">บันทึก</button>
								</div>
	<input type="hidden" name="asid" id="asid" value="<?php echo $_rowSco_3["character_id"]; ?>">
	<input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
	<input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
	<input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
    <input type="hidden" name="action" id="action" value="create_AddRate3">
	<input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $classroom_t_key;?>"> 
</form>                                
							</div>
						</div>
					</div>

    <?php   }  ?>
<!--create_AddRate3 END-->






    </div>


    <?php   }else{}
        }
    ?>