
inputs_valid = {
    "student_id":true,
    "first_name":true,
    "last_name":true,
    "gpa":true,
    "email":true,
    "password":true,
    "confirm_password":true,
};
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
        display_registration_success();
    }else{
        display_registration_error(message);
    }
}
function display_registration_error(error){
            
    $("#edit_popup_img_success").css('display','none');
    $("#edit_popup_img_error").css('display','flex');
    $("#edit_name").css('display','none');
    $("#edit_result_text").text(error);
    $("#edit_details_result").css('display','none');
}
function display_registration_success(){
    
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

window.onload = function(){
        
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