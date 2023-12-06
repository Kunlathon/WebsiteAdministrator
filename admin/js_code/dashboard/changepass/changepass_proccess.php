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

if(($action=="password")){

    @$password=filter_input(INPUT_POST, 'password');
    @$admin_key=filter_input(INPUT_POST, 'admin_key');
    $now_date = date('Y-m-d');
    
    $pass = md5($password);

    $data = array(
			"admin_password" => $pass ,
			"admin_update" => $now_date);

    update("tb_admin", $data, "admin_id = '{$admin_key}'");
    
    echo "no_error";

}else{}
?>