        var  inputs_valid ;
        function display_registration_error(error){
            
            $("#register_popup_img_success").css('display','none');
            $("#register_popup_img_error").css('display','flex');
            $("#registeration_name").css('display','none');
            $("#registration_status").text(error);
            $(".popup_details").css('display','none');
        }
        function display_registration_success(){
            
            $("#register_popup_img_success").css('display','flex');
            $("#register_popup_img_error").css('display','none');
            $("#registration_status").text('thank you for registering');
            $("#registeration_name").css('display','flex');
            $(".popup_details").css('display','flex');
            
        }
        function display_new_registered_user(user,message){
            var id=user['student_id'];
            var name = user['first_name'] + ' '+ user['last_name'];
            var gpa=user['gpa'];
            var email = user['email'];
            var number = user['contact_number'];
            var activity =user['activity'];
            var day =user['week'];
            var time =user['time'];
            $('#registeration_name').text(name);
            $('#registeration_email').text(email);
            $('#registeration_id').text(id);
            $('#registeration_number').text(number);
            $('#registeration_gpa').text(gpa);
            $('#registeration_activity').text(activity);
            $('#registeration_day').text(day);
            $('#registeration_time').text(time);
            $('#registration_pop_up').trigger('Display');
            // $(".pop_up").scrollTo("");
            $("#registration_pop_up").get(0).scrollIntoView();
            if(String(message) == 'done'){
                display_registration_success();
            }else{
                display_registration_error(message);
            }
        }
        function Register_member(user){
            var str =  window.location.href;
            var lastIndex = str.lastIndexOf("/");
            var path = str.substring(0, lastIndex);
            var post_path = path + "/mindbenders-ajax.php";

            var form_data = new FormData();
            form_data.append('new_user', JSON.stringify(user))
            $.ajax({
                url: post_path,
                type: 'post',
                data: form_data,
                contentType:false,
                processData:false,
                success: function(res){
                    var response = JSON.parse(res);
                    display_new_registered_user(user,response.message);
                    console.log(String(response.message) === 'done');
                    console.log(response.message);

                },
                error: function (err){
                    console.log(err);
                }
            });
           
        }
        
        function submit_form(){
            if(validate_form()){
                var user = {
                   "student_id":$("#student-id-input").val(),
                       "first_name":$("#first-name-input").val(),
                       "last_name":$("#last-name-input").val(),
                       "gpa":$("#gpa-input").val(),
                       "email":$("#email-input").val(),
                       "contact_number":$("#contact-input").val(),
                       "password":$("#password-input").val(),
                       "confirm_password":$("#confirm-password-input").val(),
                       "activity":$("input[name='activity']:checked").val(),
                       "day":$("input[name='day']:checked").val(),
                       "time":$("input[name='time']:checked").val(),
                       
                };
                Register_member(user);
                member = null;
            }
        }
        function disable_form_button(){
            $("#register-form-button").removeClass("secondary-button");
            $("#register-form-button").addClass("disabled-secondary-button").prop("disabled","true");
            $("#edit-form-button").removeClass("secondary-button");
            $("#edit-form-button").addClass("disabled-secondary-button").prop("disabled","true");
            
        }
        function enable_form_button(){
            $("#register-form-button").removeClass("disabled-secondary-button");
            $("#register-form-button").addClass("secondary-button").removeAttr("disabled");
            $("#edit-form-button").removeClass("disabled-secondary-button");
            $("#edit-form-button").addClass("secondary-button").removeAttr("disabled");
            
        }
        function validate_form(callback){
            var valid = true;
            for(const i in inputs_valid){
                
                if(!inputs_valid[i]){
                    valid = false
                }
            }
            if(valid){
                enable_form_button();
            }else{
                disable_form_button();
            }
            callback(valid);
        }
        function validate_form(){
            var valid = true;
            for(const i in inputs_valid){
                
                if(!inputs_valid[i]){
                    valid = false
                }
            }
            if(valid){
                enable_form_button();
            }else{
                disable_form_button();
            }
            return valid;
        }
        function display_error(id,text,key){
            var element = $("#"+id);
            element.css("border-color","#FF5886");
            element.siblings(".error").text(text).css("display","block");
            inputs_valid[key]=false;
        }
        function hide_error(id,text,key){
            var element = $("#"+id);
            element.css("border-color","#433AF6");
            element.siblings(".error").css("display","none");
                inputs_valid[key]=true;
        }
        function validate_student_id(id){
            var element = $("#"+id);
            var number_string = new String(element.val());
            if(number_string.length < 8 || number_string.length > 10){
                
                display_error(id,"Enter a valid student id","student_id");
            }
            else{
                hide_error(id,"Enter a valid student id","student_id");

            }
            validate_form();
        }
        function vaildate_name(id){
            var element = $("#"+id);
            var element_name = "";
            if (new String(id).includes("first")){
                element_name= "first_name";
            }else if(new String(id).includes("last")){
                element_name= "last_name";

            }
            if(element.val().toString().length < 4 || element.val().toString().length > 150){
                element.siblings(".error").text("").css("display","block");
                inputs_valid[element_name]=false;
                display_error(id,"Enter a valid name. Your name should atleast have 4 letters",element_name);
                
            }
            else{
                hide_error(id,"Enter a valid name. Your name should atleast have 4 letters",element_name);


            }
            
            validate_form();
        }
        function validate_gpa(id){
            var element = $("#"+id);
            if(element.val() < 0.5 || element.val() > 4){
                element.siblings(".error").text("Enter a valid gpa").css("display","block");
                inputs_valid["gpa"]=false;
                display_error(id,"Enter a valid gpa","gpa");

                
            }
            else{
                hide_error(id,"Enter a valid gpa","gpa");

            }
            validate_form();
        }
        function validate_email(id){
            var element = $("#"+id);
            var email = new String(element.val());
            var before_At_sign = new String(email.substring(0,email.indexOf("@")));

            if(!email.includes("@") || !email.includes(".") || before_At_sign.includes("@") || before_At_sign.length < 1  || email.length < 8){
               
                display_error(id,"Enter a valid email","email");

            }
            else{
                hide_error(id,"Enter a valid email","email");

            }
            validate_form();
        }
        function validate_contact(id){
            var element = $("#"+id);
            var number_string = new String(element.val());
            
            if(number_string.length < 10 || number_string.substring(0,2) !== "05" || number_string.length > 10 ){
                
                display_error(id,"Enter a valid mobile number that starts with 05","contact");

                
            }
            else{
                hide_error(id,"Enter a valid mobile number that starts with 05","contact");

            }
            validate_form();
        }
        function validate_password(id){
            var element = $("#"+id);
            var number_string = new String(element.val());
            var matches = number_string.match(/\d+/g);
           
            if(number_string.length < 8 || matches == null){
                
                display_error(id,"Enter a valid password that contain at least one number and has one letter and is not less then 8 chars","password");

                
            }
            else{
                hide_error(id,"Enter a valid password that contain at least one number and has one letter and is not less then 8 chars","password");

            }
            validate_form();
        }
        function validate_confirm_password(id){
            var element = $("#"+id);
            var number_string = new String(element.val());
            
           
            if(element.val() !== $("#password-input").val()){
                
                display_error(id,"Confirm Password doesnt match password","confirm_password");
                
            }
            else{
                hide_error(id,"Confirm Password doesnt match password","confirm_password");

            }
            
            validate_form();
        }
        window.addEventListener("load", function() {
           
                validate_form();
            
            $("#register-form-button").on("click",(e)=>{
                e.preventDefault();
                submit_form();
            });
            
            $("#student-id-input").on("change paste keyup keypress", function() {
                var id = this.id; 
                validate_student_id(id);
             });
            
            $("#first-name-input").on("change paste keyup", function() {
                var id = this.id; 
               
                vaildate_name(id);
             });
             $("#last-name-input").on("change paste keyup", function() {
                var id = this.id; 
                vaildate_name(id);
             });
            
            $("#gpa-input").on("change paste keyup", function() {
                var id = this.id; 
                validate_gpa(id);
             });
            
            $("#email-input").on("change paste keyup", function() {
                var id = this.id; 
                validate_email(id);
             });
        
            
            $("#contact-input").on("change paste keyup", function() {
                var id = this.id; 
                validate_contact(id);
             });
        
            
            $("#password-input").on("change paste keyup", function() {
                var id = this.id; 
                validate_password(id);
             });
             
            $("#confirm-password-input").on("change paste keyup", function() {
                var id = this.id; 
                validate_confirm_password(id);
             });
         
           
           
            var pathname = window.location.pathname; 
            if(pathname.includes('edit_profile.php')){
                inputs_valid = {
                    "student_id":true,
                    "first_name":true,
                    "last_name":true,
                    "gpa":true,
                    "email":true,
                    "password":true,
                    "confirm_password":true,
                };
                console.log(inputs_valid)
                 function display_edited_registered_user(user,message){
                    
                    var name = user['name'];
                    var gpa=user['gpa'];
                    var email = user['email'];
                    var number = user['contact'];
                    
                    var activity =user['Type_of_activity'];
                    var day =user['day_of_week'];
                    var time =user['time'];
                    $('#edit_result_name').text(name);
                    $('#edit_result_email').text(email);
                  
                    $('#edit_result_number').text(number);
                    $('#edit_result_gpa').text(gpa);
                    $('#edit_result_activity').text(activity);
                    $('#edit_result_day').text(day);
                    $('#edit_result_time').text(time);
                    $('#edit_successful_pop_up').trigger('Display');
                    $(".pop_up").get(0).scrollIntoView();
                    if(String(message) == 'done'){
                        display_edited_success();
                    }else{
                        display_edited_error(message);
                    }
                }
                function display_edited_error(error){
                            
                    $("#edit_popup_img_success").css('display','none');
                    $("#edit_popup_img_error").css('display','flex');
                    $("#edit_name").css('display','none');
                    $("#edit_result_text").text(error);
                    $("#edit_details_result").css('display','none');
                }
                function display_edited_success(){
                    
                    $("#edit_popup_img_success").css('display','flex');
                    $("#edit_popup_img_error").css('display','none');
                    $("#edit_name").css('display','flex');
                    $("#edit_details_result").css('display','flex');
                    
                }
                
                function update_user(user){
                    console.log('update triggered')
                    var str =  window.location.href;
                    var lastIndex = str.lastIndexOf("/");
                    var path = str.substring(0, lastIndex);
                    var post_path = path + "/mindbenders-ajax.php";
                
                    var form_data = new FormData();
                    form_data.append('update_user', JSON.stringify(user))
                    $.ajax({
                        url: post_path,
                        type: 'post',
                        data: form_data,
                        contentType:false,
                        processData:false,
                        success: function(res){
                            var response = JSON.parse(res);
                            display_edited_registered_user(user,response.message);
                           
                            console.log(response);
                
                        },
                        error: function (err){
                            console.log(err);
                        }
                    });
                    // $("body").scrollTop($("#" + id));
                }
                
                function update_form(){
                    
                    if(validate_form()){
                       
                        var user = {
                           
                               "first_name":$("input[name='first_name']").val(),
                               "last_name":$("input[name='last_name']").val(),
                               "gpa":$("input[name='gpa']").val(),
                               "email":$("input[name='email']").val(),
                               "contact_number":$("input[name='contact_number']").val(),
                               "activity":$("input[name='activity']:checked").val(),
                               "day":$("input[name='day']:checked").val(),
                               "time":$("input[name='time']:checked").val(),
                               
                        };
                        console.log(user);
                        update_user(user);
                        
                    }
                }
                $("#edit-form-button").on("click",(e)=>{
                    console.log('button triggered')
                    e.preventDefault();
                    update_form();
                });
                    $("#edit-first-name-input").on("change paste keyup", function() {
                        var id = this.id; 
                       
                        vaildate_name(id);
                     });
                     $("#edit-last-name-input").on("change paste keyup", function() {
                        var id = this.id; 
                        vaildate_name(id);
                     });
                    $("#edit-gpa-input").on("change paste keyup", function() {
                        var id = this.id; 
                        validate_gpa(id);
                     });
                    $("#edit-email-input").on("change paste keyup", function() {
                        var id = this.id; 
                        validate_email(id);
                     });
                    $("#edit-contact-input").on("change paste keyup", function() {
                        var id = this.id; 
                        validate_contact(id);
                     });
                     $("#edit_successful_pop_up").on('Display',()=>{
                    $("#edit_successful_pop_up").css("display","block");
                        });
                    
                        
                    $("#popup_close_button").on('click',()=>{
                
                    $("#edit_successful_pop_up").css("display","none");
                    
                        });
                
                
        
            }
            if(pathname.includes('signup.php')){
                inputs_valid = {
                    "student_id":false,
                    "first_name":false,
                    "last_name":false,
                    "gpa":false,
                    "email":false,
                    "password":false,
                    "confirm_password":false,
                };
            }
        
            $("#registration_pop_up").on('Display',()=>{
                // $("body").css("overflow","hidden");
                $("#registration_pop_up").css("display","block");
                    });
        
            $("#popup_close_button").first().on('click',()=>{
                $("body").css("overflow","auto");
                $(".pop_up").css("display","none");
                
                    });
                

                    
        });
     

