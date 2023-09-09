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

//no_error
//it_error

    include ("../../config/connect.ini.php");
    include ("../../config/fnc.php");
    check_login('admin_username_lcm', 'login.php');

?>

<?php
    $aid = check_session("admin_id_lcm");
    $update = date('Y-m-d H:i:s');
    $action = filter_input(INPUT_POST, 'action');
        
        if(($action=="update")){

            $payment_key= filter_input(INPUT_POST, 'payment_key');
            $term= filter_input(INPUT_POST, 'term');
            $grade= filter_input(INPUT_POST, 'grade');
            $payment_score1= filter_input(INPUT_POST, 'payment_score1');
            $payment_score2= filter_input(INPUT_POST, 'payment_score2');
            $payment_score3= filter_input(INPUT_POST, 'payment_score3');
            $payment_score4= filter_input(INPUT_POST, 'payment_score4');
          
            //echo "payment_key->".$payment_key."payment_score1->".$payment_score1."payment_score2->".$payment_score2."payment_score3->".$payment_score3."payment_score4->".$payment_score4;
            
            $data = array(
                "payment_score1" => $payment_score1 ,
                "payment_score2" => $payment_score2 ,
                "payment_score3" => $payment_score3 ,
                "payment_score4" => $payment_score4
            );
    
            update("tb_payment", $data, "payment_id = '{$payment_key}'");

            echo "no_error";

        }elseif(($action=="delete")){

            $payment_key=filter_input(INPUT_POST, 'payment_key');
            $table=filter_input(INPUT_POST, 'table');
            $ff=filter_input(INPUT_POST, 'ff');

            delete($table,"{$ff} = '{$payment_key}'");

            echo "no_error";

        }else{}
?>