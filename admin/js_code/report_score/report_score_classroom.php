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

include("../../config/connect.ini.php");
include("../../config/fnc.php");

include("../../structure/link.php");
$RunLink = new link_system();

check_login('admin_username_lcm', 'login.php');

?>

<?php
$cy_key = filter_input(INPUT_POST, 'cy_key');
$cg_key = filter_input(INPUT_POST, 'cg_key');

if ((isset($cy_key, $cg_key))) {

    if (!is_null($cy_key)) {
        $sql = "SELECT * FROM tb_term WHERE year = '{$cy_key}' AND grade_id = '{$cg_key}' ORDER BY year DESC , term DESC";
        $row = row_array($sql);
        $ct_key = $row['term_id'];
    } else {
        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$cg_key}' ORDER BY year DESC , term DESC";
        $row = row_array($sql);
        $ct_key = $row['term_id'];
    }

?>

    <select class="form-control select" name="classroom" id="classroom" data-placeholder="เลือกห้องเรียน..." required="required">
        <option></option>
        <optgroup label="เลือกห้องเรียน">
            <?php
            $sql = "SELECT * 
                FROM tb_classroom_teacher 
                WHERE grade_id = '{$cg_key}' 
                AND term_id = '{$ct_key}'  
                ORDER BY classroom_name ASC";
            $cc = result_array($sql);
            ?>
            <?php foreach ($cc as $_cc) { ?>

                <option value="<?php echo $_cc["classroom_t_id"]; ?>"><?php echo $_cc['classroom_name']; ?></option>

            <?php } ?>
        </optgroup>
    </select>

<?php   } else {
} ?>