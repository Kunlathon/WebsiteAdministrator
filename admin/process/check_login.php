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
    //Email: mpamese.pc2001@gmail.com	

    include("../structure/link.php");
    $RunLink = new link_system();
    //$RunLink->CallLink_System();

    include ("../config/connect.ini.php");
    include ("../config/fnc.php");
    
        $user_username = addslashes(trim($_POST['username']));
        $user_password= addslashes(trim($_POST['password']));
        
        $user_password = md5($user_password);
 
        $sql = "SELECT * FROM tb_admin WHERE admin_username = '{$user_username}' AND admin_password = '{$user_password}' AND admin_status != '0'";
        $result = row_array($sql);
        
            if($result > 0){
                $_SESSION['admin_id_aba'] = $result['admin_id'];
                $_SESSION['admin_username_aba'] = $result['admin_username'];
                $_SESSION['admin_name_aba'] = $result['admin_name'];
                $_SESSION['admin_status_aba'] = $result['admin_status'];
                $_SESSION['admin_lastlogin_aba'] = $result['admin_lastlogin'];
            
                // Add log login
                    $date_now = date('Y-m-d H:i:s');
            
                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet		    
                        $ip=$_SERVER['HTTP_CLIENT_IP'];
                    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy	 
                        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $ip=$_SERVER['REMOTE_ADDR'];
                    }
            
                    $sqlLog = "SELECT *,MAX(log_id) AS ID FROM tb_admin_log";
                    $tcrLog = row_array($sqlLog);
            
                    $Log_ID = $tcrLog['ID'] + 1;
            
                    $data = array(
                        "log_id" => $Log_ID,
                        "admin_id" => $result['admin_id'],
                        "admin_date" => $date_now,
                        "admin_ip" => $ip
                    );
            
                    insert("tb_admin_log",$data);
            
                    $data1 = array(
                        "admin_lastlogin" => $date_now
                    );
            
                    update("tb_admin", $data1, "admin_id = '$result[admin_id]'");
            
                    $_SESSION['admin_nowlogin_aba'] = $date_now;    
            
                //echo"<meta charset='utf-8'/><script>alert('ยินดีต้อนรับ {$_SESSION['admin_name']} เข้าสู่ระบบ!!');location.href='../index.php';</script>";
                //header( "location: ../index.php" );
                    $Error_login="yes";
            }else{
                //echo"<meta charset='utf-8'/><script>alert('ไม่พบข้อมูล!!');location.href='../login.php';</script>";
                $Error_login="no";
            }

            echo $Error_login;
            
    ?>
