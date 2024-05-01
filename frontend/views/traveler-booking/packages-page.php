<?php

/** @var yii\web\View $this */

use unclead\multipleinput\MultipleInput;
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

$this->title = 'Pushpaka Vimana';
?>
<!-- ********* Packages page start ********* -->
<div class="packages-welcome-sec">
    <div class="owl-carousel welcome-carousel owl-theme">
        <?php if ($tourLandingImage) { ?>
            <?php
            $imageSource = null;
            $defaultImageName = 'default.png'; // Replace with the name of your default image file
            $defaultImagePath = Yii::getAlias('@backend/web/uploads/TourLandingImage/' . $defaultImageName);

            if (!empty($tourLandingImage->image_path)) {
                $imagePath = Yii::getAlias('@backend/web/uploads/TourLandingImage/' . $tourLandingImage->image_path);
                if (file_exists($imagePath)) {
                    $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $imagePath));
                }
            }

            if (empty($imageSource)) {
                $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $defaultImagePath));
            }
            ?>
            <div class="item">
                <div class="img-wrap">
                    <?= Html::img($imageSource, [
                        'class' => 'img-fluid',
                        'alt' => $country->country_name,
                        'style' => 'width: 100vw;',
                        'style' => 'height: 100vh;',
                    ]) ?>
                </div>
            </div>
        <?php } ?>
    </div>

</div>

