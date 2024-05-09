<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use johnitvn\ajaxcrud\CrudAsset;
// use yii\widgets\ActiveForm;
// use yii\bootstrap5\Nav;
// use yii\bootstrap5\NavBar;
// use yii\bootstrap5\Button;
// use yii\bootstrap5\BootstrapAsset;

// BootstrapAsset::register($this);
AppAsset::register($this);

CrudAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,maximum-scale=1">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <link rel="shortcut icon" href="<?= Yii::$app->homeUrl ?>icons/favicon.ico" />
  <link rel="icon" type="image/x-icon" href="<?= Yii::$app->homeUrl ?>icons/favicon.ico" />
  <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">

  <?php $this->beginBody() ?>

  <header>
  <?php 
      // NavBar::begin(['brandLabel' => 'NavBar Test']);
      // echo Nav::widget([
      //     'items' => [
      //         ['label' => 'HOME', 'url' => [Yii::$app->homeUrl]],
      //         ['label' => 'ABOUT US', 'url' => [Yii::$app->homeUrl.'#about-us']],
      //         ['label' => 'CONTACT US', 'url' => [Yii::$app->homeUrl.'#contact-us']],
      //         ['label' => 'TOURS', 'url' => [Yii::$app->homeUrl.'#upcomming-tours']],
      //     ],
      //     'options' => ['class' => 'navbar-nav'],
      // ]);
      // NavBar::end();
    ?>
    <div class="d-none d-sm-none d-md-none d-lg-block fixed-top">
      <div class="desktop-header">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto">
              <a href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::$app->homeUrl ?>images/Gplogo.png" alt="Logo" class="logo" alt="" /></a>
            </div>
            <div class="col-auto">
              <nav>
                <ul>
                  <li><a href="<?= Yii::$app->homeUrl ?>">HOME</a></li>
                  <li><a href="<?= Yii::$app->homeUrl ?>#about-us">ABOUT US</a></li>
                  <li><a href="<?= Yii::$app->homeUrl ?>#contact-us">CONTACT US</a></li>
                  <li>
                  <a href="<?= Yii::$app->homeUrl ?>#upcomming-tours">TOURS</a>
                    <!-- <a href="#toursmenu" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="toursmenu">TOURS</a> -->
                    <div class="collapse" id="toursmenu">
                      <div class="card card-body">
                        <ul>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu2.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu3.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu2.png" class="img-fluid" alt=""></a></li>
                        </ul>

                        <ul>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu3.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu2.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu3.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu1.png" class="img-fluid" alt=""></a></li>
                        </ul>

                        <ul>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu3.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu2.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu1.png" class="img-fluid" alt=""></a></li>
                          <li><a href="#"><img src="<?= Yii::$app->homeUrl ?>images/submenu2.png" class="img-fluid" alt=""></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li><a href="<?= Yii::$app->homeUrl ?>#galary">GALLERY</a></li>
                </ul>
                <div class="right-btn">
                  <a href="<?= Yii::$app->homeUrl ?>#upcomming-tours" class="upcoming-btn"><img src="<?= Yii::$app->homeUrl ?>images/flight-icon.svg" class="img-fluid" alt="" />
                    UPCOMING TOURS
                    <img src="<?= Yii::$app->homeUrl ?>images/map-icon.svg" class="img-fluid curve-image" alt="" />
                  </a>
                  <?php if (Yii::$app->user->isGuest) { ?>
                    <a href="<?= Yii::$app->homeUrl . 'site/login' ?>" class="myAccount-btn d-none">LOGIN
                      <img src="<?= Yii::$app->homeUrl ?>images/pfp-circle.svg" class="img-fluid curve-image" alt="" /></a>
                  <?php } else { ?>
                    <a href="#" class="myAccount-btn d-none"><?= Yii::$app->user->identity->firstname . ' ' . Yii::$app->user->identity->lastname; ?>
                      <img src="<?= Yii::$app->homeUrl ?>images/pfp-circle.svg" class="img-fluid curve-image" alt="" /></a>
                  <?php } ?>
                </div>

                </li>
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
              <a href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::$app->homeUrl ?>images/Gplogo.png" class="logo" alt="logo" /></a>
            </div>
            <div class="col-auto">
              <a href="#" class="menu-btn" data-bs-toggle="modal" data-bs-target="#menu-modal"><img src="<?= Yii::$app->homeUrl ?>images/hamburger-icon.svg" class="img-fluid" alt="" /></a>
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

  <!-- header modal  start -->

  <div class="modal fade" id="menu-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
              <div class="col-4">
                <a href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::$app->homeUrl ?>images/Gplogo.png" class="img-fluid" alt="" /></a>
              </div>
              <div class="col-2 text-end">
                <button type="button" class="btn-closed" data-bs-dismiss="modal" aria-label="Close">
                  <img src="<?= Yii::$app->homeUrl ?>images/cross-icon.svg" class="img-fluid" alt="" />
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav">
              <li><a class="click-nav" data-target="" href="<?= Yii::$app->homeUrl ?>">HOME</a></li>
              <li><a class="click-nav" data-target="about-us" href="<?= Yii::$app->homeUrl ?>#about-us">ABOUT US</a></li>
              <li><a class="click-nav" data-target="contact-us" href="<?= Yii::$app->homeUrl ?>#contact-us">CONTACT US</a></li>
              <li><a class="click-nav" data-target="upcomming-tours" href="<?= Yii::$app->homeUrl ?>#upcomming-tours">TOURS</a></li>
              <li><a class="click-nav" data-target="galary" href="<?= Yii::$app->homeUrl ?>#galary">GALLERY</a></li>
            </ul>
            <div class="right-btn">
              <a href="<?= Yii::$app->homeUrl ?>#upcomming-tours" class="upcoming-btn click-nav" data-target="upcomming-tours"><img src="<?= Yii::$app->homeUrl ?>images/flight-icon.svg" class="img-fluid" alt="" />
                UPCOMING TOURS
                <img src="<?= Yii::$app->homeUrl ?>images/map-icon.svg" class="img-fluid" alt="" />
              </a>
              <?php if (Yii::$app->user->isGuest) { ?>
                <a href="#" class="myAccount-btn d-none">LOGIN
                  <img src="<?= Yii::$app->homeUrl ?>images/pfp-circle.svg" class="img-fluid" alt="" /></a>
              <?php } else { ?>
                <a href="#" class="myAccount-btn d-none">MY ACCOUNT
                  <img src="<?= Yii::$app->homeUrl ?>images/pfp-circle.svg" class="img-fluid" alt="" /></a>
              <?php } ?>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <footer class="">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-center justify-content-lg-between">
        <div class="col-auto">
          <a href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::$app->homeUrl ?>images/go-pravasa-logo4-03.png" class="logo" alt="" /></a>
          <!-- <form action="" class="common-form">
            <input type="email" class="form-control" placeholder="Enter Email......." />
            <button class="primary-btn">SUBSCRIBE</button>
          </form> -->
        </div>
        <div class="col-auto">
          <div class="enq-sec text-center text-lg-end">
            <?=
            Html::a(
              'ENQUIRE<span class="br-sm"></span><br>NOW',
              // "<img src =".Yii::$app->homeUrl."images/enquiry-icon.png>",
              ['site/create-enquiry'],
              ['role' => 'modal-remote', 'class' => 'btn-custom','id'=>'enquiry_btn', 'data-pjax' => 1]
            )
            ?>
            <!--<a href="#" class="view-btn">Inquire</a>-->
          </div>
          <div class="whatsapp-chat">
            <a href="https://wa.me/919606024617" target="_blank" rel="noopener noreferrer">
              <img src="<?=Yii::$app->homeUrl."images/WhatsApp_icon.png"?>" alt="WhatsApp Chat">
            </a>
          </div>
          <div class="find-us-sec" id ='contact-us'>
            <h3>FIND US ON</h3>
            <div class="social-icon">
              <a href="https://www.facebook.com/profile.php?id=61556551333251&mibextid=kFxxJD" target="_blank"><img src="<?= Yii::$app->homeUrl ?>images/fb.png" class="img-fluid" alt="" /></a>
              <a href="https://www.instagram.com/gopravasa?igsh=YmEwOWI5ZXh3aXBk" target="_blank"><img src="<?= Yii::$app->homeUrl ?>images/insta.png" class="img-fluid" alt="" /></a>
              <a href="https://x.com/go_pravasa?s=21" target="_blank"><img src="<?= Yii::$app->homeUrl ?>images/twitter.png" class="img-fluid" alt="" /></a>
              <a href="https://youtube.com/@gopravasa?si=taiGvKqI7NykCv_x" target="_blank"><img src="<?= Yii::$app->homeUrl ?>images/youtube.png" class="img-fluid" alt="" /></a>
            </div>
            <h3>Contact Us On</h3>
            <ul>
              <li>
                <a href="mailto:info@gopravasa.com" class="para"><img src="<?= Yii::$app->homeUrl ?>images/mail-icon.svg" alt="" />info@gopravasa.com</a>
              </li>
              <li>
                <a href="mailto:info@gopravasa.com" class="para"><img src="<?= Yii::$app->homeUrl ?>images/phone-icon.svg" alt="" />+91
                  9739734452 /
                  9739744456</a>
                  <!-- <p class="para">©  <?= date('Y');?> Pushpaka Vimana Travels and Tours Pvt Ltd. All rights reserved.</p> -->
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto">
           <span class="para">©  <?= date('Y');?> Pushpaka Vimana Travels and Tours Pvt Ltd. All rights reserved.</span>
        </div>
      </div>
    </div>
  </footer>
  <?php Modal::begin([
  "id" => "ajaxCrudModal",
  //   'titleOptions' => [
  //     'style' => 'background: rgba(0, 0, 0, 0.5)',
  // ],
    'headerOptions' =>['id' => 'modalHeader','class' =>'custom-modalheader'],
    'footerOptions' =>['id' => 'modalFooter','class' =>'custom-modalfooter'],
    'closeButton' => [
      'class' => 'btn-close',
      ],
    'title' => '',
    'size' => 'modal-lg',
    
    "footer" => "", // always need it for jquery plugin
    
  ]) ?>
  <?php Modal::end(); ?>

  <?php
  $script = <<< JS
    $(document).on('click','.click-nav', function(e){
      
      $('.btn-closed').trigger('click');
      var ele = $(this).data('target'); 
      if(typeof $('#'+ele).html() != 'undefined' ) {
        e.preventDefault();
          setTimeout(() => {
            document.getElementById($(this).data('target')).scrollIntoView();
          }, 500); // Delay to ensure modal is fully closed before scrolling
      }
      
    });
    
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
  setTimeout(() => {
              $('#enquiry_btn').trigger('click');
  }, 1000);
JS;
  $this->registerJs($script);

  // $this->registerJsFile(Yii::$app->request->baseUrl.'/js/moment.min.js', ['depends' => [\yii\web\JqueryAsset::className()], ['position' => \yii\web\View::POS_END]]);
  ?>
  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
