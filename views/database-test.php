

<div class="database_notice_popup" id="database-notice">
    <div class="popup_close_div">
        <img class="close_button" id="database_popup_close_button" src="./assets/remove.png" alt="">
    </div> <div class="content">
    <img class="popup_img" id="database_popup_img_success" src="./assets/build--product.png" alt="">
   
    <h2 class="popup_header">Please add database details to the config.php file so the website can work properly</h2>
    <p id='database_error_log'>
    </p>
    </div>
</div>
<style>
#database-notice{
    padding: 50px;
    
    top: 5vh;
}
.database_notice_popup{
    display: none;
    width: 75%;
    /* height: 75%; */
    position: absolute;
    top: 50vh;
    background-color: #F0F2F6;
    z-index: 100;
    background: #FCFCFC;
    /* shadow */ 
    box-shadow: 0px 0px 8px -2px rgba(0, 0, 0, 0.25);
    border-radius: 89px;
}
@media only screen and (max-width: 1150px){
    .database_notice_popup{
        border-radius: 30px;
    }
}
</style>
<script>

        $(document).ready(function(){
            console.log('ping triggered');
            var str =  window.location.href;
            var lastIndex = str.lastIndexOf("/");
            var path = str.substring(0, lastIndex);
            var post_path = path + "/mindbenders-ajax.php";
            var resirect_path = path + "/index.php";
            var form_data = new FormData();
            form_data.append('test_database', 'ping')
            
            $.ajax({
                url: post_path,
                type: 'post',
                data: form_data,
                contentType:false,
                processData:false,
                success: function(res){
                if(String(res).includes('Enjoy')){
                    console.log("dbconnected successfully")
                }else{
                    $('#database-notice').css('display',"flex");
                    $('#database_error_log').text(res);
                    $("#database-notice").get(0).scrollIntoView();
                }
                
                },
                error: function (err){
                    console.log(err);
                }
            });

        })
        window.onload=function(){
            $("body").on('click',()=>{
            $("#database-notice").first().css("display","none");
        });
        }

</script>