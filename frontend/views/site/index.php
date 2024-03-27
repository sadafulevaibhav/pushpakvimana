<?php

/** @var yii\web\View $this */
use yii\bootstrap5\Html;
use yii\bootstrap5\Carousel;
// use yii\bootstrap\Card;
// use yii\bootstrap5\CardHeader;
// use yii\bootstrap5\CardBody;
use yii\bootstrap5\CarouselItem;
// use yii\grid\GridView;
$this->title = 'Pushpaka Vimana';
?>
  <!-- ********* Home page start ********* -->

  <div class="welcome-page">
    <div class="owl-carousel welcome-carousel owl-theme">
      <div class="item">
        <div class="img-wrap">
          <!-- <img src="images/main-hero-slider-1.png" class="img-fluid" alt=""> -->
          <video loop muted autoplay class="d-block w-100">
            <source src="videos/about-top-video.mp4" type="video/mp4">
          </video>
        </div>
      </div>
      <div class="item">
        <div class="img-wrap">
          <!-- <img src="images/main-hero-slider-1.png" class="img-fluid" alt=""> -->
          <video loop muted autoplay class="d-block w-100">
            <source src="videos/about-top-video.mp4" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </div>
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
  <div class="tours-sec">
    <div class="container">
      <h2>TOURS</h2>
      <h4>
        "Embark on a Mythical Journey with Pushpaka Vimana Your Gateway to
        Timeless Travel Experiences!"
      </h4>
    </div>
  </div>
  <div class="upcomming-tours-sec">
    <h2 class="secondary-heading">UPCOMMING TOURS IN 2024</h2>
    <div class="upcomming-tours-wrap">
      <div class="container-fluid">
        <div class="upcomming-tours-flex">
          <div class="upcomming-card">
            <img src="images/dubai-img.png" class="img-fluid" alt="" />
            <span>DUBAI</span>
          </div>
          <div class="upcomming-card">
            <img src="images/japan-img.png" class="img-fluid" alt="" />
            <span>JAPAN</span>
          </div>
          <div class="upcomming-card">
            <img src="images/paris-img.png" class="img-fluid" alt="" />
            <span>PARIS</span>
          </div>
          <div class="upcomming-card">
            <img src="images/london-img.png" class="img-fluid" alt="" />
            <span>LONDON</span>
          </div>
          <div class="upcomming-card">
            <img src="images/paris-img.png" class="img-fluid" alt="" />
            <span>PARIS</span>
          </div>
          <div class="upcomming-card">
            <img src="images/dubai-img.png" class="img-fluid" alt="" />
            <span>DUBAI</span>
          </div>
          <div class="upcomming-card">
            <img src="images/london-img.png" class="img-fluid" alt="" />
            <span>LONDON</span>
          </div>
          <div class="upcomming-card">
            <img src="images/japan-img.png" class="img-fluid" alt="" />
            <span>JAPAN</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="category-sec pt-5">
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
  <div class="about-us-sec">
    <div class="container">
      <h2 class="secondary-heading">ABOUT US</h2>
      <div class="about-flex-overflow">
        <div class="about-us-flex">
          <div class="about-card">
            <div class="about-card-content">
              <h6>OUR STORY</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ipsa consectetur, enim ratione nostrum amet odit corrupti earum cupiditate iure!</p>
            </div>
          </div>
          <div class="about-card">
            <div class="about-card-content">
              <h6>WHY CHOOSE US ?</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ipsa consectetur, enim ratione nostrum amet odit corrupti earum cupiditate iure!</p>
            </div>
          </div>
          <div class="about-card">
            <div class="about-card-content">
              <h6>OUR STORY</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ipsa consectetur, enim ratione nostrum amet odit corrupti earum cupiditate iure!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
  <div class="testimonials-sec">
    <h2 class="secondary-heading">TESTIMONIALS</h2>
    <div class="testimonials-wrap">
      <div class="container">
        <div class="owl-carousel testimonials-owl owl-theme">
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <img src="images/user-1.png" class="img-fluid" alt="" />
                <div class="text-wrap">
                  <h3>Arun Kumar</h3>
                  <h4>Software Developer</h4>
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
                  ‘lorem Ipsum is simply dummy text of the printing and try.
                  gorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a gale of type
                  and scrambled it to make a type specimen books has been the
                  industry's standard dummy text nasd snreia ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book. ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book’
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <img src="images/user-2.png" class="img-fluid" alt="" />
                <div class="text-wrap">
                  <h3>Yashas Faltu</h3>
                  <h4>Graphic Designer</h4>
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
                  ‘lorem Ipsum is simply dummy text of the printing and try.
                  gorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a gale of type
                  and scrambled it to make a type specimen books has been the
                  industry's standard dummy text nasd snreia ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book. ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book’
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <img src="images/user-3.png" class="img-fluid" alt="" />
                <div class="text-wrap">
                  <h3>Saleena Gomez</h3>
                  <h4>House Wife</h4>
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
                  ‘lorem Ipsum is simply dummy text of the printing and try.
                  gorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a gale of type
                  and scrambled it to make a type specimen books has been the
                  industry's standard dummy text nasd snreia ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book. ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book’
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <img src="images/user-1.png" class="img-fluid" alt="" />
                <div class="text-wrap">
                  <h3>Arun Kumar</h3>
                  <h4>Software Developer</h4>
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
                  ‘lorem Ipsum is simply dummy text of the printing and try.
                  gorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a gale of type
                  and scrambled it to make a type specimen books has been the
                  industry's standard dummy text nasd snreia ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book. ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book’
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <img src="images/user-1.png" class="img-fluid" alt="" />
                <div class="text-wrap">
                  <h3>Arun Kumar</h3>
                  <h4>Software Developer</h4>
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
                  ‘lorem Ipsum is simply dummy text of the printing and try.
                  gorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a gale of type
                  and scrambled it to make a type specimen books has been the
                  industry's standard dummy text nasd snreia ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book. ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book’
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <img src="images/user-2.png" class="img-fluid" alt="" />
                <div class="text-wrap">
                  <h3>Yashas Faltu</h3>
                  <h4>Graphic Designer</h4>
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
                  ‘lorem Ipsum is simply dummy text of the printing and try.
                  gorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a gale of type
                  and scrambled it to make a type specimen books has been the
                  industry's standard dummy text nasd snreia ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book. ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book’
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <img src="images/user-3.png" class="img-fluid" alt="" />
                <div class="text-wrap">
                  <h3>Saleena Gomez</h3>
                  <h4>House Wife</h4>
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
                  ‘lorem Ipsum is simply dummy text of the printing and try.
                  gorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a gale of type
                  and scrambled it to make a type specimen books has been the
                  industry's standard dummy text nasd snreia ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book. ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book’
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-card">
              <div class="user-img">
                <img src="images/user-1.png" class="img-fluid" alt="" />
                <div class="text-wrap">
                  <h3>Arun Kumar</h3>
                  <h4>Software Developer</h4>
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
                  ‘lorem Ipsum is simply dummy text of the printing and try.
                  gorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a gale of type
                  and scrambled it to make a type specimen books has been the
                  industry's standard dummy text nasd snreia ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book. ever since the
                  1500s, when an unknown printer took a gs of type and
                  scrambled it to make a type specimen book’
                </p>
                <img src="images/right-line.svg" class="img-fluid right-line" alt="" />
                <img src="images/left-line.svg" class="img-fluid left-line" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="our-client-sec">
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
  </div>
  <!-- ********* Home page end ********* -->

 