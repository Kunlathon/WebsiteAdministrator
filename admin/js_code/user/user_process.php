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
    $aid = check_session("admin_id_lcm");
    $update_date = date('Y-m-d H:i:s');
    $image_date=date("YmdHis");
    $now_date = date('Y-m-d');
    $action = filter_input(INPUT_POST, 'action'); 

        if(($action=="create")){

            $count_error=0;
                if((isset($_POST["name"]))){
                    $name=filter_input(INPUT_POST, 'name');
                    $count_error=$count_error+0;
                }else{
                    $name=null;
                    $count_error=$count_error+1;
                }
                if((isset($_POST["surname"]))){
                    $surname=filter_input(INPUT_POST, 'surname');
                    $count_error=$count_error+0;
                }else{
                    $surname=null;
                    $count_error=$count_error+1;
                }
                if((isset($_POST["username"]))){
                    $username=filter_input(INPUT_POST, 'username');
                    $count_error=$count_error+0;
                }else{
                    $username=null;
                    $count_error=$count_error+1;
                }
                if((isset($_POST["password"]))){
                    $password=filter_input(INPUT_POST, 'password');
                    $count_error=$count_error+0;
                }else{
                    $password=null;
                    $count_error=$count_error+1;
                }
                if((isset($_POST["tel"]))){
                    $tel=filter_input(INPUT_POST, 'tel');
                    $count_error=$count_error+0;
                }else{
                    $tel=null;
                    $count_error=$count_error+1;
                }
                if((isset($_POST["email"]))){
                    $email=filter_input(INPUT_POST, 'email');
                    $count_error=$count_error+0;
                }else{
                    $email=null;
                    $count_error=$count_error+1;
                }
                if((isset($_POST["type"]))){
                    $type=filter_input(INPUT_POST, 'type');
                    $count_error=$count_error+0;
                }else{
                    $type=null;
                    $count_error=$count_error+1;
                }
            
                if(($count_error>=1)){
                    echo "Error_Null";
                }else{

                    function fnc_count($username) {
                        $s = "SELECT * FROM tb_admin WHERE admin_username = '{$username}'";
                        $q = row_array($s);
                        return is_array($q) ? "0" : "1";
                    }

                    $pass = md5($password);
                    $check = fnc_count($username);

                    if($check){

                        $sqlAdm = "SELECT *,MAX(admin_id) AS ID FROM tb_admin";
                        $tcrAdm = row_array($sqlAdm);
                
                        $Adm_ID = $tcrAdm['ID'] + 1;

                        $data = array(
                            "admin_id" => $Adm_ID ,
                            "admin_name" => $name ,
                            "admin_lastname" => $surname ,
                            "admin_username" => $username ,
                            "admin_password" => $pass ,
                            "admin_tel" => $tel ,
                            "admin_email" => $email ,
                            "admin_date" => $now_date  ,
                            "admin_update" => $now_date  ,
                            "admin_status" => $type
                            
                        );
                
                        insert("tb_admin", $data);
                        echo "NotError";
                    }else{
                        echo "Error";
                    }

                }

        }elseif(($action=="delete")){
            $count_error=0;

            if((isset($_POST["admin_id"]))){
                $admin_id=filter_input(INPUT_POST, 'admin_id');
                $count_error=$count_error+0;
            }else{
                $admin_id=null;
                $count_error=$count_error+1;
            }
    
            if((isset($_POST["table"]))){
                $table=filter_input(INPUT_POST, 'table');
                $count_error=$count_error+0;
            }else{
                $table=null;
                $count_error=$count_error+1;
            }
    
            if((isset($_POST["ff"]))){
                $ff=filter_input(INPUT_POST, 'ff');
                $count_error=$count_error+0;
            }else{
                $ff=null;
                $count_error=$count_error+1;
            }
    
            if(($count_error>=1)){
                echo "Error";
            }else{
                delete($table,"{$ff} = '{$admin_id}'");
                echo "NotError";
            }
        }else{}

?>