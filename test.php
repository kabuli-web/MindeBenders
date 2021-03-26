<?php

?>
    <?php include './views/global_head_links.php';?>





    <html lang="en">
    <head id="header">
        <?php include './views/global_head_links.php';?>

      </head>

<body>


<!-- Here we include th header -->
<?php include './views/navbar.php';?>
    <form id="ex" >
        <input type="text" name="username">
        <input type="password" name="password">
        <button id="login">Login</button>
    </form>
    
<?php include './views/footer.php';?>
     
   
<script>
   window.onload = function () {
    $("#login").on('click',function (e) {
                e.preventDefault();
                var form_data = new FormData();
                var data = {
                    student_id: $("input[name='username']").val(),
                    password: $("input[name='password']").val(),
                    
                }
                form_data.append('login_user', JSON.stringify(data))
                $.ajax({
                    url: 'http://localhost/uni_project_v2/mindbenders-ajax.php' ,
                    type: 'post',
                    data: form_data,
                    contentType:false,
                    processData:false,
                    success: function(res){
                        var response = JSON.parse(res);
                        console.log(response.message);
                    },
                    error: function (err){
                        console.log(err);
                    }
                });
    })
   }
</script>
</body>
</html>






