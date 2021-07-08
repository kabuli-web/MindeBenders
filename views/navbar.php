
<div id="menu">
    <div class="mobile-nav" >
        <div class="mobile-menu">
        
         <img style="width: 320;" src="./assets/growth-2.png" alt="mind blenders logo">
    
         <div class="mobile-nav-links-div">
             <?php if(isset($_SESSION['user'])){?>
             <div class="mobile-link"><a href="./edit_profile.php">My Profile</a><div class="line"></div></div>
             <?php }
             else{?>
             <div class="mobile-link"><a href="./login.php">login</a><div class="line"></div></div>
            <?php }
            ?>
             <div class="mobile-link"><a href="./contact_us.php">Contact Us</a><div class="line"></div></div>
             <?php if(isset($_SESSION['user'])){?>
                <button id="log-out-button" class="secondary-button">Log Out</button>
             <?php }
             else{?>
             <a href="./signup.php">
                 <button class="secondary-button">Register</button>
                 </a>  
            <?php }
            ?>         
     </div>
     <img id="menu-close-x" style="width: 40;" src="./assets/close.png" alt="mind blenders logo">
    
     
        </div> 
     </div>
    <nav>
        <div class="navbar">
            <a href="./index.php"><img style="width: 241;" src="./assets/logo.png" alt="mind blenders logo"></a>
            
        <div class="nav-links-div">
        <?php if(isset($_SESSION['user'])){?>
             <div class="link"><a href="./edit_profile.php">My Profile</a><div class="line"></div></div>
             <?php }
             else{?>
             <div class="link"><a href="./login.php">Login</a><div class="line"></div></div>
            <?php }
            ?>
                
                <div class="link"><a href="./contact_us.php">Contact Us</a><div class="line"></div></div>
               
               <?php if(isset($_SESSION['user'])){?>
                <button id="log-out-button" class="secondary-button">Log Out</button>
             <?php }
             else{?>
             <a href="./signup.php">
                 <button class="secondary-button">Register</button>
                 </a>  
            <?php }
            ?>
            
            </a>
        </div>
        <img id="menu-burger" src="./assets/square.png" alt="mind blenders logo">
    
        
        </div>
        <script>
           $(document).ready(function(){
            $("#menu-burger").on('click',()=>{
                $("body").css("overflow","hidden");
                $(".mobile-nav").css("display","flex");
            
                $(".mobile-nav").css("animation-name"," menu-bounce-in");
                $(".mobile-nav").css( "animation-duration", "1s");
                
                $(".mobile-nav").css("bottom","0");
                    });
            
                    $("#menu-close-x").on('click',()=>{
                        $("body").css("overflow","auto");
                        $(".mobile-nav").css("animation-name"," menu-bounce-out");
                        $(".mobile-nav").css( "animation-duration", "1s");
                        $(".mobile-nav").css("bottom","1000");
                    });
                function log_out(){
                    console.log('logout triggered');
                    var str =  window.location.href;
                    var lastIndex = str.lastIndexOf("/");
                    var path = str.substring(0, lastIndex);
                    var post_path = path + "/mindbenders-ajax.php";
                    var resirect_path = path + "/index.php";
                    var form_data = new FormData();
                    form_data.append('logout_user', 'log out')
                    $.ajax({
                        url: post_path,
                        type: 'post',
                        data: form_data,
                        contentType:false,
                        processData:false,
                        success: function(res){
                            var response = JSON.parse(res);
                            console.log(response.message);
                            window.location.assign(resirect_path);
                        },
                        error: function (err){
                            console.log(err);
                        }
                    });
                }
            $("body").on("click",'#log-out-button',(e)=>{
            e.preventDefault();
            log_out();
            }); 

           })
        </script>
    </nav>
</div>