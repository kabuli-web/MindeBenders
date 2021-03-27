<?php
class Authentication{
    public $dbConnection;
    function __construct($dbConnection=null) {
        $this->dbConnection = $dbConnection;
      }
    public $error;
    public function add_user($user){
        $sql = "INSERT INTO _20457952_muhammad(email,
        student_id,
        first_name,
        last_name,
        gpa,
        contact_number,
        password,
        activity,
        day,
        time
        ) VALUES (?,?,?,?,?,?,?,?,?,?)";
        if($stmt = $this->dbConnection->prepare($sql)){
            $stmt->bind_param( "sissdissss",
            $user['email'],
            $user['student_id'],
            $user['first_name'],
            $user['last_name'],
            $user['gpa'],
            $user['contact_number'],
            $user['password'],
            $user['activity'],
            $user['day'],
            $user['time']
        );
            $user_exists = $this->user_exists($user['student_id']);
            if($user_exists['status']===true){
                return array(
                    'status'=> false,
                    'error'=> $this->error + ' USER ALREADY EXISTS WITH STUDENT ID: '+ $user['student_id']
                );
            }else{
                if($stmt->execute()){
                    // Records created successfully.
                    $stmt->close();
                    return array(
                        'status'=> true,
                    );;
                } else{
                    $this->error = $stmt->error;
                    $stmt->close();
                    return array(
                        'status'=> false,
                        'error'=> 'Internal Server Error /execute/'
                    );
                }
            }
        }else{
            return array(
                'status'=> false,
                'error'=> 'Internal Server Error /prepare/'
            );
            }
        }
    public function user_exists($id){
            $sql = "SELECT * FROM `_20457952_muhammad` WHERE student_id = {$id}";
            $result = $this->dbConnection->query($sql);
            if(gettype($result)=="boolean"){
                return array(
                    "status"=> false,
                    'error'=> 'internal server error',
                    
                );
            }else{
                if($result->num_rows==0){
                    return array(
                        "status"=> false,
                        'error'=> 'user doesnt exist',
                        'user'=> null
                    );
                }else{
                    $user = $result->fetch_assoc();
                    return array(
                        "status"=> true,
                        'error'=> 'user already exist',
                        'user'=> $user
                    );
                }
            }
    }
    public function login_user($user){
        $exist = $this->user_exists($user['student_id']);
        if($exist['status'] === true){
            if($user['password'] == $exist['user']['password']){
                $_SESSION['user'] = $exist['user'];
                return array(
                    'status'=> true,
                );
            }
            else{
                return array(
                    'status'=> false,
                    'error'=> 'wrong Credentials'
                );
            }
        }else{
            return array(
                'status'=> false,
                'error'=> 'user doesnt exist'
            );
        }
    }  
    public function logout_user(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            return array(
                'status'=> true,
            );
        }else{
            return array(
                'status'=> false,
                'error'=> 'user is not loged in'
            );
        }
    }
    public function update_user($user)
    {   
        $sql = "UPDATE `_20457952_muhammad` SET email = '{$user["email"]}', first_name = '{$user["first_name"]}',last_name = '{$user["last_name"]}',gpa={$user["gpa"]}, contact_number = {$user["contact_number"]}, day= '{$user["day"]}',activity= '{$user["activity"]}',time= '{$user["time"]}' WHERE student_id = 20457952";
            $user_exists = $this->user_exists($user['student_id']);
            if($user_exists['status']===true){
                $update_result = $this->dbConnection->query($sql);
                if($update_result===true){
                    $user_e = $this->user_exists($user['student_id']);
                    return array(
                        'status'=> true,
                        'user'=> $user_e['user']
                    );
                }else{
                    return array(
                        'status'=> false,
                        'error'=> 'User not updated'
                    );
                }
            }else{
                return array(
                    'status'=> false,
                    'error'=> ' USER doesnt EXISTS'
                    
                    
                );
            }
        }
       
    
}
    
?>