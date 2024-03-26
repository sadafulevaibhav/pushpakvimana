<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Button;
use yii\bootstrap4\BootstrapAsset;

// BootstrapAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">

<?php $this->beginBody() ?>

<header>
<div class="d-none d-sm-none d-md-none d-lg-block">
      <div class="desktop-header">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto">
              <a href="index.html"><img src="images/logo.svg" class="img-fluid" alt="" /></a>
            </div>
            <div class="col-auto">
              <nav>
                <ul>
                  <li><a href="index.html">HOME</a></li>
                  <li><a href="index.html">ABOUT US</a></li>
                  <li><a href="index.html">CONTACT US</a></li>
                  <li>
                    <a href="#toursmenu" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="toursmenu">TOURS</a>
                    <div class="collapse" id="toursmenu">
                      <div class="card card-body">
                        <ul>
                          <li><a href="#"><img src="images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu2.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu3.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu2.png" class="img-fluid" alt=""></a></li>
                        </ul>

                        <ul>
                          <li><a href="#"><img src="images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu3.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu2.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu3.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu1.png" class="img-fluid" alt=""></a></li>
                        </ul>

                        <ul>
                          <li><a href="#"><img src="images/submenu3.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu2.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="images/submenu2.png" class="img-fluid" alt=""></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li><a href="index.html">GALLERY</a></li>
                </ul>
                <div class="right-btn">
                  <a href="#" class="upcoming-btn"><img src="images/flight-icon.svg" class="img-fluid" alt="" />
                    UPCOMING TOURS
                    <img src="images/map-icon.svg" class="img-fluid" alt="" />
                  </a>
                  <a href="#" class="myAccount-btn">MY ACCOUNT
                    <img src="images/pfp-circle.svg" class="img-fluid" alt="" /></a>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none">
      <div class="mobile-header">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto">
              <a href="index.html"><img src="images/logo.svg" class="img-fluid" alt="" /></a>
            </div>
            <div class="col-auto">
              <a href="#" class="menu-btn" data-bs-toggle="modal" data-bs-target="#menu-modal"><img
                  src="images/hamburger-icon.svg" class="img-fluid" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</header>

<main role="main" class="flex-shrink-0">
    
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    
</main>

<footer class="footer mt-auto py-3 text-muted">
<div class="container-fluid">
      <div class="row align-items-center justify-content-center justify-content-lg-between">
        <div class="col-auto">
          <a href="index.html"><img src="images/light-logo.svg" class="img-fluid" alt="" /></a>
          <form action="" class="common-form">
            <input type="email" class="form-control" placeholder="Enter Email......." />
            <button class="primary-btn">SUBSCRIBE</button>
          </form>
          <p class="para">All Rights Reserved At Pushpaka Vimana 2024</p>
        </div>
        <div class="col-auto">
          <div class="find-us-sec">
            <h3>FIND US ON</h3>
            <div class="social-icon">
              <a href="#"><img src="images/facebook-icon.svg" class="img-fluid" alt="" /></a>
              <a href="#"><img src="images/instagram-icon.svg" class="img-fluid" alt="" /></a>
              <a href="#"><img src="images/twitter-icon.svg" class="img-fluid" alt="" /></a>
              <a href="#"><img src="images/youTube-icon.png" class="img-fluid" alt="" /></a>
            </div>
            <h3>Contact Us On</h3>
            <ul>
              <li>
                <a href="mailto:pushpakavimana@gmail.com" class="para"><img src="images/mail-icon.svg"
                    alt="" />pushpakavimana@gmail.com</a>
              </li>
              <li>
                <a href="mailto:pushpakavimana@gmail.com" class="para"><img src="images/phone-icon.svg" alt="" />+91
                  9739734452 /
                  9739744456</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</footer>
<!-- header modal  start -->

<div class="modal fade" id="menu-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
              <div class="col-auto">
                <a href="index.html"><img src="images/logo.svg" class="img-fluid" alt="" /></a>
              </div>
              <div class="col-auto text-end">
                <button type="button" class="btn-closed" data-bs-dismiss="modal" aria-label="Close">
                  <img src="images/cross-icon.svg" class="img-fluid" alt="" />
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <nav>
            <ul>
              <li><a href="index.html">HOME</a></li>
              <li><a href="index.html">ABOUT US</a></li>
              <li><a href="index.html">CONTACT US</a></li>
              <li><a href="index.html">TOURS</a></li>
              <li><a href="index.html">GALLERY</a></li>
            </ul>
            <div class="right-btn">
              <a href="#" class="upcoming-btn"><img src="images/flight-icon.svg" class="img-fluid" alt="" />
                UPCOMING TOURS
                <img src="images/map-icon.svg" class="img-fluid" alt="" />
              </a>
              <a href="#" class="myAccount-btn">MY ACCOUNT
                <img src="images/pfp-circle.svg" class="img-fluid" alt="" /></a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <?php
$script = <<< JS
    $(".owl-carousel.welcome-carousel").owlCarousel({
      loop: true,
      margin: 20,
      dots: false,
      nav: true,
      autoplay:true,
      autoPlay : 5000,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });
    $(".owl-carousel.testimonials-owl").owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
      dots: true,
      autoplay:true,
      autoPlay : 5000,
      responsive: {
        0: {
          items: 1, center: true,
        },
        600: {
          items: 3, center: true, autoWidth: true,
        },
        1000: {
          items: 3,
        },
      },
    });
    $('.owl-carousel.client_carousel  ').owlCarousel({
    loop:true,
    margin: 20,
    nav:false,
    dots: false,
    center:true,
    autoWidth: true,
    autoplay:true,
    autoPlay : 5000,
    responsive:{
        0:{
            items:3
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
JS;
$this->registerJs($script);

// $this->registerJsFile(Yii::$app->request->baseUrl.'/js/moment.min.js', ['depends' => [\yii\web\JqueryAsset::className()], ['position' => \yii\web\View::POS_END]]);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
