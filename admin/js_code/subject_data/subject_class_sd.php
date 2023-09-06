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
<?php include '../../config/connect.ini.php';
include '../../config/fnc.php';

include("../../structure/link.php");
$RunLink = new link_system(); ?>

<?php check_login('admin_username_aba', 'login.php'); ?>

    <?php
        $copy_grade= filter_input(INPUT_POST, 'class_id');
    ?>

                                <select class="form-control select" name="classSD" id="classSD" data-placeholder="ระดับชั้น..." required="required">
                                    <option></option>
                                    <optgroup label="ระดับชั้น">
                                        <?php
                                        $classSD_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` FROM `tb_grade` ORDER BY `grade_id` ASC";
                                        $classSD_Row = result_array($classSD_Sql);
                                        foreach ($classSD_Row as $key => $classSD_Print) {
                                            if ((is_array($classSD_Print) && count($classSD_Print))) {
                                                    if(($classSD_Print["grade_id"]==$copy_grade)){
                                                        $cg_selected='selected="selected"';
                                                    }else{
                                                        $cg_selected=null;
                                                    }
                                                ?>
                                                <option value="<?php echo $classSD_Print["grade_id"]; ?>" <?php echo $cg_selected;?>><?php echo $classSD_Print["grade_name"]; ?></option>
                                        <?php       } else {
                                            }
                                        } ?>
                                    </optgroup>
                                </select>