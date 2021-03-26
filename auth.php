<?php
class Authentication{
    public $dbConnection;
    function __construct($dbConnection) {
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
            
            if($this->user_exists($user['student_id'])){
                
                return array(
                    'status'=> false,
                    'error'=> $this->error + ' USER ALREADY EXISTS '
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
                        'error'=> $this->error
                    );
                }
            }
        }else{
            return array(
                'status'=> false,
                'error'=> 'error perparing data to insert'
            );
            }
        }
    public function user_exists($id){
            $sql = "SELECT * FROM `_20457952_muhammad` WHERE student_id = {$id}";
            $user = $this->dbConnection->query($sql);
            if(empty($user)){
                return false;
            }else{
                return true;}
            }
        

    
}
?>