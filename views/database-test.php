

<div class="pop_up login" id="database-notice">
    <div class="popup_close_div">
        <img class="close_button" id="login_popup_close_button" src="./assets/remove.png" alt="">
    </div> <div class="content">
    <img class="register_popup_img" id="register_popup_img_success" src="./assets/build--product.png" alt="">
   
    <h2 class="registeration_popup_header">Please add database details so the website can work properly</h2>
    <p class='log'>
    </p>
    </div>
</div>
<style>
#database-notice{
    padding: 50px;
    
    top: 5vh;
}
</style>
<script>

        $(document).ready(function(){
            console.log('logout triggered');
        var str =  window.location.href;
        var lastIndex = str.lastIndexOf("/");
        var path = str.substring(0, lastIndex);
        var post_path = path + "/mindbenders-ajax.php";
        var resirect_path = path + "/index.php";
        var form_data = new FormData();
        form_data.append('test_database', 'ping')
        $("#login_popup_close_button").on('click',()=>{
        $("#database-notice").css("display","none");
        });
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
                $('.log').first().text(res);
                $(".pop_up").get(0).scrollIntoView();
               }
            },
            error: function (err){
                console.log(err);
            }
        });

        })

</script>