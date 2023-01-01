$(document).ready(function () {
    $("form").submit(function (event) {
  
      var formData = {
        name: $("#name").val(),
        password: $("#password").val(),
       
      };
  
      $.ajax({
        type: "POST",
        url: "register.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
      });
  
      event.preventDefault();
    });
  });

