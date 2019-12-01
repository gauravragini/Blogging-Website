$(function() {
    
  $("form[name='login']").validate({
    // Specify validation rules
    rules: {
      email: {
        required: true,
        email: true
      },
      pass: {
        required: true,
        minlength: 6
      }
    },
    // Specify validation error messages
    messages: {
      pass: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
      email: "Please enter a valid email  address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
    
      $("form[name='signin']").validate({
    // Specify validation rules
    rules: {
      mail: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      }
    },
    // Specify validation error messages
    messages: {
      password: {
        required: "Please provide a password",
        length: "Your password must be at least 6 characters long"
      },
      mail: "Please enter a valid email  address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
    
            


    
});


    

    
