        var inputs_valid = {
            "student_id":false,
            "first_name":false,
            "last_name":false,
            "gpa":false,
            "email":false,
            "password":false,
            "confirm_password":false,
        };

        function display_new_registered_user(user){
            var id=user['student_id'];
            var name = user['name'];
            var gpa=user['gpa'];
            var email = user['email'];
            var number = user['contact'];
            
            var activity =user['Type_of_activity'];
            var day =user['day_of_week'];
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

        }
        function Register_member(obj){
            var form_data = new FormData();
            form_data['new_user'] = 'user 1 ';
            $.ajax({
                url: window.location.href,
                type: 'post',
                data: form_data,
                success:(response)=>{
           
                    console.log(response);
                
                   },
                   error:(err)=>{
                       console.log(err);
                   }
            });
            // $("body").scrollTop($("#" + id));
        }
        function submit_form(){
            if(validate_form()){
                var user = {
                   "student_id":$("#student-id-input").val(),
                       "first_name":$("#first-name-input").val(),
                       "last_name":$("#last-name-input").val(),
                       "gpa":$("#gpa-input").val(),
                       "email":$("#email-input").val(),
                       "contact":$("#contact-input").val(),
                       "password":$("#password-input").val(),
                       "confirm_password":$("#confirm-password-input").val(),
                       "Type_of_activity":$("input[name='activity']:checked").val(),
                       "day_of_week":$("input[name='day']:checked").val(),
                       "time":$("input[name='time']:checked").val(),
                       
                };
                // Register_member(member);
                display_new_registered_user(user);
                member = null;
            }
        }
        function disable_form_button(){
            $("#register-form-button").removeClass("secondary-button");
            $("#register-form-button").addClass("disabled-secondary-button").prop("disabled","true");
            
            
        }
        function enable_form_button(){
            $("#register-form-button").removeClass("disabled-secondary-button");
            $("#register-form-button").addClass("secondary-button").removeAttr("disabled");
        
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
        window.onload = function() {

        $("#register-form-button").on("click",(e)=>{
            e.preventDefault();
            submit_form();
        });
        disable_form_button();
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
        if(pathname.includes('signup.php')){
            

        }
    
        $("#registration_pop_up").on('Display',()=>{
            // $("body").css("overflow","hidden");
            $("#registration_pop_up").css("display","block");
                });
    
        $("#popup_close_button").on('click',()=>{
            $("body").css("overflow","auto");
            $("#registration_pop_up").css("display","none");
            
                });
     }

     

