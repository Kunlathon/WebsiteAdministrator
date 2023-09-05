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
$update = date('Y-m-d H:i:s');
$action = filter_input(INPUT_POST, 'action');
if (($action=="create")) {
    function fnc_count($username){
    $s = "SELECT * FROM tb_admin WHERE admin_username = '$username'";
    $q = row_array($s);
    return is_array($q) ? "0" : "1";}

    @$name=filter_input(INPUT_POST,'name'); 
    @$surname=filter_input(INPUT_POST,'surname');
    @$username=filter_input(INPUT_POST,'username'); 
    @$password=filter_input(INPUT_POST,'password'); 
    @$tel=filter_input(INPUT_POST,'tel'); 
    @$email=filter_input(INPUT_POST,'email');
    @$type=filter_input(INPUT_POST,'type');
    @$grade=filter_input(INPUT_POST,'grade');

    $now_date = date('Y-m-d');
    $pass = md5($password);
	$check = fnc_count($username);
	
    if(($check)){

		$data = array("admin_name" => $name ,
			          "admin_lastname" => $surname ,
			          "admin_username" => $username ,
                      "admin_password" => $pass ,
                      "admin_tel" => $tel ,
                      "admin_email" => $email ,
                      "grade_id" => $grade ,			
                      "admin_date" => $now_date  ,
                      "admin_update" => $now_date  ,
                      "admin_status" => $type);

		insert("tb_admin", $data);
		echo "no_error";
	}else{
        echo "it_error";
    }	

} elseif (($action == "update")) {

    @$name=filter_input(INPUT_POST,'name'); 
    @$surname=filter_input(INPUT_POST,'surname');
    @$username=filter_input(INPUT_POST,'username'); 
  //@$password=filter_input(INPUT_POST,'password'); 
    @$tel=filter_input(INPUT_POST,'tel'); 
    @$email=filter_input(INPUT_POST,'email');
    @$type=filter_input(INPUT_POST,'type');
    @$grade=filter_input(INPUT_POST,'grade');
    @$status_work=filter_input(INPUT_POST,'status_work');
    @$admin_key=filter_input(INPUT_POST,'admin_key');

    $now_date = date('Y-m-d');
    //$pass = md5($password);

    $data = array("admin_name" => $name ,
                  "admin_lastname" => $surname ,
                  "admin_tel" => $tel ,
                  "admin_email" => $email ,
                  "grade_id" => $grade ,	
                  "admin_update" => $now_date  ,
                  "admin_status" => $type ,	
                  "admin_work" => $status_work);

    update("tb_admin", $data, "admin_id = '{$admin_key}'");
   
    echo "no_error";

}elseif(($action == "delete")) {

    @$table = filter_input(INPUT_POST, 'table');
    @$ff = filter_input(INPUT_POST, 'ff');
    @$admin_key = filter_input(INPUT_POST, 'admin_key');

    delete($table, "{$ff} = '{$admin_key}'");

    echo "no_error";

}elseif(($action=="password")){

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