<?php
    if(isset($_SESSION)===false)
    {
        session_start();
    }    
    if(isset($_SESSION))
    {   
        if(isset($_SESSION['user'])===false){
            ?>
            <script>
            var str =  window.location.href;
            var lastIndex = str.lastIndexOf("/");
            var path = str.substring(0, lastIndex);
            
            var resirect_path = path + "/index.php";

            window.location.assign(resirect_path);
        </script>
            <?php
        }
    }
    
?>

<html lang="en">
    <head id="header">
        <?php include './views/global_head_links.php';?>
        <link rel="stylesheet" href="./css/edit_profile.css">
        <script src="./js/edit_profile.js" ></script>
        <script>
            $(document).ready(function(){
                $("input[value='<?php echo $_SESSION['user']['activity']; ?>']").attr('checked',true);
                $("input[value='<?php echo $_SESSION['user']['day']; ?>']").attr('checked',true);
                $("input[value='<?php echo $_SESSION['user']['time']; ?>']").attr('checked',true);
                $("input[name='email']").attr('value','<?php echo $_SESSION['user']['email']; ?>');
                $("input[name='gpa']").attr('value','<?php echo $_SESSION['user']['gpa']; ?>');
                $("input[name='contact_number']").attr('value',<?php echo $_SESSION['user']['contact_number']; ?>);
                $("input[name='first_name']").attr('value','<?php echo $_SESSION['user']['first_name']; ?>');
                $("input[name='last_name']").attr('value','<?php echo $_SESSION['user']['last_name']; ?>');
               


                // $('input[name = "activity"]').each(function(index){
                //     if($(this).val()== "<?php echo $_SESSION['user']['activity']; ?>"){
                //         $(this).attr('checked',true);
                //         console.log($(this).val())
                //     }
                // });
                // $('input[name = "day"]').each(function(index){
                //     if($(this).val()== "<?php echo $_SESSION['user']['day']; ?>"){
                //         $(this).attr('checked',true);
                //         console.log($(this).val())

                //     }
                // });
                // $('input[name = "time"]').each(function(index){
                //     if($(this).val()== "<?php echo $_SESSION['user']['time']; ?>"){
                //         $(this).attr('checked',true);
                //         console.log($(this).val())

                //     }
                // });
                
                
            });
        </script>
      </head>

<body>


<!-- Here we include th header -->
<?php include './views/navbar.php';?>
<?php include './views/database-test.php';?>

<h3 class="contact-header-text"> Hello <?php echo $_SESSION['user']['first_name']; ?></h3>
<div class="pop_up" id="edit_successful_pop_up">
    <div class="popup_close_div">
        <img class="close_button" id="popup_close_button" src="./assets/remove.png" alt="">
    </div>
    <div class="content">
        <img class="register_popup_img" id="register_popup_img_success" src="./assets/Feedback.png" alt="">
        <img class="register_popup_img" id="register_popup_img_error" style="display: none;" src="./assets/security 3.png" alt="">
        <h2 class="registeration_popup_name" id="registeration_name"><?php echo $_SESSION['user']['first_name']; ?></h2>
        <h2 class="registeration_popup_header">Successfully Edited</h2>
        <div class="registration_details">
            <div class="detail_icon">
                <img class="icon" src="./assets/email.png" alt="email_icon">
                <h4 class="detail" id="registeration_email">muhammadsamad2@gmail.com</h4>
            </div>
            <!-- <div class="detail_icon">
                <img class="icon" src="./assets/id.png" alt="phone_icon">
                <h4 class="detail" id="edit_result_id">20457952</h4>
            </div> -->
            <div class="detail_icon">
                <img class="icon" src="./assets/phone.png" alt="phone_icon">
                <h4 class="detail" id="edit_result_number" >0553608481</h4>
            </div>
            <div class="detail_icon">
                <img class="icon" src="./assets/gpa.png" alt="phone_icon">
                <h4 class="detail" id="edit_result_gpa" >3.4</h4>
            </div>
            <div class="detail_icon">
                <img class="icon" src="./assets/juggling.png" alt="phone_icon">
                <h4 class="detail" id="edit_result_activity" >programming competition</h4>
            </div>
            <div class="detail_icon">
                <img class="icon" src="./assets/schedule.png" alt="phone_icon">
                <h4 class="detail" id="edit_result_day">monday</h4>
            </div>
            <div class="detail_icon">
                <img class="icon" src="./assets/chronometer.png" alt="phone_icon">
                <h4 class="detail" id="edit_result_time">6-10</h4>
            </div>
            
        </div>

        <div style="height: 40px; width: 100%;" ></div>
   
