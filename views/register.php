<section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class=" col-md-8 mx-auto">

                    <h2>Create an account</h2>
                    <?php
                    use app\core\Application;

                    if (Application::$app->session->getFlash('warning')): ?>
                        <div class="alert alert-danger ">
                            <?php echo Application::$app->session->getFlash(
                                'warning'
                            ); ?>
                        </div>
                    <?php endif;
                    ?>
                    <div id="success"></div>
                    <form action="" method="post">
                    <div class="row">
                        <div class="col">
                        <div class="mb-3 ">
                            <label for="exampleInputEmail1" class="form-label text-white">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                            <div id="name_error" class="form-text text-white"></div>
                        </div>
                        </div>
                        <div class="col">
                        <div class="mb-3 ">
                            <label for="exampleInputEmail1" class="form-label text-white">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="nameHelp">
                            <div id="lastname_error" class="form-text text-white"></div>
                        </div>
                    </div>
                    </div>     
                        <div class="mb-3">
                            <label class="form-label text-white">Login</label>
                            <input type="text" class="form-control" id="login" name="login">

                            <div id="login_error" class="form-text text-white"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Email</label>
                            <input type="email" class="form-control" id="email" name="email">

                            <div id="email_error" class="form-text text-white"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div id="password_error" class="form-text text-white"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        
                            <div id="confirm_password_error" class="form-text text-white passwords"></div>
                        </div>

                        <a" class="btn btn-primary register">Submit</a>
                    </form>

                </div>

            </div>
        </div>
</section>