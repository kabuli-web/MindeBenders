<?php
    class response{
        public $message  = '';
    }
    if(isset($_SESSION))
    {

    }
    else
    {
        session_start();
    }
    
        include './config.php'; 
        include './auth.php'; 
    
    if(isset($_POST['new_user'])){

        $res = new response();
        $db = new db_connection();
        $db->connect();
        $dbConnection = $db->dbConnection;
        $auth = new Authentication($dbConnection);
        $user = json_decode($_POST['new_user'],true);
        $user_exists = $auth->user_exists($user['student_id']);
        if($user_exists['status'] === true){
            $res->message = "user exists with student id: {$user_exists['user']['student_id']}";
        }else{
            $user_result = $auth->add_user($user);
            if( $user_result['status']=== false){
                $res->message = $user_result['error'];
            }else{
                $res->message = 'done';
            }
        }
        $db->disconnect();
        echo json_encode($res);
        
    }
    elseif(isset($_POST['login_user'])){
        $res = new response();
        $db = new db_connection();
        $db->connect();
        $dbConnection = $db->dbConnection;
        $auth = new Authentication($dbConnection);
        $user = json_decode($_POST['login_user'],true);
        $result = $auth->login_user($user);
        $db->disconnect();
        if($result['status']===true){
            $res->message = 'done';
            echo json_encode($res);
        }else{
            $res->message = $result['error'];
            echo json_encode($res);
        }
    } 
    elseif(isset($_POST['logout_user'])){
        $auth = new Authentication();
        $res = new response();
        $result = $auth->logout_user();
        if($result['status']===true){
            $res->message = 'done';
            echo json_encode($res);
        }else{
            $res->message = $result['error'];
            echo json_encode($res);
        }
    }

    elseif(isset($_POST['update_user'])){
        $res = new response();
        if(isset($_SESSION['user'])){
            
            $db = new db_connection();
            $db->connect();
            $dbConnection = $db->dbConnection;
            $auth = new Authentication($dbConnection);
            $user = json_decode($_POST['update_user'],true);
            $user['student_id']=$_SESSION['user']['student_id'];
            $result = $auth->update_user($user);
            if($result['status']===false){
                $res->message = $result['error'];
            }elseif($result['status']===true){
                $_SESSION['user']= $result['user'];
                $res->message = 'done';
            }
        
        }else{
            $res->message = 'user not logged in';
        }
        $db->disconnect();
        echo json_encode($res);
    }
    elseif(isset($_POST['test_database'])){
        $res = new response();
        $db = new db_connection();
        $db->connect();
        if($db->connection_status===true){
            $res->message = array(
                "status"=> true,
                'message' => "Database Connected Successfully. Enjoy errors = {$db->errors}" 
            );
        }else{
            $res->message = array(
                "status"=> true,
                "error"=>  $db->dbConnection->connect_error
            );
        }
        echo json_encode($res);
    }

?>