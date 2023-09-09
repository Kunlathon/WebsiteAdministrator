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

<?php include '../../config/connect.ini.php'; ?>
<?php include '../../config/fnc.php'; ?>

<?php check_login('admin_username_lcm', 'login.php'); ?>

<?php
$aid = check_session("admin_id_lcm");
$update_date = date('Y-m-d H:i:s');
$action = filter_input(INPUT_POST, 'action');
if (($action == "create")) {

    $name = filter_input(INPUT_POST, 'name');
    $ename = filter_input(INPUT_POST, 'ename');
    $grade = filter_input(INPUT_POST, 'grade');
    $cy = filter_input(INPUT_POST, 'cy');
    $note = filter_input(INPUT_POST, 'note');

    function fnc_count($cy, $name)
    {
        $s = "SELECT * FROM tb_course WHERE course_year = '$cy' AND course_name = '$name'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }


    $check = fnc_count($cy, $name);

    if (($check)) {

        $sqlT = "SELECT *,MAX(course_id) AS ID , MAX(course_sort) AS SORT FROM tb_course";
        $tcrT = row_array($sqlT);

        $C_ID = $tcrT['ID'] + 1;
        $C_SORT = $tcrT['SORT'] + 1;

        $data = array(
            "course_id" => $C_ID,
            "course_name" => $name,
            "course_name_eng" => $ename,
            "grade_id" => $grade,
            "course_year" => $cy,
            "memo" => $note,
            "course_sort" => $C_SORT,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "course_status" => 1,
        );
        insert("tb_course", $data);
        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif (($action == "create_subject")) {

    $course_key = filter_input(INPUT_POST, 'course_key');
    $subjectid = filter_input(INPUT_POST, 'subjectid');

    function fnc_count_subject($course_key, $subjectid)
    {
        $s = "SELECT * FROM tb_course_detail WHERE course_id = '$course_key' AND subject_id = '$subjectid'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }


    $check = fnc_count_subject($course_key, $subjectid);

    if (($check)) {

        $sqlT = "SELECT *,MAX(course_detail_id) AS ID FROM tb_course_detail";
        $tcrT = row_array($sqlT);

        $C_ID = $tcrT['ID'] + 1;

        $sqlS = "SELECT *,MAX(sort) AS SORT FROM tb_course_detail WHERE course_id = '$course_key'";
        $tcrS = row_array($sqlS);

        $C_SORT = $tcrS['SORT'] + 1;

        $sqlS = "SELECT * FROM tb_subject WHERE subject_id='$subjectid'";
        $rowS = row_array($sqlS);

        $data = array(
            "course_id" => $course_key,
            "subject_id" => $subjectid,
            "subject_code" => $rowS['subject_code'],
            "subject_name" => $rowS['subject_name'],
            "subject_name_eng" => $rowS['subject_name_eng'],
            "unit" => $rowS['unit'],
            "weight" => $rowS['weight'],
            "subt_id" => $rowS['subt_id'],
            "grade_id" => $rowS['grade_id'],
            "sort" => $C_SORT,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "course_detail_status" => 1,

        );

        insert("tb_course_detail", $data);

        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif (($action == "update")) {

    $name = filter_input(INPUT_POST, 'name');
    $ename = filter_input(INPUT_POST, 'ename');
    $grade = filter_input(INPUT_POST, 'grade');
    $cy = filter_input(INPUT_POST, 'cy');
    $note = filter_input(INPUT_POST, 'note');
    $course_key = filter_input(INPUT_POST, 'course_key');

    $data = array(
        "course_name" => $name,
        "course_name_eng" => $ename,
        "grade_id" => $grade,
        "course_year" => $cy,
        "memo" => $note,
        "admin_id" => $aid,
        "admin_update" => $update_date
    );

    update("tb_course", $data, "course_id = '{$course_key}'");
    echo "no_error";
} elseif (($action == "delete")) {
    $course_key = filter_input(INPUT_POST, 'course_key');
    $table = "tb_course";
    $ff = "course_id";
    delete($table, "{$ff} = '{$course_key}'");

    // Delete tb_course_detail
    $sqlTerD = "SELECT * FROM tb_course_detail WHERE course_id='{$course_key}'";
    $listTerD = result_array($sqlTerD);

    $tableTerD = "tb_course_detail";

    foreach ($listTerD as $key => $rowTerD) {
        $course_d_id = $rowTerD['course_detail_id'];
        delete($tableTerD, "course_detail_id = '{$course_d_id}'");
    }


    echo "no_error";
} elseif (($action == "delete_course_detail")) {
    // Delete tb_course_detail
    $course_detail_key = filter_input(INPUT_POST, 'course_detail_key');
    $table = filter_input(INPUT_POST, 'table');
    $ff = filter_input(INPUT_POST, 'ff');

    delete($table, "{$ff} = '{$course_detail_key}'");

    echo "no_error";
} elseif (($action == "course_no")) {
    $course_key = filter_input(INPUT_POST, 'course_key');
    $course_detail_key = filter_input(INPUT_POST, 'course_detail_key');
    $sort = filter_input(INPUT_POST, 'sort');

    $data = array(
        "sort" => $sort

    );

    update("tb_course_detail", $data, "course_id = '{$course_key}' AND course_detail_id = '{$course_detail_key}'");

    echo "no_error";
} elseif (($action == "update_subject")) {

    // $subject_key = filter_input(INPUT_POST, 'subject_key');
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $ename = filter_input(INPUT_POST, 'ename');
    $unit = filter_input(INPUT_POST, 'unit');
    $weight = filter_input(INPUT_POST, 'weight');
    $subt = filter_input(INPUT_POST, 'subt');
    $grade = filter_input(INPUT_POST, 'grade');
    $course_key = filter_input(INPUT_POST, 'course_key');
    $course_detail_key = filter_input(INPUT_POST, 'course_detail_key');

    if (($subt == 4)) {
        $weight = 0;
    } else {
        $weight = $unit / 40;
    }

    $data = array(
        "subject_code" => $code,
        "subject_name" => $name,
        "subject_name_eng" => $ename,
        "unit" => $unit,
        "weight" => $weight,
        "subt_id" => $subt,
        "grade_id" => $grade,
        "admin_id" => $aid,
        "admin_update" => $update_date,
    );

    update("tb_course_detail", $data, "course_detail_id = '$course_detail_key'");

    echo "no_error";

} elseif (($action == "subject_level")) {

    $level = filter_input(INPUT_POST, 'level');
    $course_key = filter_input(INPUT_POST, 'course_key');
    $course_detail_key = filter_input(INPUT_POST, 'course_detail_key');

    $sqlT = "SELECT *,MAX(course_level_id) AS ID FROM tb_course_level";
    $tcrT = row_array($sqlT);

    $C_ID = $tcrT['ID'] + 1;

    $sqlS = "SELECT *,MAX(sort) AS SORT FROM tb_course_level";
    $tcrS = row_array($sqlS);


    $S_SORT = $tcrS['SORT'] + 1;

    $data = array(
            "course_level_id" => $C_ID ,
            "course_detail_id" => $course_detail_key ,
            "course_level_name" => $level ,
            "sort" => $S_SORT ,
            "admin_id" => $aid ,
            "admin_update" => $update_date,
            "course_level_status" => 1
    );

    insert("tb_course_level", $data);

    echo "no_error";
} elseif (($action == "delete_course_level")) {
    $course_level_key = filter_input(INPUT_POST, 'course_level_key');
    $table = "tb_course_level";
    $ff = "course_level_id";
    delete($table, "{$ff} = '{$course_level_key}'");

    echo "no_error";
} else {
}
?>


