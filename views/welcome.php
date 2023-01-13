

<section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          
        <?php
        use app\core\Application;

        if (Application::$app->user) {
            echo '<h2> Welcome ' . ucfirst(strtolower(Application::$app->user['name'] )) . '</h2>';
        }
        ?> 
          <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
       
        </div>
      </div>
    </div>
  </section>