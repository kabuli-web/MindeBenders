
 function display_edited_registered_user(user){
    var id=user['student_id'];
    var name = user['name'];
    var gpa=user['gpa'];
    var email = user['email'];
    var number = user['contact'];
    
    var activity =user['Type_of_activity'];
    var day =user['day_of_week'];
    var time =user['time'];
    $('#edit_result_name').text(name);
    $('#edit_result_email').text(email);
    $('#edit_result_id').text(id);
    $('#edit_result_number').text(number);
    $('#edit_result_gpa').text(gpa);
    $('#edit_result_activity').text(activity);
    $('#edit_result_day').text(day);
    $('#edit_result_time').text(time);
    $('#edit_successful_pop_up').trigger('Display');

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
        display_edited_registered_user(user);
        member = null;
    }
}
inputs_valid = {
    "student_id":false,
    "first_name":false,
    "last_name":false,
    "gpa":false,
    "email":false,
    "password":true,
    "confirm_password":true,
};
window.onload = function(){
        
       
        $("#edit-student-id-input").on("change paste keyup keypress", function() {
            var id = this.id; 
            validate_student_id(id);
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
        
            $("#edit-form-button").on("click",(e)=>{
                e.preventDefault();
                submit_form();
            });
        $("#popup_close_button").on('click',()=>{

        $("#edit_successful_pop_up").css("display","none");
        
            });
}