<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Pushpaka Vimana';
?>
<!-- ********* Home page start ********* -->

<div class="welcome-page">
  <div class="owl-carousel welcome-carousel owl-theme">
    <div class="item">
      <div class="img-wrap">
        <img src="images/ayodhya06.jpg" class="img-fluid" alt="">
        <!-- <video loop muted autoplay class="d-block w-100">
          <source src="videos/about-top-video.mp4" type="video/mp4">
        </video> -->
      </div>
    </div>
    <div class="item">
      <div class="img-wrap">
        <img src="images/ayodhya06.jpg" class="img-fluid" alt="">
        <!-- <video loop muted autoplay class="d-block w-100">
          <source src="videos/about-top-video.mp4" type="video/mp4">
        </video> -->
      </div>
    </div>
  </div>
</div>
<!--
<div class="container">
  <div class="our-services-sec">
    <ul>
      <li>
        <a href="#"><img src="images/airplane-icon.svg" class="img-fluid" alt="" />Flights</a>
      </li>
      <li>
        <a href="#"><img src="images/high-Speed-Train-icon.svg" class="img-fluid" alt="" />Trains</a>
      </li>
      <li>
        <a href="#"><img src="images/building-icon.svg" class="img-fluid" alt="" />Hotels</a>
      </li>
      <li>
        <a href="#"><img src="images/passport-icon.svg" class="img-fluid" alt="" />Visa</a>
      </li>
      <li>
        <a href="#"><img src="images/insurance-Agent-icon.svg" class="img-fluid" alt="" />Travel Insurance</a>
      </li>
    </ul>
  </div>
</div>
-->

<div class="tours-sec">
  <div class="container">
    <h2>TOURS</h2>
    <h4>
      "Embark on a Mythical Journey with Pushpaka Vimana Your Gateway to
      Timeless Travel Experiences!"
    </h4>
  </div>
</div>
<div class="upcomming-tours-sec" id="upcomming-tours">
  <h2 class="secondary-heading">UPCOMING TOURS IN 2024</h2>
  <div class="upcomming-tours-wrap">
    <div class="container-fluid">
      <div class="row upcomming-tours-flex">
      <!-- <div class="upcomming-tours-flex"> -->
        <?php foreach ($dataCountryProvider->getModels() as $country) : ?>
          <div class="col-md-3 upcomming-card mt-3">
            <?php
            $imageSource = null;
            $defaultImageName = 'default.png'; // Replace with the name of your default image file
            $defaultImagePath = Yii::getAlias('@backend/web/uploads/DestinationCountry/' . $defaultImageName);

            if (!empty($country->destination_media)) {
              $imagePath = Yii::getAlias('@backend/web/uploads/DestinationCountry/' . $country->destination_media);
              if (file_exists($imagePath)) {
                $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $imagePath));
              }
            }

            if (empty($imageSource)) {
              $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $defaultImagePath));
            }
            ?>
            <?php if ($country->id) { ?>
                <!-- <a href="<?= Yii::$app->homeUrl . 'traveler-booking/packages-page?id=' ?><?= Html::encode($country->id) ?>"> -->
                <a href="#">
                  <?= Html::img($imageSource, ['class' => 'img-fluid rounded-3', 'alt' => $country->country_name]) ?>
                </a>
                <!-- <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 15px;">sdsdsd</div> -->
              <span style="position: absolute; bottom: 15px; left: 25px;"><?= Html::encode($country->country_name) ?></span>
            <?php } ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<div class="category-sec pt-5 d-none">
  <h2 class="secondary-heading">CATEGORY</h2>
  <div class="container">
    <div class="category-overflow">
      <div class="category-flex">
        <div class="category-flex-wrap">
          <div class="cartegory-card">
            <img src="images/honeymoon-img.png" class="img-fluid" alt="" />
            <a href="#">HONEYMOON PACKAGE</a>
          </div>
          <div class="cartegory-card">
            <img src="images/treking-img.png" class="img-fluid" alt="" />
            <a href="#">TREKING PACKAGE</a>
          </div>
        </div>
        <div class="cartegory-card">
          <img src="images/domestic-img.png" class="img-fluid" alt="" />
          <a href="#">DOMESTIC PACKAGE</a>
        </div>
        <div class="category-flex-wrap">
          <div class="cartegory-card">
            <img src="images/adventerous-img.png" class="img-fluid" alt="" />
            <a href="#">ADVENTEROUS PACKAGE</a>
          </div>
          <div class="cartegory-card">
            <img src="images/family-img.png" class="img-fluid" alt="" />
            <a href="#"> FAMILY PACKAGE</a>
          </div>
        </div>
      </div>
      <div class="text-center text-lg-end">
        <a href="#" class="view-btn">VIEW ALL</a>
      </div>
    </div>
  </div>
