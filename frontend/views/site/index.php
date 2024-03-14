<?php

/** @var yii\web\View $this */
use yii\bootstrap5\Html;
use yii\bootstrap5\Carousel;
// use yii\bootstrap\Card;
// use yii\bootstrap5\CardHeader;
// use yii\bootstrap5\CardBody;
use yii\bootstrap5\CarouselItem;
// use yii\grid\GridView;
$this->title = 'My Yii Application';
?>
<div class="container-fluid w-100 container-carousal">
<?php
      echo Carousel::widget([
        'items' => [
          [
            'content' => Html::img('siteimages/temple2.jpg',['class'=>'d-block w-100', 'alt'=>"Temple 1"]).'<div class="text-overlay">Pushpaka Vimana</div>',
            'options' => ['class' => 'carousel-item active'],
          ],
          [
            'content' => Html::img('siteimages/temple1.jpg',['class'=>'d-block w-100', 'alt'=>"Temple 3"]).'<div class="text-overlay">Pushpaka Vimana</div>',
            'options' => ['class' => 'carousel-item'],
            // 'caption' => '<h4>This is title</h4><p>This is the caption text</p>'
          ],
          [
            'content' => Html::img('siteimages/temple2.jpg',['class'=>'d-block w-100', 'alt'=>"Temple 3"]).'<div class="text-overlay">Pushpaka Vimana</div>',
            'options' => ['class' => 'carousel-item'],
          ],
        ],
        'showIndicators'=>false,
        // 'crossfade'=>true
        // 'options' => [],
      ]);
?>
</div>
<div class="container">
  <div class="text-center custom-text">
          "Embark on a Mythical Journey with Pushpaka Vimana
          Your Gateway to Timeless Travel Experiences!"
  </div>
</div>
<div class="container">
  <div class="text-center display-6">
    UPCOMMING TOURS IN <?=date("Y")?>
  </div>
</div>  
<div class="container-flex px-4 upcoming-tours">
<?php
 $data = [
  ['image' => 'siteimages/dubai.jpeg', 'title' => 'Card 1', 'content' => 'Dubai'],
  ['image' => 'siteimages/paris.jpg', 'title' => 'Card 2', 'content' => 'Paris'],
  ['image' => 'siteimages/japan.jpg', 'title' => 'Card 3', 'content' => 'Japan'],
  ['image' => 'siteimages/srilanka.jpg', 'title' => 'Card 3', 'content' => 'Srilanka']
  // Add more data as needed
];

$cards = '<div class="row row-cols-1 row-cols-md-4 g-4 m-100">'; // 3 cards per row on medium and larger screens
foreach ($data as $item) {
  $cards.='<div class="col"><div class="card h-100 position-relative">'.Html::img($item['image'], ['class' => 'card-img-top', 'alt' => 'Card Image']).'<div class="card-img-overlay">';
  // echo '<h5 class="card-title text-white">' . Html::encode($item['title']) . '</h5>';
  $cards.='<p class="card-text text-white">' . Html::encode($item['content']) . '</p></div></div></div>';
}
$cards.= '</div>';
echo $cards;
?>
</div>
<div class="container text-center">
<video class="video-center" autoplay loop muted>
  <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" />
</video>
</div>
<div class="container">
  <div class="text-center display-6">
    CATEGORY  
  </div>
</div>
<div class="container">
  <!-- Grid row -->
  <div class="gallery" id="gallery">

    <!-- Grid column -->
    <div class="mb-3 pics animation all 2">
      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" alt="Card image cap">
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="mb-3 pics animation all 1">
      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.webp" alt="Card image cap">
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="mb-3 pics animation all 1">
      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.webp" alt="Card image cap">
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="mb-3 pics animation all 2">
      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).webp" alt="Card image cap">
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="mb-3 pics animation all 2">
      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).webp" alt="Card image cap">
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="mb-3 pics animation all 1">
      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.webp" alt="Card image cap">
    </div>
    <!-- Grid column -->

  </div>  
</div>
<div class="container">
  <div class="text-center display-6">
    ABOUT US  
  </div>
</div>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">
      <div class="about-card card">
        <div class="card-body aboutus-card">
                        <p class="text-center h-2">hello, this is a dummy text  gener
              ated for dummy purpose abchd
              girms jims fjaopjoas fiuhradlrfad
              dadhn jdismsp jfiedj jddddpdfs
              dnapdjom.
              dnaodja djoamdp rfjd9e mokidd
              hndjsl;dpfmfpa, kiljd, jhdid,jglgo
              djhand  jfioal fholafnoam.</p>
        </div>
        <div class="card-header">
          <h2>OUR STORY</h2>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="about-card card">
        <div class="card-body aboutus-card">
        <p class="text-center h-2">hello, this is a dummy text  gener
ated for dummy purpose abchd
girms jims fjaopjoas fiuhradlrfad
dadhn jdismsp jfiedj jddddpdfs
dnapdjom.
dnaodja djoamdp rfjd9e mokidd
hndjsl;dpfmfpa, kiljd, jhdid,jglgo
djhand  jfioal fholafnoam.</p>
        </div>
        <div class="card-header">
          <h2>WHY CHOSE US?</h2>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="about-card card">
        <div class="card-body aboutus-card">
          <p class="text-center h-2">hello, this is a dummy text  gener
ated for dummy purpose abchd
girms jims fjaopjoas fiuhradlrfad
dadhn jdismsp jfiedj jddddpdfs
dnapdjom.
dnaodja djoamdp rfjd9e mokidd
hndjsl;dpfmfpa, kiljd, jhdid,jglgo
djhand  jfioal fholafnoam.</p>
        </div>
        <div class="card-header">
          <h2>OUR STORY</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="testimonial-container">
  <div id="testimonialCarousel" class="carousel slide testimonial-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <div class="col">
            <div class="testimonial-card card">
              <div class="card-body">
                <div class="row w-100">
                  <div class="col-sm-4">
                    <img class='img-circle' src="../testimonials/johndoe1.jpg" alt="Person" class="img-fluid1">
                  </div>
                  <div class="col-sm-8">
                    <h2>John Doe</h2>
                    <p class="designation">CEO, Company Name</p>
                  </div>
                </div>
                <div class="row BorderCorner">
                  <div class="details">
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis libero eu elit laoreet, vitae commodo velit elementum."</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="testimonial-card card">
              <div class="card-body">
                <img class='img-circle' src="../testimonials/johndoe2.jpg" alt="Person" class="img-fluid1">
                <h2>John Doe</h2>
                <p class="designation">CEO, Company Name</p>
                <div class="details">
                  <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis libero eu elit laoreet, vitae commodo velit elementum."</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="testimonial-card card">
               <div class="card-body">
                <img class='img-circle' src="../testimonials/johndoe3.jpg" alt="Person" class="img-fluid1">
                <h2>John Doe</h2>
                <p class="designation">CEO, Company Name</p>
                <div class="details">
                  <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis libero eu elit laoreet, vitae commodo velit elementum."</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>