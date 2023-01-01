<!-- 





<div class="py-5 col-md-6 mx-auto">
<div class="card">
    <div class="card-header">
        <h2>Login</h2>
    </div>
    <div class="card-body">


        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="email" class="form-control" id="login" name="login" aria-describedby="loginHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
    </div>


    <script>

form.js
$(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
        login: $("#login").val(),
      password: $("#password").val(),
    };

    $.ajax({
      type: "POST",
      url: "/login.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });

    event.preventDefault();
  });
});
    </script> -->