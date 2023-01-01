
<div class="py-5 col-md-6 mx-auto">
<div class="card">
    <div class="card-header">
        <h2>Create an account</h2>
    </div>
    <div class="card-body">


        <form action="" method="post">
        <div class="mb-3 " >
          
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                <div id="name_error" class="form-text text-danger"></div>
                <?php  //$model->geterrors('name'); ?> 
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <?php //echo $model->geterrors('email'); ?>
                <div id="email_error" class="form-text text-danger"></div>
               
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp">
                <?php // echo $model->geterrors('login'); ?>
                <div id="login_error" class="form-text text-danger"></div>
            </div>
           
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <?php //echo $model->geterrors('password'); ?>
                <div id="password_error" class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                <?php // echo $model->geterrors('confirm_password'); ?>
                <div id="confirm_password_error" class="form-text text-danger"></div>
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
      name: $("#name").val(),
      email: $("#email").val(),
      login: $("#login").val(),
      password: $("#password").val(),
      confirm_password: $("#confirm_password").val(),
   
    };

    $.ajax({
      type: "POST",
      url: "/register",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (errors) {
      console.log(errors);

      if (errors.name) { 
      $("#name").addClass("is-invalid");
          $("#name_error").text(errors.name );
      }else{
        $("#name").removeClass("is-invalid");
        $("#name_error").text('');
      }
      if (errors.email) { 
      $("#email").addClass("is-invalid");
          $("#email_error").text(errors.email );
      }else{
        $("#email").removeClass("is-invalid");
        $("#email_error").text('');
      }
      if (errors.login) { 
      $("#login").addClass("is-invalid");
          $("#login_error").text(errors.login );
      }else{
        $("#login").removeClass("is-invalid");
        $("#login_error").text('');
      }
      if (errors.password) { 
      $("#password").addClass("is-invalid");
          $("#password_error").text(errors.password );
      }else{
        $("#password").removeClass("is-invalid");
        $("#password_error").text('');
      }
      if (errors.confirm_password) { 
      $("#confirm_password").addClass("is-invalid");
          $("#confirm_password_error").text(errors.confirm_password );
      }else{
        $("#confirm_password").removeClass("is-invalid");
        $("#confirm_password_error").text('');
      }
    });

 


    event.preventDefault();
  }); 
}); 





// ...
</script>
