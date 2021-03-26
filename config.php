
<?php

class db_connection{
    public $dbConnection;
    public $connection_status=false;
    public $table_exists=false;
    public $initial_records_exist=false;
    public function connect(){
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'uni');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'uni_project');
        $this->dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($this->dbConnection->connect_error){
            $this-> connection_status = false;
            die("ERROR: Could not connect. " . $this->dbConnection->connect_error);
        }else{
            $this-> connection_status = true;
            
            $query = "SELECT ID FROM _20457952_muhammad";
            $result = $this->dbConnection->query( $query);
            if(empty($result)) {
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
                            $this-> table_exists = true;
                        }else{
                            $this-> table_exists = false;
        
                        }
            }else if(!empty($result)){
                $this-> table_exists = true;
                $sql = "SELECT * FROM `_20457952_muhammad` WHERE student_id = 20457952";
                $me = $this->dbConnection->query($sql);
                if(empty($me)){
                $this-> initial_records_exist = false;
                $field_email="muhammadsamad2@gmail.com";
                $field_student_id=20457952;
                $field_first_name="Muhammad";
                $field_last_name="Abdul Samad";
                $field_gpa=3.2;
                $field_contact_number= 553608481;
                $field_password='12345678m';
                $field_activity='Programming Competition';
                $field_day='Sunday';
                $field_time='6-11';
                
        
                $sql = "INSERT INTO _20457952_muhammad(email,
                studen_id,
                first_name,
                last_name,
                gpa,
                contact_number,
                password,
                activity,
                day,
                time
                ) VALUES (?,?,?,?,?,?,?,?,?,?)";
                if($stmt = $$this->dbConnection->prepare($sql)){
                    $stmt->bind_param( "sissdissss",
                    $field_email,
                    $field_student_id,
                    $field_first_name,
                    $field_last_name,
                    $field_gpa,
                    $field_contact_number,
                    $field_password,
                    $field_activity,
                    $field_day,
                    $field_time
                );
                    if($stmt->execute()){
                        // Records created successfully. Redirect to landing page
                        $this-> initial_records_exist = true;
                        
                    } else{
                        $this-> initial_records_exist = false;

                    }
                    $stmt->close();
                }
                }else{
                    $this-> initial_records_exist = true;
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