





<div class="py-5 col-md-6 mx-auto">
<div class="card">
    <div class="card-header">
        <h2>Login</h2>
        <?php
        use app\core\Application;

         
     
        if (Application::$app->session->getFlash('warning')): ?>
        <div class="alert alert-danger">
        <?php echo Application::$app->session->getFlash('warning'); ?>
          </div>
        <?php endif;
        ?>
        

        <div id="success"></div>
    
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
         
            <button type="submit" class="btn btn-primary login">Submit</button>
        </form>
    </div>
</div>
    </div>


