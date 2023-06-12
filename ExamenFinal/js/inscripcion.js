$(document).ready(function() {
    let form = $('#register_form');
    let fieldsets = form.find('fieldset');
  
    for (i = 1; i < fieldsets.length; i++) {
      $(fieldsets[i]).hide();
    }
  
    $(".next").click(function() {
  
      current_step = $(this).parent();
      next_step = $(this).parent().next();
      next_step.show();
      current_step.hide();
    });
  
    $(".previous").click(function() {
      current_step = $(this).parent();
      prev_step = $(this).parent().prev();
      prev_step.show();
      current_step.hide();
  
    });
  
    // Handle form submit and validation
    $("#register_form").submit(function(event) {
      var error_message = '';
      if (!$("#email").val()) {
        error_message += "Please Fill Email Address";
      }
      if (!$("#password").val()) {
        error_message += "<br>Please Fill Password";
      }
      if (!$("#mobile").val()) {
        error_message += "<br>Please Fill Mobile Number";
      }
      // Display error if any else submit form
      if (error_message) {
        $('.alert-success').removeClass('hide').html(error_message);
        return false;
      } else {
        return true;
      }
    });
  });