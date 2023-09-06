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
?>

<?php
    error_reporting(E_ALL ^ E_NOTICE);
    if((preg_match("/teacher_all.php/", $_SERVER['PHP_SELF']))) {
        Header("Location:../index.php");
        die();
    }else{
        if((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        $teacher_key=filter_input(INPUT_POST,'teacher_key');;
            if((!is_null($teacher_key))){
                
                $sql = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$teacher_key}'";
                $row = row_array($sql);
                
                ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                    <a href="?modules=teacher_all" class="breadcrumb-item"> ประวัติส่วนตัว</a>

                    <a href="#" class="breadcrumb-item"> ประวัติส่วนตัวครู : </a>

                </div>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="row">
            <div class="col-<?php echo $grid; ?>-12">

                <table >
                    <tr>
                        <td>
                            <div>
                                <form name="" id="" accept-charset="utf-8" method="post" action="">
                                    <button type="button" name="profile_teacher_read" id="profile_teacher_read" class="btn btn-outline-secondary" value="read">ประวัติส่วนตัว</button>                                    
                                </form>
                            </div>
                        </td>
                        <td>
                            <div>
                                <form name="profile_teacher_form_up" id="profile_teacher_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teacher_all">
                                    <button type="submit" name="profile_teacher_update" id="profile_teacher_update" class="btn btn-outline-success" value="">แก้ไขประวัติส่วนตัว</button>  
                                    <input type="hidden" name="teacher_key"  value="<?php echo $teacher_key;?>"> <input type="hidden" name="manage"  value="form_edit">                                 
                                </form>
                            </div>
                        </td>
                            <td>
                                <div>
                                    <form name="" id="" accept-charset="utf-8" method="post" action="">
                                        <button type="button" name="profile_teacher_img" id="profile_teacher_img" class="btn btn-outline-info" value="img">เปลี่ยนรูป</button>                                        
                                    </form>
                                </div>
                            </td>
                    </tr>
                </table>
            </div>
        </div><br>

        <div class="row">
            <div class="col-<?php echo $grid; ?>-12">
                <h4><?php echo @$row['teacher_name']." ".@$row['teacher_surname'];?></h4>
            </div>
        </div><br>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-info">
			        <div class="card-header header-elements-inline bg-info text-white">
				        <h6 class="card-title">ประวัติส่วนตัว</h6>
			        </div>

			        <div class="card-body">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">Username : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['teacher_username'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">เลขที่บัตรประชาชน : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['teacher_idcard'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">ชื่อ-นามสกุล : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['teacher_name'];?>&nbsp;<?php echo @$row['teacher_surname'];?>&nbsp;(<?php echo @$row['nickname'];?>)</div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">Name-Surname :</div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['teacher_name_eng'];?>&nbsp;<?php echo @$row['teacher_surname_eng'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">เพศ : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo teacher_gender(@$row['gender']);?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">ศาสนา : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['religion'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">เชื้อชาติ : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['race'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">สัญชาติ : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['nationality'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">วันเดือนปีเกิด : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo date_full_th(@$row['birth_day']);?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">สถานที่เกิด : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;">
                                <?php
                                    if((is_null($row['birthplace']))){
                                        echo "-";
                                    }else{
                                        echo @$row['birthplace'];
                                    }
                                ?>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">สถานภาพ : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo marital_status(@$row['marital_status']);?></div>
                        </div>

    
    <?php
        $sqlTc = "SELECT * FROM  `tb_teacher_section` WHERE `teacher_section_id` = '{@$row[teacher_section_id]}'";
        $Tc = row_array($sqlTc);
    ?>                    

                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">ตำแหน่ง :</div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['position'];?></div>
                        </div> 
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">แผนก : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$Tc['teacher_section_name'];?></div>
                        </div>                                                                        
			        </div>
			    </div>
            </div>            
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-info">
			        <div class="card-header header-elements-inline bg-info text-white">
				        <h6 class="card-title">วุฒิการศึกษา</h6>
			        </div>

			        <div class="card-body">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">วุฒิการศึกษา : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['education_name'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">สาขา : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['major_name'];?></div>
                        </div>                                                                 
			        </div>
			    </div>
            </div>            
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-info">
			        <div class="card-header header-elements-inline bg-info text-white">
				        <h6 class="card-title">ที่อยู่ตามทะเบียนบ้าน</h6>
			        </div>

			        <div class="card-body">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">ที่อยู่ : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['teacher_address'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">เบอร์โทรศัพท์มือถือ : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['mobile'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-2" style="font-size: 16px;">อีเมล์ : </div>
                            <div class="col-<?php echo $grid;?>-10" style="font-size: 16px; color:DodgerBlue;"><?php echo @$row['email'];?></div>
                        </div>                                                                  
			        </div>
			    </div>
            </div>            
        </div>

    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{

            } ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }
?>