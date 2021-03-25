
<div id="menu">
    <div class="mobile-nav" >
        <div class="mobile-menu">
        
         <img style="width: 320;" src="./assets/growth-2.png" alt="mind blenders logo">
    
         <div class="mobile-nav-links-div">
             <!-- <div class="mobile-link"><a href="./activites.html">Activities</a><div class="line"></div></div> -->
             <div class="mobile-link"><a href="./contact_us.php">Contact Us</a><div class="line"></div></div>
             <a href="./signup.php">
                 <button class="secondary-button">Register</button>
                 </a>            
     </div>
     <img id="menu-close-x" style="width: 40;" src="./assets/close.png" alt="mind blenders logo">
    
     
        </div> 
     </div>
    <nav>
        <div class="navbar">
            <a href="./index.php"><img style="width: 241;" src="./assets/logo.png" alt="mind blenders logo"></a>
            
        <div class="nav-links-div">
                
                <!-- <div class="link"><a href="./activites.html">Activities</a><div class="line"></div></div> -->
                <div class="link"><a href="./contact_us.php">Contact Us</a><div class="line"></div></div>
               <a href="./signup.php">
            <button class="secondary-button">Register</button>
            </a>
        </div>
        <img id="menu-burger" src="./assets/square.png" alt="mind blenders logo">
    
        
        </div>
        <script>
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
        </script>
    </nav>
</div>