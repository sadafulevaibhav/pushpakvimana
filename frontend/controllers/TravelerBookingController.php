<?php

namespace frontend\controllers;

use Yii;
use common\models\TravelerBooking;
use common\models\TravelerBookingSearch;
use common\models\TourLandingImage;
use common\models\TourItinerary;
use common\models\DestinationCountry;
use common\models\DestinationMedia;
use common\models\Addon;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * TravelerBookingController implements the CRUD actions for TravelerBooking model.
 */
class TravelerBookingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulkdelete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TravelerBooking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TravelerBookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single TravelerBooking model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "TravelerBooking #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Redirect to Packages Page.
     *
     * @return mixed
     */
    public function actionPackagesPage($id)
    {
        $model = new TravelerBooking();
        $country = DestinationCountry::findOne($id);
        $tourItineraries = TourItinerary::find()
            ->where(['country_id' => $country->id])
            ->all();

        $tourLandingImage = TourLandingImage::find()
            ->where(['country_id' => $country->id])
            ->one();

        $destinationMedia = DestinationMedia::find()
            ->where(['country_id' => $country->id])
            ->all();

        /*
        $destinationPackage = DestinationPackage::find()
            ->where(['country_id' => $country->id])
            ->andWhere(['package_id' => $packageId]) // Add this line
            ->all();
        */

        $addons = Addon::find()->all();

        return $this->render('packages-page', [
            'country' => $country,
            'tourLandingImage' => $tourLandingImage,
            'tourItineraries' => $tourItineraries,
            'destinationMediaList' => $destinationMedia,
            'model' => $model,
            //'destinationPackage' => $destinationPackage,
            'addons' => $addons,
        ]);
    }

    /**
     * Creates a new TravelerBooking model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new TravelerBooking();
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new TravelerBooking",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {

                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new Traveler Booking",
                    'content' => '<span class="text-success">Create TravelerBooking success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new TravelerBooking",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post())) {
                $requestData = $request->post();
                foreach ($requestData['TravelerBooking']['travellers'] as $key => $val) {
                    $modelNew = new TravelerBooking();
                    $modelNew->traveler_name = $val['traveler_name'];
                    $modelNew->traveler_age = $val['traveler_age'];
                    $modelNew->traveler_gender = $val['traveler_gender'];
                    $modelNew->traveler_passport = $val['traveler_passport'];
                    $modelNew->save(false);
                    // echo "<pre>";print_r($val);exit; 
                }
                // echo "<pre>";print_r($request->post());exit;
                // $model->batchInsert('traveler_booking',['traveler_name', 'traveler_age', 'traveler_gender', 'traveler_passport'],$requestData['TravelerBooking']['travellers']);
                // && $model->save()
                $stripe = new \Stripe\StripeClient('sk_test_51P7XjLSJAgaJ3Mvs7bm4XXfWAEd19wgT4Bj2ZNqMcT0beVYnGF7nivoG01CrA8NCZqbyvxsfBrM5Ll9XyGTMh2uM007a3J4UXu');

                $checkout_session = $stripe->checkout->sessions->create([
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'inr',
                            'product_data' => [
                                'name' => 'Packagge',
                            ],
                            'unit_amount' => 2000,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => 'http://localhost:4242/success',
                    'cancel_url' => 'http://localhost:4242/cancel',
                ]);

                header("HTTP/1.1 303 See Other");
                header("Location: " . $checkout_session->url);
                exit;
                // return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }
    public function actionCreateCheckoutSession()
    {
        $stripe = new \Stripe\StripeClient([
            "api_key" => 'sk_test_51P7XjLSJAgaJ3Mvs7bm4XXfWAEd19wgT4Bj2ZNqMcT0beVYnGF7nivoG01CrA8NCZqbyvxsfBrM5Ll9XyGTMh2uM007a3J4UXu'
        ]);

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'INR',
                    'product_data' => [
                        'name' => 'T-shirt',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'ui_mode' => 'embedded',
            // "address" => ["city" => 'Nagar', "country" => 'India', "line1" => 'Ahmednagar', "line2" => "Bhingar", "postal_code" => 414002, "state" => 'Maharashtra'],
            'return_url' => 'https://example.com/checkout/return?session_id={CHECKOUT_SESSION_ID}',
        ]);
        echo json_encode(array('clientSecret' => $checkout_session->client_secret));
        exit;
    }
    /**
     * Updates an existing TravelerBooking model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update TravelerBooking #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "TravelerBooking #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update TravelerBooking #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing TravelerBooking model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing TravelerBooking model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the TravelerBooking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TravelerBooking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TravelerBooking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