</div>

<div class="about-us-sec" id="about-us">
  <div class="container">
    <h2 class="secondary-heading">ABOUT US</h2>
    <div class="about-flex-overflow">
      <div class="about-us-flex">
        <?php foreach ($dataAboutUsProvider->getModels() as $aboutus) : ?>
          <div class="about-card">
            <div class="about-card-content">
              <h6><?= Html::encode($aboutus->title) ?></h6>
              <p><?= Html::encode($aboutus->content,false) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!--
<div class="gallery-sec">
  <div class="container">
    <h2 class="secondary-heading">GALLERY</h2>
    <div class="gallery-flex">
      <div class="img-wrap-first d-flex">
        <div class="img-wrap d-flex">
          <div class="img">
            <img src="images/gallery1.png" class="img-fluid" alt="" />
          </div>
          <div class="img">
            <img src="images/gallery2.png" class="img-fluid" alt="" />
          </div>
        </div>
        <div class="img">
          <img src="images/gallery3.png" class="img-fluid" alt="" />
        </div>
      </div>
      <div class="img">
        <img src="images/gallery4.png" class="img-fluid" alt="" />
      </div>
    </div>
    <div class="text-center text-lg-end">
      <a href="#" class="view-btn">VIEW MORE</a>
    </div>
  </div>
</div>
-->
<div class="gallery-sec" id="galary">
  <div class="container">
    <h2 class="secondary-heading">GALLERY</h2>
    <div class="gallery-flex">
      <div class="img-wrap-first d-flex">
        <div class="img-wrap d-flex">
          <?php foreach ($dataDestinationMediaProvider->getModels() as $destinationmedia) : ?>
            <div class="img">
              <?php
              $imageSource = null;
              $defaultImageName = 'default.png'; // Replace with the name of your default image file
              $defaultImagePath = Yii::getAlias('@backend/web/uploads/DestinationMedia/images/' . $defaultImageName);

              if (!empty($destinationmedia->media_file)) {
                $imagePath = Yii::getAlias('@backend/web/uploads/DestinationMedia/images/' . $destinationmedia->media_file);
                if (file_exists($imagePath)) {
                  $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $imagePath));
                }
              }

              if (empty($imageSource)) {
                $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $defaultImagePath));
              }
              ?>
                <?= Html::img($imageSource, ['class' => 'img-fluid rounded-3', 'alt' => 'destination-media']) ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="testimonials-sec d-none">
  <h2 class="secondary-heading">TESTIMONIALS</h2>
  <div class="testimonials-wrap">
    <div class="container">
      <div class="owl-carousel testimonials-owl owl-theme">
        <?php foreach ($dataAppTestimonialsProvider->getModels() as $app_testimonial) {  ?>
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <?= Html::img(Yii::$app->urlManagerAdmin->baseUrl . '/uploads/AppTestimonial/' . $app_testimonial->testimonial_image, ['class' => 'img-fluid', 'alt' => $country->country_name]) ?>
                <div class="text-wrap">
                  <h3><?= Html::encode($app_testimonial->full_name) ?></h3>
                  <h4><?= Html::encode($app_testimonial->designation) ?></h4>
                </div>
              </div>
              <ul class="d-flex justify-content-center mt-0 mb-4">
                <li>
                  <img src="images/star-icon.svg" class="img-fluid" alt="" />
                </li>
                <li>
                  <img src="images/star-icon.svg" class="img-fluid" alt="" />
                </li>
                <li>
                  <img src="images/star-icon.svg" class="img-fluid" alt="" />
                </li>
                <li>
                  <img src="images/star-icon.svg" class="img-fluid" alt="" />
                </li>
                <li>
                  <img src="images/star-icon.svg" class="img-fluid" alt="" />
                </li>
              </ul>
              <div class="para">
                <p>
                  <?= Html::encode($app_testimonial->comment) ?>
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- <div class="our-client-sec">
  <div class="container-fluid g-0">
    <h2 class="secondary-heading">OUR CLIENTS</h2>
    <div class="owl-carousel client_carousel owl-theme">
      <div class="item">
        <img src="images/client-1.png" class="img-fluid" alt="">
      </div>
      <div class="item">
        <img src="images/client-2.png" class="img-fluid" alt="">
      </div>
      <div class="item">
        <img src="images/client-3.png" class="img-fluid" alt="">
      </div>
      <div class="item">
        <img src="images/client-4.png" class="img-fluid" alt="">
      </div>
      <div class="item">
        <img src="images/client-5.png" class="img-fluid" alt="">
      </div>

    </div>

  </div>
</div> -->
<!-- ********* Home page end ********* -->