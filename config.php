
<?php
 
class db_connection{
    
    public $dbConnection;
    public $connection_status=false;
    public $table_exists=false;
    public $initial_records_exist=false;
    public $errors;
    public function add_initial_user($user){
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
            $user['time']);
            
            if($stmt->execute()){
                // Records created successfully.
                $this-> initial_records_exist = true;
                $stmt->close();
                
            } else{
                $this-> initial_records_exist = false;
                echo "error executing";
                $stmt->close();
            }
            
        }else{
            echo "error preparing";

            $this-> initial_records_exist = false;
            }
    }
    public function connect(){
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'uni');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'question3');
        $this->dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($this->dbConnection->connect_error){
            $this-> connection_status = false;
            die("ERROR: Could not connect. " . $this->dbConnection->connect_error);
        }else{
            $this-> connection_status = true;
            $query = "SELECT * FROM _20457952_muhammad";
            $result = $this->dbConnection->query( $query);

            if(gettype($result)=="boolean"){
                $this->errors = $this->errors . "error no table". strval($result);
                if($result==false) {
                    $this-> table_exists = false;
                            $query = "CREATE TABLE _20457952_muhammad (
                                id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                email varchar(255) NOT NULL,
                                student_id INT NOT NULL,
                                first_name VARCHAR(100) NOT NULL,
                                last_name VARCHAR(100) NOT NULL,
                                gpa DECIMAL(3,2) NOT NULL,
                                contact_number INT NOT NULL,
                                password VARCHAR(255) NOT NULL,
                                activity VARCHAR(100) NOT NULL,
                                day VARCHAR(100) NOT NULL,
                                time VARCHAR(100) NOT NULL)";
                            $result = $this->dbConnection->query($query);
                            if($result){
                                $this->errors = $this->errors . "table created  ";
                                $user=array(
                                    'email'=> 'muhammadsamad2@mgail.com',
                                    'student_id'=> 20457952,
                                    'first_name'=> 'Mohammad',
                                    'last_name'=> 'Abdul Samad',
                                    'gpa'=> 3.2,
                                    'contact_number'=> 553608481,
                                    'password'=> '12345678m',
                                    'activity'=> 'programmin-competition',
                                    'day'=> 'Saturday',
                                    'time' => '6-11'
                                );
                                $user2=array(
                                    'email'=> 'aymen_imtaiz@mgail.com',
                                    'student_id'=> 21548879,
                                    'first_name'=> 'Ayman',
                                    'last_name'=> 'Imtiaz',
                                    'gpa'=> 3.5,
                                    'contact_number'=> 540064942,
                                    'password'=> '12345678m',
                                    'activity'=> 'profesional-certification',
                                    'day'=> 'Sunday',
                                    'time' => '6-11'
                                );
                                $sql = "SELECT * FROM `_20457952_muhammad` WHERE student_id = 20457952";
                                $me = $this->dbConnection->query($sql);
                                if(mysqli_num_rows($me)==0){
                                    $this->errors = $this->errors . "user1 doesnt exists";
                                    $this->add_initial_user($user);
                                }else{
                                    $this->errors = $this->errors . "user1 exists";
                                    $this-> initial_records_exist = true;
                                }
                                $sql2 = "SELECT * FROM `_20457952_muhammad` WHERE student_id = 215488799";
                                $usr2 = $this->dbConnection->query($sql2);
                                if(mysqli_num_rows($usr2)==0){
                                    $this->errors = $this->errors . "user2 doesnt exists";
                                    $this->add_initial_user($user2);
                    
                                }else{
                                    $this->errors = $this->errors . "user2  exists";
                                    $this-> initial_records_exist = true;
                                }
                                $this-> table_exists = true;
                            }else{
                                $this->errors = $this->errors . "error creating table  ";
                                $this-> table_exists = false;
            
                            }
                }
            }else{
                if($result->num_rows==0){
                    $this->errors = $this->errors . "table exists";
                    $this-> table_exists = true;
                    $user=array(
                        'email'=> 'muhammadsamad2@mgail.com',
                        'student_id'=> 20457952,
                        'first_name'=> 'Mohammad',
                        'last_name'=> 'Abdul Samad',
                        'gpa'=> 3.2,
                        'contact_number'=> 553608481,
                        'password'=> '12345678m',
                        'activity'=> 'programmin-competition',
                        'day'=> 'Saturday',
                        'time' => '6-11'
                    );
                    $user2=array(
                        'email'=> 'aymen_imtaiz@mgail.com',
                        'student_id'=> 21548879,
                        'first_name'=> 'Ayman',
                        'last_name'=> 'Imtiaz',
                        'gpa'=> 3.5,
                        'contact_number'=> 540064942,
                        'password'=> '12345678m',
                        'activity'=> 'profesional-certification',
                        'day'=> 'Sunday',
                        'time' => '6-11'
                    );
                    $sql = "SELECT * FROM `_20457952_muhammad` WHERE student_id = 20457952";
                    $me = $this->dbConnection->query($sql);
                    if(mysqli_num_rows($me)==0){
                        $this->errors = $this->errors . "user1 doesnt exists";
                        $this->add_initial_user($user);
                    }else{
                        $this->errors = $this->errors . "user1 exists";
                        $this-> initial_records_exist = true;
                    }
                    $sql2 = "SELECT * FROM `_20457952_muhammad` WHERE student_id = 215488799";
                    $usr2 = $this->dbConnection->query($sql2);
                    if(mysqli_num_rows($usr2)==0){
                        $this->errors = $this->errors . "user2 doesnt exists";
                        $this->add_initial_user($user2);
        
                    }else{
                        $this->errors = $this->errors . "user2  exists";
                        $this-> initial_records_exist = true;
                    }
                }

            }
            
            
           
        }
    }
   
    public function disconnect()
    {
        $this->dbConnection->close();
       $this->connection_status=false;
    }
}
// Check connection

?>