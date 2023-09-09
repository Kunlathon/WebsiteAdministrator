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
$update = date('Y-m-d H:i:s');
$action = filter_input(INPUT_POST, 'action');
if (($action == "create")) {

    @$name = filter_input(INPUT_POST, 'name');
    @$surname = filter_input(INPUT_POST, 'surname');
    @$gender = filter_input(INPUT_POST, 'gender');
    @$position = filter_input(INPUT_POST, 'position');
    @$section = filter_input(INPUT_POST, 'section');
    //@$ttype =filter_input(INPUT_POST,'ttype');
    //@$tclass =filter_input(INPUT_POST,'tclass');
    //@$tteach =filter_input(INPUT_POST,'tteach');
    @$username = filter_input(INPUT_POST, 'username');
    @$password = filter_input(INPUT_POST, 'password');
    @$type = filter_input(INPUT_POST, 'type');

    function fnc_count($username)
    {
        $s = "SELECT * FROM `tb_teacher` WHERE `teacher_username` = '{$username}'";
        //$s = "SELECT * FROM tb_teacher WHERE teacher_name = '$name' AND teacher_surname = '$surname' AND teacher_username = '$username'";
        $q = row_array($s);
        return is_array($q) ? "0" : "1";
    }

    $check = fnc_count($username);

    if (($check)) {
        $pass = MD5($password);

        $data = array(
            "teacher_section_id" => $section,
            "teacher_username" => $username,
            "teacher_password" => $pass,
            "teacher_name" => $name,
            "teacher_surname" => $surname,
            "gender" => $gender,
            "teacher_type" => $type,
            "teacher_status" => 1,
            "position" => $position
        );

        insert("tb_teacher", $data);
        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif ($action == "update") {

    @$teacher_key = filter_input(INPUT_POST, 'teacher_key');
    @$name = filter_input(INPUT_POST, 'name');
    @$surname = filter_input(INPUT_POST, 'surname');
    @$gender = filter_input(INPUT_POST, 'gender');
    @$position = filter_input(INPUT_POST, 'position');
    @$section = filter_input(INPUT_POST, 'section');
    //@$ttype=filter_input(INPUT_POST,'ttype');
    //@$tclass=filter_input(INPUT_POST,'tclass');
    //@$tteach=filter_input(INPUT_POST,'tteach');
    // @$username=filter_input(INPUT_POST,'username');
    // @$password=filter_input(INPUT_POST,'password');
    @$status_work=filter_input(INPUT_POST,'status_work');
    @$type = filter_input(INPUT_POST, 'type');

    $data = array(
        "teacher_section_id" => $section,
        "teacher_name" => $name,
        "teacher_surname" => $surname,
        "gender" => $gender,
        "teacher_type" => $type,
        "position" => $position,
        "teacher_work" => $status_work

    );

    update("tb_teacher", $data, "teacher_id = '{$teacher_key}'");
    echo "no_error";
} elseif (($action == "password")) {

    @$password = filter_input(INPUT_POST, 'password');
    @$teacher_key = filter_input(INPUT_POST, 'teacher_key');

    $pass = md5($password);
    $data = array(
        "teacher_password" => $pass,
        "admin_id" => $aid,
        "admin_update" => $update
    );
    update("tb_teacher", $data, "teacher_id = '{$teacher_key}'");

    echo "no_error";
} elseif (($action == "delete")) {

    $id = filter_input(INPUT_POST, 'id');
    $table = filter_input(INPUT_POST, 'table');
    $ff = filter_input(INPUT_POST, 'ff');

    delete($table, "{$ff} = '{$id}'");
    echo "no_error";
}elseif(($action=="change_picture")){

    $teacher_key=filter_input(INPUT_POST,'teacher_key');//*
    $teacher_name=date('YmdHis')."_person";

    //$update_file_time = date("Y_m_d_H_i_s", strtotime($update));

    $picture_name = $_FILES["change_picture"]["name"];
    $picture_type = $_FILES["change_picture"]["type"];
    //new file Name
    $imgFile = explode('.', $picture_name);
    $fileType = $imgFile[count($imgFile) - 1];
    //new file Name end
    $picture_new_name = $teacher_name.".".$fileType;
    $picture_tmp = $_FILES["change_picture"]["tmp_name"];
    $picture_size = $_FILES["change_picture"]["size"];
    move_uploaded_file($picture_tmp, '../../uploads/teacher_picture/' . $picture_new_name);


    $data = array(
        "tPic" => $picture_new_name
    );
    update("tb_teacher", $data,"teacher_id = {$teacher_key}");

    $code=base64_encode($teacher_key);

    exit("<script>window.location='../../?modules=person_data&manage=change_picture&teacher_key=$code';</script>");

}else {
    exit("<script>window.location='../../index.php';</script>");
}
?>