<div class="packages-main-section">
    <div class="container">

        <div class="d-none d-sm-none d-md-block d-lg-block">
            <div class="top-tab-sec">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#one-month" type="button" role="tab" aria-controls="one-month" aria-selected="true">SUMMARY</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#two-month" type="button" role="tab" aria-controls="three-month" aria-selected="false">ITINERARY</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contacts-tab" data-bs-toggle="tab" data-bs-target="#three-month" type="button" role="tab" aria-controls="sixmonth" aria-selected="false">PRIVACY POLICY</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="one-month" role="tabpanel" aria-labelledby="home-tab">
                        <div class="adventures-sec">
                            <h2>ADVENTURES TO EMBARK ON</h2>
                            <div class="adventures-img-flex">
                                <?php foreach ($destinationMediaList as $destinationMedia) : ?>
                                    <div class="adventures-img-wrap">
                                        <?php
                                        $imageSource = null;
                                        $defaultImageName = 'default.png'; // Replace with the name of your default image file
                                        $defaultImagePath = Yii::getAlias('@backend/web/uploads/DestinationMedia/images/' . $defaultImageName);

                                        if (!empty($destinationMedia->media_file)) {
                                            $imagePath = Yii::getAlias('@backend/web/uploads/DestinationMedia/images/' . $destinationMedia->media_file);
                                            if (file_exists($imagePath)) {
                                                $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $imagePath));
                                            }
                                        }

                                        if (empty($imageSource)) {
                                            $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $defaultImagePath));
                                        }
                                        ?>
                                        <div class="img">
                                            <?= Html::img($imageSource, ['class' => 'img-fluid', 'alt' => 'destination-media']) ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="text-center text-lg-end">
                                <a href="#" class="view-btn">VIEW MORE</a>
                            </div>
                            <div class="about-trip">
                                <h3 class="h3">ABOUT THE TRIP</h3>
                                <p>
                                    Dubai seamlessly blends ultramodern luxury with cultural
                                    richness.with nature Iconic landmarks like the Burj Khalifa and
                                    the Dubai Mall coexist with ladies traditional souks and historic
                                    districts. The city offers diverse experiences, from opulent
                                    shopping to thrilling desert safaris, creating a harmonious fusion
                                    of innovation and heritage
                                </p>
                            </div>
                            <div class="packages-details-sec">
                                <h3 class="h3">PACKAGE DETAILS</h3>
                                <div class="packages-list">
                                    <?php if (!empty($addons)) : ?>
                                        <?php foreach ($addons as $addon) : ?>
                                            <?php
                                            $imageSource = null;
                                            $defaultImageName = 'default.png'; // Replace with the name of your default image file
                                            $defaultImagePath = Yii::getAlias('@backend/web/uploads/AddonIcon/' . $defaultImageName);

                                            if (!empty($addon->icon_image)) {
                                                $imagePath = Yii::getAlias('@backend/web/uploads/AddonIcon/' . $addon->icon_image);
                                                if (file_exists($imagePath)) {
                                                    $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $imagePath));
                                                }
                                            }

                                            if (empty($imageSource)) {
                                                $imageSource = Yii::getAlias('@web/backend/' . str_replace(Yii::getAlias('@backend'), '', $defaultImagePath));
                                            }
                                            ?>
                                            <div class="packages-list-wrap">
                                                <?= Html::img($imageSource, ['class' => 'img-fluid', 'alt' => 'title']) ?>
                                                <p><?= $addon->title ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="flight-details-wrap">
                                <h3 class="h3">FLIGHT DETAILS</h3>
                                <div class="container g-0 g-sm-0 g-md-5 g-lg-5">
                                    <div class="row g-0 g-sm-0 g-md-5 g-lg-5">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                                            <div class="flight-card">
                                                <div class="row justify-content-between">
                                                    <div class="col-auto">
                                                        <h3>BANGALORE</h3>
                                                        <h4>
                                                            Kempe Gowda <br />
                                                            International Aiprort
                                                        </h4>
                                                    </div>
                                                    <div class="col-auto">
                                                        <h3>DUBAI</h3>
                                                        <h4>
                                                            DUBAI FALTU <br />
                                                            International Aiprort
                                                        </h4>
                                                    </div>
                                                </div>

                                                <div class="img-wrap text-center my-3">
                                                    <img src="images/flight-icon-range.svg" class="img-fluid" alt="" />
                                                </div>

                                                <div class="row justify-content-between">
                                                    <div class="col-auto">
                                                        <h5>DEPARTURE</h5>
                                                        <h6>
                                                            23 MARCH 2024 <br />
                                                            12:00 PM GMT +5 30
                                                        </h6>
                                                    </div>
                                                    <div class="col-auto">
                                                        <h5>ARRIVAL</h5>
                                                        <h6>
                                                            23 MARCH 2024 <br />
                                                            10:00 PM GMT +4
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="travellers-wrap-flex">
                                                <div class="travellers-wrap">
                                                    <div class="h3">TRAVELLERS</div>
                                                    <!-- <script src="https://js.stripe.com/v3/"></script>
                                                        <div id="checkout">
                                                        </div> -->
                                                    <?php $form = ActiveForm::begin($actions ?? [
                                                        'action' => ['/traveler-booking/create'],
                                                        'method' => 'post',
                                                        'options' => ['enctype' => 'multipart/form-data']
                                                    ]); ?>
                                                    <?php
                                                    echo $form->field($model, 'travellers')->widget(MultipleInput::className(), [
                                                        'id' => 'model-scales',
                                                        'cloneButton' => true,
                                                        'columns' => [
                                                            [
                                                                'name'  => 'traveler_name',
                                                                'type'  => 'textInput',
                                                                'title' => 'Guest Name',
                                                                'defaultValue' => '',
                                                                'options' => [
                                                                    // 'options' => ['class' => ,]
                                                                ],

                                                            ],
                                                            [
                                                                'name'  => 'traveler_age',
                                                                'type'  => 'textInput',
                                                                'title' => 'Age',
                                                                'defaultValue' => 5,
                                                                'options' => [
                                                                    // 'options' => ['class' => 'time-end','data-duration' => 30,]
                                                                ],
                                                            ],
                                                            [
                                                                'name'  => 'traveler_gender',
                                                                'type'  => 'dropDownList',
                                                                'title' => 'Gender',
                                                                // 'defaultValue' => 1,
                                                                'items' => ['Male', 'Female'],
                                                                // 'options' => [$defaultDay => ['Selected'=>'selected'],'style' => 'width: 100px']
                                                            ],
                                                            [
                                                                'name'  => 'traveler_passport',
                                                                'type'  => 'textInput',
                                                                'title' => 'Pasport Number',
                                                                'defaultValue' => '',
                                                                'options' => [
                                                                    // 'options' => ['class' => 'time-end','data-duration' => 30,]
                                                                ],
                                                            ],
                                                        ],
                                                        'max'               => 10,
                                                        'min'               => 1, // should be at least 2 rows
                                                        'allowEmptyList'    => false,
                                                        'enableGuessTitle'  => true,
                                                        'addButtonPosition' => MultipleInput::POS_HEADER, // show add button in the header
                                                    ])
                                                        ->label(false);
                                                    ?> <div class="form-group">
                                                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                                    </div>
                                                    <?php ActiveForm::end(); ?>
                                                    <h4>PERSONS</h4>
                                                    <div class="box-wrap mb-4">
                                                        <div class="d-flex">
                                                            <img src="images/person-icon.svg" class="img-fluid" alt="" />
                                                            <div class="input-wrap">
                                                                <button>
                                                                    <!-- <img src="images/minus.svg" class="img-fluid" alt=""> -->
                                                                    -
                                                                </button>
                                                                <input type="number" value="05" />
                                                                <button>
                                                                    <!-- <img src="images/plus.svg" class="img-fluid" alt=""> -->
                                                                    +
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-table">
                                                        <div class="box-wrap">
                                                            <div class="text-wrap">
                                                                <h5>no</h5>
                                                                <h5>Guest Name</h5>
                                                            </div>
                                                            <div class="text-wrap">
                                                                <h5>Age</h5>
                                                                <h5>Gender</h5>
                                                                <h5>Passport <br> Number</h5>
                                                            </div>
                                                        </div>
                                                        <div class="box-wrap">
                                                            <div class="text-wrap">
                                                                <h5>1</h5>
                                                                <h5>Champakali Gowda</h5>
                                                            </div>
                                                            <div class="text-wrap">
                                                                <h5>69Yrs</h5>
                                                                <h5>Male</h5>
                                                                <h5>PARX231</h5>
                                                            </div>
                                                        </div>
                                                        <div class="box-wrap">
                                                            <div class="text-wrap">
                                                                <h5>2</h5>
                                                                <h5>Champakali Gowda</h5>
                                                            </div>
                                                            <div class="text-wrap">
                                                                <h5>69Yrs</h5>
                                                                <h5>Male</h5>
                                                                <h5>PARX231</h5>
                                                            </div>
                                                        </div>
                                                        <div class="box-wrap">
                                                            <div class="text-wrap">
                                                                <h5>3</h5>
                                                                <h5>Champakali Gowda</h5>
                                                            </div>
                                                            <div class="text-wrap">
                                                                <h5>69Yrs</h5>
                                                                <h5>Male</h5>
                                                                <h5>PARX231</h5>
                                                            </div>
                                                        </div>
                                                        <div class="box-wrap">
                                                            <div class="text-wrap">
                                                                <h5>4</h5>
                                                                <h5>Champakali Gowda</h5>
                                                            </div>
                                                            <div class="text-wrap">
                                                                <h5>69Yrs</h5>
                                                                <h5>Male</h5>
                                                                <h5>PARX231</h5>
                                                            </div>
                                                        </div>
                                                        <div class="box-wrap">
                                                            <div class="text-wrap">
                                                                <h5>5</h5>
                                                                <h5>Champakali Gowda</h5>
                                                            </div>
                                                            <div class="text-wrap">
                                                                <h5>69Yrs</h5>
                                                                <h5>Male</h5>
                                                                <h5>PARX231</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="travellers-date-wrap">
                                                    <h3 class="h3">DATE</h3>
                                                    <div class="box-wrap mb-4">
                                                        <h6>TOUR 01</h6>
                                                        <p>MARCH 23 - APRIL 03</p>
                                                    </div>
                                                    <div class="box-wrap mb-4">
                                                        <h6>TOUR 02</h6>
                                                        <p>MARCH 23 - APRIL 03</p>
                                                    </div>
                                                    <div class="box-wrap mb-4">
                                                        <h6>TOUR 03</h6>
                                                        <p>MARCH 23 - APRIL 03</p>
                                                    </div>
                                                    <div class="box-wrap mb-4">
                                                        <h6>TOUR 04</h6>
                                                        <p>MARCH 23 - APRIL 03</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                            <div class="things-packages-wrap">
                                                <h3>THINGS IN THIS PACKAGE</h3>
                                                <h6>INCLUDED</h6>
                                                <ul>
                                                    <li>3 Meals a day</li>
                                                    <li>Wifi Availability </li>
                                                    <li>Non-veg and Veg food options</li>
                                                    <li>Tour Guide</li>
                                                    <li>Local SIM card</li>
                                                    <li>Tour Photographer / Videographer</li>
                                                </ul>
                                                <h6>EXCLUDED</h6>
                                                <ul class="mb-0">
                                                    <li>Visa</li>
                                                    <li>Personal Expences </li>
                                                    <li>Additional Room</li>
                                                    <li>Alcohol</li>
                                                    <li>Camp Fire</li>
                                                    <li>Personal Transport</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="click-agree-sec mt-4">
                                <div class="text-center text-lg-end">
                                    <a href="#">Click agree to terms and conditions to proceed further and checkout</a>
                                </div>
                                <form action="">
                                    <div class="btn-wrap">
                                        <input type="text" placeholder="XX,XXX,xx">
                                        <button>BUY NOW</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="two-month" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="adventures-sec">
                            <?php foreach ($tourItineraries as $key => $itinerary) : ?>
                                <div class="activies-wrap">
                                    <div class="actives-num">
                                        <h1>DAY</h1>
                                        <!--<h2><?= $itinerary->itinerary_day ?></h2>-->
                                        <h2><?= $key + 1 ?></h2>
                                    </div>
                                    <div class="active-content">
                                        <h6>Activities</h6>
                                        <ul>
                                            <?php foreach (explode(',', $itinerary->activities) as $activity) : ?>
                                                <li><?= trim($activity) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="three-month" role="tabpanel" aria-labelledby="contacts-tab">
                        <div class="adventures-sec">
                            <h1>Privacy Policy</h1>
                            <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                            <h3>1.Information Collection:</h3>
                            <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                            <h3>2.Use of Information:</h3>
                            <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                            <h3>3.Information Sharing:</h3>
                            <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                            <h3>4.Security:</h3>
                            <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                            <h3>5.Cookies:</h3>
                            <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                            <h3>6.Updates to Privacy Policy:</h3>
                            <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-block d-sm-block d-md-none d-lg-none">
            <div class="selection-table top-tab-sec">
                <div class="common-form">
                    <select class="form-control dropdown" id="selectduration">
                        <option value="3month">SUMMARY</option>
                        <option value="1month">ITINERARY</option>
                        <option value="6month">PRIVACY POLICY</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive price-package-table">
                <div id="3month" class="duration_table_data fade-in month-report-table">
                    <div class="adventures-sec">
                        <h2>ADVENTURES TO EMBARK ON</h2>
                        <div class="adventures-img-flex">
                            <div class="adventures-img-wrap">
                                <div class="img">
                                    <img src="images/adventures-img-1.png" class="img-fluid" alt="" />
                                </div>
                                <div class="img">
                                    <img src="images/adventures-img-2.png" class="img-fluid" alt="" />
                                </div>
                                <div class="img">
                                    <img src="images/adventures-img-3.png" class="img-fluid" alt="" />
                                </div>
                            </div>
                            <div class="adventures-img-wrap">
                                <div class="img">
                                    <img src="images/adventures-img-4.png" class="img-fluid" alt="" />
                                </div>
                                <div class="img">
                                    <img src="images/adventures-img-5.png" class="img-fluid" alt="" />
                                </div>
                                <div class="img">
                                    <img src="images/adventures-img-6.png" class="img-fluid" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-lg-end">
                            <a href="#" class="view-btn">VIEW MORE</a>
                        </div>
                        <div class="about-trip">
                            <h3 class="h3">ABOUT THE TRIP</h3>
                            <p>
                                Dubai seamlessly blends ultramodern luxury with cultural
                                richness.with nature Iconic landmarks like the Burj Khalifa and
                                the Dubai Mall coexist with ladies traditional souks and historic
                                districts. The city offers diverse experiences, from opulent
                                shopping to thrilling desert safaris, creating a harmonious fusion
                                of innovation and heritage
                            </p>
                        </div>
                        <div class="packages-details-sec">
                            <h3 class="h3">PACKAGE DETAILS</h3>
                            <div class="packages-list">
                                <div class="packages-list-wrap">
                                    <img src="images/packages-list-img-1.svg" class="img-fluid" alt="" />
                                    <p>MAX 30 GUESTS</p>
                                </div>
                                <div class="packages-list-wrap">
                                    <img src="images/packages-list-img-2.svg" class="img-fluid" alt="" />
                                    <p>FREE BREAK FAST</p>
                                </div>
                                <div class="packages-list-wrap">
                                    <img src="images/packages-list-img-3.svg" class="img-fluid" alt="" />
                                    <p>PICKUP AND DROP SERCVICE</p>
                                </div>
                                <div class="packages-list-wrap">
                                    <img src="images/packages-list-img-4.svg" class="img-fluid" alt="" />
                                    <p>3 STAR HOTEL</p>
                                </div>
                                <div class="packages-list-wrap">
                                    <img src="images/packages-list-img-5.svg" class="img-fluid" alt="" />
                                    <p>KEY LOCATIONS</p>
                                </div>
                            </div>
                        </div>
                        <div class="flight-details-wrap">
                            <h3 class="h3">FLIGHT DETAILS</h3>
                            <div class="container g-0 g-sm-0 g-md-5 g-lg-5">
                                <div class="row g-0 g-sm-0 g-md-5 g-lg-5">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                                        <div class="flight-card">
                                            <div class="row justify-content-between">
                                                <div class="col-auto">
                                                    <h3>BANGALORE</h3>
                                                    <h4>
                                                        Kempe Gowda <br />
                                                        International Aiprort
                                                    </h4>
                                                </div>
                                                <div class="col-auto">
                                                    <h3>DUBAI</h3>
                                                    <h4>
                                                        DUBAI FALTU <br />
                                                        International Aiprort
                                                    </h4>
                                                </div>
                                            </div>

                                            <div class="img-wrap text-center my-3">
                                                <img src="images/flight-icon-range.svg" class="img-fluid" alt="" />
                                            </div>

                                            <div class="row justify-content-between">
                                                <div class="col-auto">
                                                    <h5>DEPARTURE</h5>
                                                    <h6>
                                                        23 MARCH 2024 <br />
                                                        12:00 PM GMT +5 30
                                                    </h6>
                                                </div>
                                                <div class="col-auto">
                                                    <h5>ARRIVAL</h5>
                                                    <h6>
                                                        23 MARCH 2024 <br />
                                                        10:00 PM GMT +4
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="travellers-wrap-flex">
                                            <div class="travellers-wrap">
                                                <div class="h3">TRAVELLERS</div>
                                                <h4>PERSONS</h4>
                                                <div class="box-wrap mb-4">
                                                    <div class="d-flex">
                                                        <img src="images/person-icon.svg" class="img-fluid" alt="" />
                                                        <div class="input-wrap">
                                                            <button>
                                                                <!-- <img src="images/minus.svg" class="img-fluid" alt=""> -->
                                                                -
                                                            </button>
                                                            <input type="number" value="05" />
                                                            <button>
                                                                <!-- <img src="images/plus.svg" class="img-fluid" alt=""> -->
                                                                +
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-table">
                                                    <div class="box-wrap">
                                                        <div class="text-wrap">
                                                            <h5>no</h5>
                                                            <h5>Guest Name</h5>
                                                        </div>
                                                        <div class="text-wrap">
                                                            <h5>Age</h5>
                                                            <h5>Gender</h5>
                                                            <h5>Passport <br> Number</h5>
                                                        </div>
                                                    </div>
                                                    <div class="box-wrap">
                                                        <div class="text-wrap">
                                                            <h5>1</h5>
                                                            <h5>Champakali Gowda</h5>
                                                        </div>
                                                        <div class="text-wrap">
                                                            <h5>69Yrs</h5>
                                                            <h5>Male</h5>
                                                            <h5>PARX231</h5>
                                                        </div>
                                                    </div>
                                                    <div class="box-wrap">
                                                        <div class="text-wrap">
                                                            <h5>2</h5>
                                                            <h5>Champakali Gowda</h5>
                                                        </div>
                                                        <div class="text-wrap">
                                                            <h5>69Yrs</h5>
                                                            <h5>Male</h5>
                                                            <h5>PARX231</h5>
                                                        </div>
                                                    </div>
                                                    <div class="box-wrap">
                                                        <div class="text-wrap">
                                                            <h5>3</h5>
                                                            <h5>Champakali Gowda</h5>
                                                        </div>
                                                        <div class="text-wrap">
                                                            <h5>69Yrs</h5>
                                                            <h5>Male</h5>
                                                            <h5>PARX231</h5>
                                                        </div>
                                                    </div>
                                                    <div class="box-wrap">
                                                        <div class="text-wrap">
                                                            <h5>4</h5>
                                                            <h5>Champakali Gowda</h5>
                                                        </div>
                                                        <div class="text-wrap">
                                                            <h5>69Yrs</h5>
                                                            <h5>Male</h5>
                                                            <h5>PARX231</h5>
                                                        </div>
                                                    </div>
                                                    <div class="box-wrap">
                                                        <div class="text-wrap">
                                                            <h5>5</h5>
                                                            <h5>Champakali Gowda</h5>
                                                        </div>
                                                        <div class="text-wrap">
                                                            <h5>69Yrs</h5>
                                                            <h5>Male</h5>
                                                            <h5>PARX231</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="travellers-date-wrap">
                                                <h3 class="h3">DATE</h3>
                                                <div class="box-wrap mb-4">
                                                    <h6>TOUR 01</h6>
                                                    <p>MARCH 23 - APRIL 03</p>
                                                </div>
                                                <div class="box-wrap mb-4">
                                                    <h6>TOUR 02</h6>
                                                    <p>MARCH 23 - APRIL 03</p>
                                                </div>
                                                <div class="box-wrap mb-4">
                                                    <h6>TOUR 03</h6>
                                                    <p>MARCH 23 - APRIL 03</p>
                                                </div>
                                                <div class="box-wrap mb-4">
                                                    <h6>TOUR 04</h6>
                                                    <p>MARCH 23 - APRIL 03</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                        <div class="things-packages-wrap">
                                            <h3>THINGS IN THIS PACKAGE</h3>
                                            <h6>INCLUDED</h6>
                                            <ul>
                                                <li>3 Meals a day</li>
                                                <li>Wifi Availability </li>
                                                <li>Non-veg and Veg food options</li>
                                                <li>Tour Guide</li>
                                                <li>Local SIM card</li>
                                                <li>Tour Photographer / Videographer</li>
                                            </ul>
                                            <h6>EXCLUDED</h6>
                                            <ul class="mb-0">
                                                <li>Visa</li>
                                                <li>Personal Expences </li>
                                                <li>Additional Room</li>
                                                <li>Alcohol</li>
                                                <li>Camp Fire</li>
                                                <li>Personal Transport</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="click-agree-sec mt-4">
                            <div class="text-center text-lg-end">
                                <a href="#">Click agree to terms and conditions to proceed further and checkout</a>
                            </div>
                            <form action="">
                                <div class="btn-wrap">
                                    <input type="text" placeholder="XX,XXX,xx">
                                    <button>BUY NOW</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="1month" class="duration_table_data fade-in month-report-table">
                    <div class="adventures-sec">
                        <div class="activies-wrap">
                            <div class="actives-num">
                                <h1>DAY</h1>
                                <h2>01</h2>
                            </div>
                            <div class="active-content">
                                <h6>Activities</h6>
                                <ul>
                                    <li>Arrival at Dubai airport</li>
                                    <li>Grab a taxi and head to hotel</li>
                                    <li>Check in at hotel with your bags</li>
                                    <li>Head to dinner at faltu hotel</li>
                                    <li>Head to payal view point for star grazing</li>
                                    <li>Head back to hotel to end ur day gud ni8:</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="6month" class="duration_table_data fade-in month-report-table">
                    <div class="adventures-sec">
                        <h1>Privacy Policy</h1>
                        <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                        <h3>1.Information Collection:</h3>
                        <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                        <h3>2.Use of Information:</h3>
                        <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                        <h3>3.Information Sharing:</h3>
                        <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                        <h3>4.Security:</h3>
                        <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                        <h3>5.Cookies:</h3>
                        <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>

                        <h3>6.Updates to Privacy Policy:</h3>
                        <p>At Pushpaka Vimana we are committed to safeguarding the privacy of our website visitors. This Privacy Policy outlines how we collect, use, disclose, and protect your personal information. By using our website, you consent to the terms outlined in this policy.</p>


                    </div>

                </div>


            </div>
        </div>

    </div>
</div>
<!-- ********* Packages page end ********* -->
<script>
    // Initialize Stripe.js
    const stripe = Stripe('pk_test_51P7XjLSJAgaJ3Mvs9TVC9MR4h3mRgH58wOBy0eYmlQPGdS6F1gE7RQzAI0UNzsTgbG6q78WRPMj3PiwULt8UuuRS006v7BgwBQ');

    initialize();

    // Fetch Checkout Session and retrieve the client secret
    async function initialize() {
        const fetchClientSecret = async () => {
            const response = await fetch("/pushpakvimana/traveler-booking/create-checkout-session", {
                method: "GET",
            });
            const {
                clientSecret
            } = await response.json();
            return clientSecret;
        };

        // Initialize Checkout
        const checkout = await stripe.initEmbeddedCheckout({
            fetchClientSecret,
        });

        // Mount Checkout
        checkout.mount('#checkout');
    }
</script>