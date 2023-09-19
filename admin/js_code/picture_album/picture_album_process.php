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
    $action = filter_input(INPUT_POST, 'action');

        if(($action=="add")){
            $FolderName="albun".$image_date;
            $gallery_name=filter_input(INPUT_POST, 'gallery_name');
            $gallery_topic=filter_input(INPUT_POST, 'gallery_topic');

                if(isset($gallery_name,$gallery_topic)){

                    $IntoFolder="../../../dist/img/gallery/".$FolderName;
                    mkdir("$IntoFolder",0777);

//gallery_thumbnail

                        if(($_FILES["gallery_thumbnail"]["name"]!=null)){

                            $gallery_thumbnail_nameNew=$image_date."_gl";
                            $gallery_thumbnail_name = $_FILES["gallery_thumbnail"]["name"];
                            $gallery_thumbnail_type = $_FILES["gallery_thumbnail"]["type"];

                            //new file Name
                            $imgFile = explode('.', $gallery_thumbnail_name);
                            $fileType = $imgFile[count($imgFile) - 1];
                            //new file Name end

                            $gallery_thumbnail_new_name = $gallery_thumbnail_nameNew.".".$fileType;
                            $gallery_thumbnail_tmp = $_FILES["gallery_thumbnail"]["tmp_name"];
                            $gallery_thumbnail_size = $_FILES["gallery_thumbnail"]["size"];

                            move_uploaded_file($gallery_thumbnail_tmp, '../../../dist/img/gallery/'.$FolderName.'/'. $gallery_thumbnail_new_name);
                            //up image end

                        }else{
                            $gallery_thumbnail_new_name=null;
                        }

//gallery_thumbnail end
//
                        $gallery_name=filter_input(INPUT_POST, 'gallery_name');
                        $gallery_topic=filter_input(INPUT_POST, 'gallery_topic');
                        $gallery_status=filter_input(INPUT_POST, 'gallery_status');

//Set Id from AUTO_INCREMENT
                        $sqlGal = "SELECT *,MAX(gallery_id) AS ID FROM tb_gallery";
                        $tcrGal = row_array($sqlGal);
                        $Gal_ID = $tcrGal['ID'] + 1;
//Set Id from AUTO_INCREMENT End

                        $Picture_Album_Data = array("gallery_id"=>$Gal_ID,
                                                    "gallery_name"=>$gallery_name,
                                                    "gallery_topic"=>$gallery_topic,
                                                    "gallery_thumbnail"=>$gallery_thumbnail_new_name,
                                                    "gallery_status"=>$gallery_status);
                        insert("tb_gallery", $Picture_Album_Data); 

//

                        if(($_FILES["picture_name"]["name"]!=null)){
                            $Count_Picture_Name=count($_FILES["picture_name"]["name"]);
                            $Count_Key=0;
                            while($Count_Key<$Count_Picture_Name){

                                $picture_nameNew=$image_date.$Count_Key."_pt";
                                $picture_name = $_FILES["picture_name"]["name"][$Count_Key];
                                $picture_type = $_FILES["picture_name"]["type"][$Count_Key];

                                //new file Name
                                $picture_imgFile = explode('.', $picture_name);
                                $picture_fileType = $picture_imgFile[count($picture_imgFile) - 1];
                                //new file Name end

                                $picture_new_name = $picture_nameNew.".".$picture_fileType;
                                $picture_tmp = $_FILES["picture_name"]["tmp_name"][$Count_Key];
                                $picture_size = $_FILES["picture_name"]["size"][$Count_Key];

                                move_uploaded_file($picture_tmp, '../../../dist/img/gallery/'.$FolderName.'/'. $picture_new_name);

                                $Picture_Img_Data = array("gallery_id"=>$Gal_ID,
                                                          "picture_name"=>$picture_new_name);
                                insert("tb_picture", $Picture_Img_Data); 


                                $Count_Key=$Count_Key+1; 
                            }
                        }else{}

                }else{}
            exit("<script>window.location='../../?modules=picture_album';</script>");
        }else{



        }

?>