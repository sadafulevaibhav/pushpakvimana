<?php

namespace backend\controllers;

use Yii;
use common\models\DestinationPackage;
use common\models\DestinationPackageSearch;
use common\models\Addon;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use common\components\ImageHelper;

/**
 * DestinationPackageController implements the CRUD actions for DestinationPackage model.
 */
class DestinationPackageController extends Controller
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
     * Lists all DestinationPackage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DestinationPackageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single DestinationPackage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "DestinationPackage #" . $id,
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
     * Creates a new DestinationPackage model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new DestinationPackage();
        $addons = Addon::find()->all(); // Assuming 'Addon' is your model name
        $addonList = ArrayHelper::map($addons, 'id', 'title'); // Replace 'id' and 'name' with the actual column names

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new DestinationPackage",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'addonList' => $addonList,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $image = UploadedFile::getInstance($model, 'package_image');
                if (!is_null($image)) {
                    $model->package_image = $image->name;
                    // generate a unique file name to prevent duplicate filenames
                    $model->package_image = date('YmdHis') . $image->name;
                    // the path to save file, you can set an uploadPath
                    $path = Yii::$app->basePath . '/web/uploads/DestinationPackageImage/';
                    // Check if the destination folder exists, and create it if not
                    $destinationFolder = Yii::getAlias('@webroot/uploads/DestinationPackageImage/');
                    if (!is_dir($destinationFolder)) {
                        mkdir($destinationFolder, 0755, true);
                    }
                    $path = $path . $model->package_image;
                    $image->saveAs($path);
                }

                // Access submitted data
                $model->package_addons = implode(',', $model->package_addons);

                // Store is_active as 1
                $model->is_active = 1;
                $model->save();
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new DestinationPackage",
                    'content' => '<span class="text-success">Create DestinationPackage success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new DestinationPackage",
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
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'addonList' => $addonList,
                ]);
            }
        }
    }

    /**
     * Updates an existing DestinationPackage model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $addons = Addon::find()->all(); // Assuming 'Addon' is your model name
        $addonList = ArrayHelper::map($addons, 'id', 'title'); // Replace 'id' and 'name' with the

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                $model->package_addons = explode(',', $model->package_addons);
                return [
                    'title' => "Update DestinationPackage #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'addonList' => $addonList,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post())) {
                $model->package_addons = implode(',', $model->package_addons);
                // Get the old image path
                $oldImagePath = $model->oldAttributes['package_image']; // Replace with your actual image attribute name
                $oldFullImagePath = Yii::getAlias('@webroot/uploads/DestinationPackageImage/' . $oldImagePath);

                // Get the new uploaded image
                $newImage = UploadedFile::getInstance($model, 'package_image');
                // Check if the destination folder exists, and create it if not
                $destinationFolder = Yii::getAlias('@webroot/uploads/DestinationPackageImage/');
                if (!is_dir($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }

                if ($newImage) {
                    // Generate a new unique file name
                    $newImageName = Yii::$app->security->generateRandomString() . '.' . $newImage->extension;
                    $newFullImagePath = Yii::getAlias('@webroot/uploads/DestinationPackageImage/' . $newImageName);

                    // Move the uploaded image to the designated folder
                    if ($newImage->saveAs($newFullImagePath)) {
                        // Update the model with the new image path
                        $model->package_image = $newImageName;

                        if ($model->save()) {
                            // Delete the old image if it exists
                            if (!empty($oldImagePath) && file_exists($oldFullImagePath)) {
                                ImageHelper::deleteImage($oldFullImagePath);
                            }

                            return [
                                'forceReload' => '#crud-datatable-pjax',
                                'title' => "DestinationPackage #" . $id,
                                'content' => $this->renderAjax('view', [
                                    'model' => $model,
                                ]),
                                'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                            ];
                        }
                    }
                } else {
                    // No new image uploaded, just save the model

                    if ($model->save()) {
                        return [
                            'forceReload' => '#crud-datatable-pjax',
                            'title' => "DestinationPackage #" . $id,
                            'content' => $this->renderAjax('view', [
                                'model' => $model,
                            ]),
                            'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                                Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                        ];
                    }
                }
            } else {
                $model->package_addons = explode(',', $model->package_addons);

                return [
                    'title' => "Update DestinationPackage #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'addonList' => $addonList,
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

                // Get the old image path
                $oldImagePath = $model->oldAttributes['package_image']; // Replace with your actual image attribute name
                $oldFullImagePath = Yii::getAlias('@webroot/uploads/DestinationPackageImage/' . $oldImagePath);

                // Get the new uploaded image
                $newImage = UploadedFile::getInstance($model, 'package_image');
                // Check if the destination folder exists, and create it if not
                $destinationFolder = Yii::getAlias('@webroot/uploads/DestinationPackageImage/');
                if (!is_dir($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }

                if ($newImage) {
                    // Generate a new unique file name
                    $newImageName = Yii::$app->security->generateRandomString() . '.' . $newImage->extension;
                    $newFullImagePath = Yii::getAlias('@webroot/uploads/DestinationPackageImage/' . $newImageName);

                    // Move the uploaded image to the designated folder
                    if ($newImage->saveAs($newFullImagePath)) {
                        // Update the model with the new image path
                        $model->package_image = $newImageName;

                        if ($model->save()) {
                            // Delete the old image if it exists
                            if (!empty($oldImagePath) && file_exists($oldFullImagePath)) {
                                ImageHelper::deleteImage($oldFullImagePath);
                            }

                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    }
                } else {

                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Delete an existing DestinationPackage model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = DestinationPackage::findOne($id);

        if ($model) {
            // Get the image path from the model attribute
            $imagePath = $model->package_image; // Replace with your actual image attribute name

            // Build the full image path
            $fullImagePath = Yii::getAlias('@webroot/uploads/DestinationPackageImage/' . $imagePath);

            // Delete the image
            ImageHelper::deleteImage($fullImagePath);

            // Delete the model instance if needed
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Delete multiple existing DestinationPackage model.
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
     * Finds the DestinationPackage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DestinationPackage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DestinationPackage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
