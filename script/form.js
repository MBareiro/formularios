$(document).ready(function(){  
  var form_count = 1, previous_form, next_form, total_forms;
  total_forms = $("fieldset").length;  
  $(".next-form").click(function(){
    previous_form = $(this).parent();
    next_form = $(this).parent().next();
    next_form.show();
    previous_form.hide();
    setProgressBarValue(++form_count);
  });  
  $(".previous-form").click(function(){
    previous_form = $(this).parent();
    next_form = $(this).parent().prev();
    next_form.show();
    previous_form.hide();
    setProgressBarValue(--form_count);
  });
  setProgressBarValue(form_count);  
  function setProgressBarValue(value){
    var percent = parseFloat(100 / total_forms) * value;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }
  $( "#register_form" ).submit(function(event) {    
    var error_message = '';
    if(!$("#usuario").val()) {
      error_message+="Usuario";
    }
    if(!$("#apellido").val()) {
      error_message+="<br>Apellido";
    }
    if(!$("#email").val()) {
      error_message+="<br>Email";
    }
    if(!$("#dni").val()) {
      error_message+="<br>dni";
    }
    if(!$("#fechanacimiento").val()) {
      error_message+="<br>fecha de nacimiento";
    }


    // Display error if any else submit form
    if(error_message) {
      $('.alert-success').removeClass('hide').html(error_message);
      return false;
    } else {
      return true;	
    }    
    });   
  
  
});