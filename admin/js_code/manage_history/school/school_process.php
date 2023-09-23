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
    $sid=filter_input(INPUT_POST, 'sid');

        if(($action=="change_picture")){


            $school_name=date('YmdHis')."_school";
      
            //$update_file_time = date("Y_m_d_H_i_s", strtotime($update));

            $picture_name = $_FILES["change_picture"]["name"];
            $picture_type = $_FILES["change_picture"]["type"];
            //new file Name
            $imgFile = explode('.', $picture_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end
            $picture_new_name = $school_name.".".$fileType;
            $picture_tmp = $_FILES["change_picture"]["tmp_name"];
            $picture_size = $_FILES["change_picture"]["size"];
            move_uploaded_file($picture_tmp, '../../uploads/school_picture/' . $picture_new_name);

            $data = array(
                "school_img" => $picture_new_name 
            );
            update("tb_school", $data,"school_id = {$sid}");

            exit("<script>window.location='../../?modules=school&manage=change_picture';</script>");

        }else{}

?>