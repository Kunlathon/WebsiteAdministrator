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

<?php check_login('admin_username_aba', 'login.php'); ?>

<?php
$aid = check_session("admin_id_aba");
$update_date = date('Y-m-d H:i:s');
$action = filter_input(INPUT_POST, 'action');
if (($action == "create")) {

    $classroom = filter_input(INPUT_POST, 'classroom');
    $grade = filter_input(INPUT_POST, 'grade');
    $student_key = filter_input(INPUT_POST, 'student_key');

    $data = array(
        "student_class" => $classroom,
        "grade_id" => $grade,
        "admin_id" => $aid,
        "admin_update" => $update_date,
        "student_status" => 1
    );

    update("tb_student", $data, "student_id = {$student_key}");
    echo "no_error";
} elseif (($action == "update")) {
    @$idcard = filter_input(INPUT_POST, 'idcard');
    @$name = filter_input(INPUT_POST, 'name');
    @$surname = filter_input(INPUT_POST, 'surname');
    @$ename = filter_input(INPUT_POST, 'ename');
    @$esurname = filter_input(INPUT_POST, 'esurname');
    @$gender = filter_input(INPUT_POST, 'gender');

    @$datein = filter_input(INPUT_POST, 'datein');
    if (($datein != null)) {
        $datein = date("Y-m-d", strtotime($datein));
    } else {
    }

    @$username = filter_input(INPUT_POST, 'username');
    @$student_key = filter_input(INPUT_POST, 'student_key');
    @$grade = filter_input(INPUT_POST, 'grade');
    @$classroom = filter_input(INPUT_POST, 'classroom');
    @$nickname = filter_input(INPUT_POST, 'nickname');
    @$status = filter_input(INPUT_POST, 'status');

    if ($status == 1) {

        $data = array(
            "student_idcard" => $idcard, "student_class" => $classroom, "student_name" => $name, "student_surname" => $surname, "student_name_eng" => $ename, "student_surname_eng" => $esurname, "nickname" => $nickname, "gender" => $gender, "grade_id" => $grade, "date_in" => $datein, "admin_id" => $aid, "admin_update" => $update_date, "student_status" => $status
        );
    } else {

        $dateout = date('Y-m-d');
        $data = array(
            "student_idcard" => $idcard, "student_class" => $classroom, "student_name" => $name, "student_surname" => $surname, "student_name_eng" => $ename, "student_surname_eng" => $esurname, "nickname" => $nickname, "gender" => $gender, "grade_id" => $grade, "date_out" => $dateout, "admin_id" => $aid, "admin_update" => $update_date, "student_status" => $status
        );
    }

    update("tb_student", $data, "student_id = '{$student_key}'");

    echo "no_error";
} elseif (($action == "delete")) {
} elseif (($action == "password")) {
} else {
}
?>