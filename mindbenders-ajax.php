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
        
        if($auth->user_exists($user['student_id'])){
            $res->message = 'user already exists';
        }else{
            $user_result = $auth->add_user($user);
            if( $user_result['status']=== false){
                $res->message = $user_result['error'];
                
            }else{
                $res->message = 'user added';
            }
        }
        $db->disconnect();
        echo json_encode($res);
        
    }
    else{
        $res = new response();
        $res->message = 'no user data sent';
        echo json_encode($res);
    }

    

?>