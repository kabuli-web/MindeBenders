
<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'uni');
define('DB_PASSWORD', '');
define('DB_NAME', 'uni_project');
 
/* Attempt to connect to MySQL database */
$dbConnection =  new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($dbConnection->connect_error){
    echo 'Falied to connect: '+ $dbConnection->connect_error;
    die("ERROR: Could not connect. " . $dbConnection->connect_error);
}else{
    echo 'connected successfuly';
    $query = "SELECT ID FROM _20457952_muhammad";
    $result = $dbConnection->query( $query);

    if(empty($result)) {
        echo 'table doesnt exist';
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
                $result = $dbConnection->query($query);
                if($result){
                    echo 'table created';
                }else{
                    echo 'creating table failed';

                }
    }else if(!empty($result)){
        echo 'table exists';
        $sql = "SELECT * FROM `_20457952_muhammad` WHERE student_id = 20457952";
        $me = $dbConnection->query($sql);
        if(empty($me)){
            
        $field_email="muhammadsamad2@gmail.com";
        $field_student_id=20457952;
        $field_first_name="Muhammad";
        $field_last_name="Abdul Samad";
        $field_gpa=3.2;
        $field_contact_number= 553608481;
        $field_password='12345678m';

        $sql = "INSERT INTO _20457952_muhammad(email,
        studen_id,
        first_name,
        last_name,
        gpa,
        contact_number,
        password
        ) VALUES (?,?,?,?,?,?,?)";
        if($stmt = $dbConnection->prepare($sql)){
            $stmt->bind_param( "sissdis",
            $field_email,
            $field_student_id,
            $field_first_name,
            $field_last_name,
            $field_gpa,
            $field_contact_number,
            $field_password);
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                echo "intital Records Added Successfuly.";
                
            } else{
                echo "error adding initial records";
            }
            $stmt->close();
        }
        }else{
            echo 'initial records exist';
        }
    }
   
}
?>