</div>
</div>
<div class="profile-content">
    
        <div class="img">
            <div class="card" style="background-color:rgba(67,58,246,47%) ;">
                <img style="width: 230; height: 172;" src="./assets/web-development.png" alt="card image">
            </div>
            
        </div>
        <div class="profile">
            <div class="form">
                <form class="Registration-form" >
                    <!-- <div class="input-div"><label class="label" for="Student-id">Student ID</label>
                        <input id="edit-student-id-input" value="<?php echo $_SESSION['user']['student_id']; ?>" name="student_id" class="input" type="number">
                        <p class="error"></p>
                    </div> -->
                    <div class="input-div"><label class="label" for="First Name">First Name</label>
                        <input id="edit-first-name-input" value="<?php echo $_SESSION['user']['first_name']; ?>" name="first_name" class="input" type="text">
                        <p class="error"></p>
                    </div>
                    <div class="input-div"><label class="label" for="last-name">Last Name</label>
                        <input id="edit-last-name-input" value="<?php echo $_SESSION['user']['last_name']; ?>" name="last_name" class="input" type="text">
                        <p class="error"></p>
                    </div>
                    <div id="gpa-input-div" class="input-div"><label class="label" for="gpa">GPA</label>
                        <input min="0" max="4" name="gpa" value="<?php echo $_SESSION['user']['gpa']; ?>" id="edit-gpa-input" class="input" step="0.01" type="number">
                        <p class="error"></p>
                    </div>
                    <div class="input-div"><label class="label" for="Email">Email</label>
                        <input id="edit-email-input" value="<?php echo $_SESSION['user']['email']; ?>" name="email" class="input" type="email">
                        <p class="error"></p>
                    </div>
                    <div class="input-div"><label class="label" for="contact-number">Contact Number</label>
                        <input id="edit-contact-input" value="<?php echo $_SESSION['user']['contact_number']; ?>" name="contact_number" class="input" type="number">
                        <p class="error"></p>
                    </div>
                    <label class="radio-label" for="activity">Choose an Activity</label>
                    <div class="input-div radio-input-div">
                        <div class="-choice">
                            <input id="day-input" class="input-radio" name="activity" checked value="programming-competition" type="radio">
                        <p class="day-title">
                            Programming Competition
                        </p>
                        </div>
                       <div class="-choice">
                        <input id="day-input" class="input-radio" name="activity" value="proffesional-certification" type="radio">
                        <p class="day-title">
                            Professional Certification
                        </p>
                       </div>
                   
                        <p class="error"></p>
                    </div>
                    <label class="radio-label" for="Day">Choose a Day</label>
                    <div class="input-div radio-input-div">
                        <div class="-choice">
                            <input id="day-input" checked class="input-radio" name="day" value="Saturday" type="radio">
                        <p class="day-title">
                            Saturday
                        </p>
                        </div>
                       <div class="-choice">
                        <input id="day-input" class="input-radio" name="day" value="Sunday" type="radio">
                        <p class="day-title">
                            Sunday
                        </p>
                       </div>
                        <div class="-choice">
                            <input id="day-input" class="input-radio" name="day" value="Monday" type="radio">
                      <p  class="day-title">
                            Monday
                        </p>
                        </div>
                        <div class="-choice">
                            <input id="day-input" class="input" name="day" value="Tuesday" type="radio">
                         <p class="day-title">
                            Tuesday
                        </p>
                        </div>
                        <div class="-choice">
                            <input id="day-input" class="input-radio" name="day" value="Wednesday" type="radio">
                        <p class="day-title">
                            Wednesday
                        </p>
                        </div>
                        <div class="-choice">
                            <input id="day-input" class="input-radio" name="day" value="Thursday" type="radio">
                         <p class="day-title">
                            Thursday
                        </p>
                        </div>
                        <div class="-choice">
                            <input id="day-input" class="input-radio" name="day" value="Friday" type="radio">
                        <p class="day-title">
                            Friday
                        </p>
                        </div>
                        <p class="error"></p>
                    </div>
                    <label class="radio-label" for="time">Choose a time</label>
                    <div class="input-div radio-input-div" id="time-radio-div">
                        <div class="-choice">
                            <input id="day-input" checked class="input-radio" name="time" value="6-10" type="radio">
                        <p class="day-title">
                        6-10
                        </p>
                        </div>
                       <div class="-choice">
                        <input id="day-input" class="input-radio" name="time" value="11-4" type="radio">
                        <p class="day-title">
                        11-4
                        </p>
                       </div>
                       <div class="-choice">
                        <input id="day-input" class="input-radio" name="time" value="5-9" type="radio">
                        <p class="day-title">
                        5-9
                        </p>
                       </div>
                        <p class="error"></p>
                    </div>
                    <button  id="edit-form-button" class="secondary-button">Update</button>
                       
        
                </form>
                
            </div>
        </div>
    
    
</div>
    

<?php include './views/footer.php';?>
   
   
</body>
</html>