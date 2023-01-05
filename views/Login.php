
<section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="py-5 col-md-6 mx-auto">
                    <h2>Login</h2>
                    <?php

                    use app\core\Application;

                    if (Application::$app->session->getFlash('warning')) : ?>
                        <div class="alert alert-danger ">
                            <?php echo Application::$app->session->getFlash('warning'); ?>
                        </div>
                    <?php endif;
                    ?>

                    <div id="success"></div>

                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-white">Login</label>
                            <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp">
                            <div id="login_error" class="form-text text-white"></div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div id="password_error" class="form-text text-white"></div>
                        </div>

                        <a class="btn btn-primary login">Submit</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>