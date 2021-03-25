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
    function add_user($user,$dbConnection){
        $sql = "INSERT INTO _20457952_muhammad(email,
        student_id,
        first_name,
        last_name,
        gpa,
        contact_number,
        password
        ) VALUES (?,?,?,?,?,?,?)";
        if($stmt = $dbConnection->prepare($sql)){
            $stmt->bind_param( "sissdis",
            $user['email'],
            $user['student_id'],
            $user['first_name'],
            $user['last_name'],
            $user['gpa'],
            $user['contact_number'],
            $user['password']);

            if($stmt->execute()){
                // Records created successfully.
                $stmt->close();
                return true;
            } else{
                $stmt->close();
                return false;
            }
            
            }else{
                
                return false;
            }


     
        }
    function user_exists($id,$dbConnection){
        $sql = "SELECT * FROM `_20457952_muhammad` WHERE studen_id = {$id}";
        $user = $dbConnection->query($sql);
        if(empty($user)){
            return false;
        }else{
            return true;}
        }
    include './config.php'; 
        if(isset($_POST['new_user'])){
        $res = new response();
        
        $user = json_decode($_POST['new_user'],true);
        if(user_exists($user['student_id'],$dbConnection)){
            $res->message = 'user already exists';
        }else{
            $a_user = array(
                'email'=>'muhammad',
                'student_id'=>20202020,
                'first_name'=> 'mohammad',
                'last_name'=> 'apple',
                'gpa'=> 3.2,
                'contact_number'=>553608581,
                'password'=>'554564564'
            );
            if(add_user($a_user,$dbConnection)){
                $res->message = 'user added';
            }else{
                $res->message = 'error adding user';
            }
        }
        echo json_encode($res);
    }


    else{
       
        $res = new response();
        $res->message = ' no user data sent';
        echo json_encode($res);
    }

    

?>