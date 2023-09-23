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

<?php check_login('admin_username_lcm', 'student_resign_process.php'); ?>

<?php
$aid = check_session("admin_id_lcm");
$update = date('Y-m-d H:i:s');
$action = filter_input(INPUT_POST, 'action');
	if(($action=="update")){
		
		@$idcard = filter_input(INPUT_POST, 'idcard');
		@$name = filter_input(INPUT_POST, 'name');
		@$surname = filter_input(INPUT_POST, 'surname');
		@$ename = filter_input(INPUT_POST, 'ename');
		@$esurname = filter_input(INPUT_POST, 'esurname');
		@$gender = filter_input(INPUT_POST, 'gender');
		@$birthday = filter_input(INPUT_POST, 'birthday');
		
    if (($birthday != null)) {
        $birthday = date("Y-m-d", strtotime($birthday));
    } else {
    }

    @$username = filter_input(INPUT_POST, 'username');
    @$student_key = filter_input(INPUT_POST, 'student_key');
    @$password = filter_input(INPUT_POST, 'password');
    @$grade = filter_input(INPUT_POST, 'grade');
    @$classroom = filter_input(INPUT_POST, 'classroom');
    @$nickname = filter_input(INPUT_POST, 'nickname');
    @$status = filter_input(INPUT_POST, 'status');

    if (($status == 2)) {

        $dateout = date('Y-m-d');
        $data = array(
            "student_idcard" => $idcard, "student_class" => $classroom, "student_name" => $name, "student_surname" => $surname, "student_name_eng" => $ename, "student_surname_eng" => $esurname, "nickname" => $nickname, "gender" => $gender, "birth_day" => $birthday, "grade_id" => $grade, "date_out" => $dateout, "admin_id" => $aid, "admin_update" => $update, "student_status" => $status
        );
    } else {

        $data = array(
            "student_idcard" => $idcard, "student_class" => $classroom, "student_name" => $name, "student_surname" => $surname, "student_name_eng" => $ename, "student_surname_eng" => $esurname, "nickname" => $nickname, "gender" => $gender, "birth_day" => $birthday, "grade_id" => $grade, "admin_id" => $aid, "admin_update" => $update, "student_status" => $status
        );
    }

    update("tb_student", $data, "student_id = '$student_key'");
    echo "no_error";
	
	}else{}
?>