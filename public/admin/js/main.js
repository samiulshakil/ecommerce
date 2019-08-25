    $(function () {
  $("#testValid").validate({
    // Specify the validation rules
    rules: {
      brand_name: 'required',
      brand_description: 'required',
     /* publication_status: {
          required: true 
        }, */  
   },
    // Specify the validation error messages
    messages: {
      brand_name: 'Please Enter Brand Name',
      brand_description: 'Please Enter Brand Description',
    },
    submitHandler: function (form) {
      form.submit();
    }
  });


});