





<div class="py-5 col-md-6 mx-auto">
<div class="card">
    <div class="card-header">
        <h2>Login</h2>
    </div>
    <div class="card-body">


        <form action="" method="post">
        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp">
                <div id="login_error" class="form-text text-danger"></div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <div id="password_error" class="form-text text-danger"></div>
            </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
    </div>










    <script>


$(document).ready(function () {
  $("form").submit(function (event) {
    
    var formData = {
      
      login: $("#login").val(),
      password: $("#password").val(),
  
   
    };

    $.ajax({
      type: "POST",
      url: "/login",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
     
      if (!data.success) {
       if (data.errors.login) { 
      $("#login").addClass("is-invalid");
          $("#login_error").text(data.errors.login );
      }else{
        $("#login").attr('class', 'form-control is-valid');
        $("#login_error").text('');
      }
      if (data.errors.password) { 
      $("#password").addClass("is-invalid");
          $("#password_error").text(data.errors.password );
      }else{
        $("#password").attr('class', 'form-control is-valid');
        $("#password_error").text('');
      }
    } else {
        window.location.href = "/welcome";
      }
   
    });

    event.preventDefault();
  });
});
    </script> 