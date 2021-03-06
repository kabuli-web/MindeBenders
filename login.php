<?php
    if(isset($_SESSION)===false)
    {
        session_start();
    }    
    if(isset($_SESSION))
    {   
        if(isset($_SESSION['user'])===true){
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
        
      </head>

<body>


<!-- Here we include th header -->
<?php include './views/navbar.php';?>
<?php include './views/database-test.php';?>

<div class="pop_up" id="login_successful_pop_up">
    <div class="popup_close_div">
        <img class="close_button" id="popup_close_button" src="./assets/remove.png" alt="">
    </div> <div class="content">
    <img class="popup_img" id="login_popup_img_success" style="display: none;" src="./assets/Feedback.png" alt="">
    <img class="popup_img" id="login_popup_img_error" style="display: none;" src="./assets/security 3.png" alt="">
    <h2 class="popup_header" id="login_popup_header" >Logged in</h2>
    </div>
</div>
<div class="profile-content">
    
        <div class="img">
            <div class="card" style="background-color:rgba(67,58,246,47%) ;">
                <img style="width: 230; height: 172;" src="./assets/login.png" alt="card image">
            </div>
            
        </div>
        <div class="profile">
            <div class="form">
                <form class="Registration-form" >
                    <!-- <div class="input-div"><label class="label" for="Student-id">Student ID</label>
                        <input id="edit-student-id-input" value="<?php echo $_SESSION['user']['student_id']; ?>" name="student_id" class="input" type="number">
                        <p class="error"></p>
                    </div> -->
                    <div class="input-div"><label class="label" for="First Name">Student ID</label>
                        <input id="login-first-name-input"  name="student_id" class="input" type="number">
                        <p class="error"></p>
                    </div>
                    <div class="input-div"><label class="label" for="last-name">Password</label>
                        <input id="login-last-name-input"  name="password" class="input" type="password">
                        <p class="error"></p>
                    </div>
                    
                    <button  id="login-form-button" class="secondary-button">Login</button>
                       
        
                </form>
                
            </div>
        </div>
    
    
</div>

<?php include './views/footer.php';?>
   <style>
       #login_successful_pop_up{
           width: 500;
           padding-bottom: 50;
           
           top: 25vh;
       }
       .register_popup_img{
           height: auto;
       }
       .profile-content{
           
            align-items: center;
        }
   </style>
   <script>
       $(document).ready(function(){
        $("#popup_close_button").on('click',()=>{

        $("#login_successful_pop_up").css("display","none");
        });
        function display_login_error(error){
            $("#login_successful_pop_up").css('display','flex');
            
            $("#login_popup_img_success").css('display','none');
            $("#login_popup_img_error").css('display','flex');
           
            $("#login_popup_header").first().text(error);
           
        }
        function display_login_success(){
            $("#login_successful_pop_up").css('display','flex');
            $("#login_popup_header").first().text("User Logged In Successfully");
            $("#login_popup_img_success").css('display','flex');
            $("#login_popup_img_error").css('display','none');
           
            
        }
        function login_user(user){
            console.log('update triggered')
            var str =  window.location.href;
            var lastIndex = str.lastIndexOf("/");
            var path = str.substring(0, lastIndex);
            var post_path = path + "/mindbenders-ajax.php";
            var redirect_path = path + "/edit_profile.php";

            var form_data = new FormData();
            form_data.append('login_user', JSON.stringify(user))
            $.ajax({
                url: post_path,
                type: 'post',
                data: form_data,
                contentType:false,
                processData:false,
                success: function(res){
                    var response = JSON.parse(res);
                    if(response['message'] == 'done'){
                        display_login_success();
                        setTimeout(function() {
                        window.location.assign(redirect_path);
                    }, 1000);
                    }else{
                        display_login_error(response['message']);
                    }
                    $("#login_successful_pop_up").get(0).scrollIntoView();
                    
                    

                },
                error: function (err){
                    console.log(err);
                }
            });
        
        }

        function login_form(){
                var user = {
                
                    "student_id":$("input[name='student_id']").val(),
                    "password":$("input[name='password']").val(),
                    
                }
                
                login_user(user);
                
        }
        
        
        
        $("#login-form-button").on("click",(e)=>{
      
        e.preventDefault();
        login_form();
        });


       });


   </script>
</body>
</html>



