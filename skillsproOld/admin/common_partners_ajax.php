<?php  include 'top.php';
    
    //Mohammad Ghouse Saqlain
    if(isset($_POST) && $_POST['mode'] == 'ajax'){
        //Deleting the Center from the Center Listing
        if(isset($_POST['function']) && $_POST['function'] == 'delete_center'){
            $center_id = $_POST['center_id'];
            if($center_id != ''){
                $query_delete_center = "DELETE FROM `dt_centers` WHERE (`center_id` = '$center_id')";
                q($query_delete_center);
                if(!mysql_error()){
                   echo json_encode(array('result' => '1'));
                }else{
                    echo json_encode(array('result' => '0'));
                }
            }else{
                echo json_encode(array('result' => '0'));
            }
            die;
        }
        
        //Deleting the Topic from the Topic Listing
        if(isset($_POST['function']) && $_POST['function'] == 'delete_patner_topic'){
            $topic_id = $_POST['topic_id'];
            if($topic_id != ''){
                $query_delete_topic = "DELETE FROM `dt_topics` WHERE (`topic_id` = '$topic_id')";
                q($query_delete_topic);
                //echo mysql_error();
                if(!mysql_error()){
                   echo json_encode(array('result' => '1'));
                }else{
                    echo json_encode(array('result' => '0'));
                }
            }else{
                echo json_encode(array('result' => '0'));
            }
            die;
        }
        
        ///Uploading the Chapter Images
        if(isset($_POST['function']) && $_POST['function'] == 'upload_chapter_images'){
            if(isset($_FILES["myfile"])){
                $output_dir = $_SERVER['DOCUMENT_ROOT'].'/digitalskills/images/chapters/';
                $ret = array();
                $error =$_FILES["myfile"]["error"];
                if(!is_array($_FILES["myfile"]["name"]))
                {
                    //$mime_type = get_mime_by_extension($_FILES["myfile"]["name"]);
                    //$allowedTypes = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel');
                    //if(in_array($mime_type, $allowedTypes))
                    //{
                    $fileName = time().'_'.$_FILES["myfile"]["name"];
                    if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName)){
                        $ret[]= $fileName;
                        echo json_encode(array('result' => '1','file_name'=>$fileName));
                    }else{
                        echo json_encode(array('result' => '0'));
                    }
                }
            }
            die;
        }
        
        //Deleting the Topic from the Topic Listing
        if(isset($_POST['function']) && $_POST['function'] == 'delete_patner_chapter'){
            $chapter_id = $_POST['chapter_id'];
            if($chapter_id != ''){
                $query_delete_topic = "DELETE FROM `dt_chapters` WHERE (`chapter_id` = '$chapter_id')";
                q($query_delete_topic);
                //echo mysql_error();
                if(!mysql_error()){
                   echo json_encode(array('result' => '1'));
                }else{
                    echo json_encode(array('result' => '0'));
                }
            }else{
                echo json_encode(array('result' => '0'));
            }
            die;
        }

        if(isset($_POST['function']) && $_POST['function'] == 'delete_patner_batch'){
            $batch_id = $_POST['batch_id'];
            if($batch_id != ''){
                $query_delete_topic = "DELETE FROM `dt_batch` WHERE (`batch_id` = '$batch_id')";
                q($query_delete_topic);
                //echo mysql_error();
                if(!mysql_error()){
                   echo json_encode(array('result' => '1'));
                }else{
                    echo json_encode(array('result' => '0'));
                }
            }else{
                echo json_encode(array('result' => '0'));
            }
            die;
        }
        
        //Deleting the Course from the Course Listing
        if(isset($_POST['function']) && $_POST['function'] == 'delete_partner_course'){
            $course_id = $_POST['course_id'];
            if($course_id != ''){
                $query_delete_topic = "DELETE FROM `dt_courses` WHERE (`course_id` = '$course_id')";
                q($query_delete_topic);
                //echo mysql_error();
                if(!mysql_error()){
                   echo json_encode(array('result' => '1'));
                }else{
                    echo json_encode(array('result' => '0'));
                }
            }else{
                echo json_encode(array('result' => '0'));
            }
            die;
        }
         //Deleting the Project from the Project Listing
        if(isset($_POST['function']) && $_POST['function'] == 'delete_partner_project'){
            $project_id = $_POST['project_id'];
            if($project_id != ''){
                $query_delete_project = "DELETE FROM `dt_projects` WHERE (`project_id` = '$project_id')";
                q($query_delete_project);
                //echo mysql_error();
                if(!mysql_error()){
                   echo json_encode(array('result' => '1'));
                }else{
                    echo json_encode(array('result' => '0'));
                }
            }else{
                echo json_encode(array('result' => '0'));
            }
            die;
        }
        
    }