<?php

namespace backend\controllers;

use Yii;
use common\models\TourLandingImage;
use common\models\TourLandingImageSearch;
//use yii\web\Controller;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;
use common\components\ImageHelper;

/**
 * TourLandingImageController implements the CRUD actions for TourLandingImage model.
 */
class TourLandingImageController extends BaseController
{
    /**
     * Lists all TourLandingImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TourLandingImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single TourLandingImage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "TourLandingImage #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new TourLandingImage model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new TourLandingImage();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new TourLandingImage",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $image = UploadedFile::getInstance($model, 'image_path');
                if (!is_null($image)) {
                    $model->image_path = $image->name;
                    // generate a unique file name to prevent duplicate filenames
                    $model->image_path = date('YmdHis') . $image->name;
                    // the path to save file, you can set an uploadPath
                    $path = Yii::$app->basePath . '/web/uploads/TourLandingImage/';
                    // Check if the destination folder exists, and create it if not
                    $destinationFolder = Yii::getAlias('@webroot/uploads/TourLandingImage/');
                    if (!is_dir($destinationFolder)) {
                        mkdir($destinationFolder, 0755, true);
                    }
                    $path = $path . $model->image_path;
                    $image->saveAs($path);
                }

                $model->save();
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new TourLandingImage",
                    'content' => '<span class="text-success">Create TourLandingImage success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new TourLandingImage",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
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
                ]);
            }
        }
    }

    /**
     * Updates an existing TourLandingImage model.
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
                    'title' => "Update TourLandingImage #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post())) {
                // Get the old image path
                $oldImagePath = $model->oldAttributes['image_path']; // Replace with your actual image attribute name
                $oldFullImagePath = Yii::getAlias('@webroot/uploads/TourLandingImage/' . $oldImagePath);

                // Get the new uploaded image
                $newImage = UploadedFile::getInstance($model, 'image_path');
                // Check if the destination folder exists, and create it if not
                $destinationFolder = Yii::getAlias('@webroot/uploads/TourLandingImage/');
                if (!is_dir($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }
                if ($newImage) {
                    // Generate a new unique file name
                    $newImageName = Yii::$app->security->generateRandomString() . '.' . $newImage->extension;
                    $newFullImagePath = Yii::getAlias('@webroot/uploads/TourLandingImage/' . $newImageName);

                    // Move the uploaded image to the designated folder
                    if ($newImage->saveAs($newFullImagePath)) {
                        // Update the model with the new image path
                        $model->image_path = $newImageName;

                        if ($model->save()) {
                            // Delete the old image if it exists
                            if (!empty($oldImagePath) && file_exists($oldFullImagePath)) {
                                ImageHelper::deleteImage($oldFullImagePath);
                            }

                            return [
                                'forceReload' => '#crud-datatable-pjax',
                                'title' => "TourLandingImage #" . $id,
                                'content' => $this->renderAjax('view', [
                                    'model' => $model,
                                ]),
                                'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                            ];
                        }
                    }
                } else {
                    // No new image uploaded, just save the model

                    if ($model->save()) {
                        return [
                            'forceReload' => '#crud-datatable-pjax',
                            'title' => "TourLandingImage #" . $id,
                            'content' => $this->renderAjax('view', [
                                'model' => $model,
                            ]),
                            'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                                Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                        ];
                    }
                }
            } else {
                return [
                    'title' => "Update TourLandingImage #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post())) {
                // Get the old image path
                $oldImagePath = $model->oldAttributes['image_path']; // Replace with your actual image attribute name
                $oldFullImagePath = Yii::getAlias('@webroot/uploads/TourLandingImage/' . $oldImagePath);

                // Get the new uploaded image
                $newImage = UploadedFile::getInstance($model, 'image_path');
                // Check if the destination folder exists, and create it if not
                $destinationFolder = Yii::getAlias('@webroot/uploads/TourLandingImage/');
                if (!is_dir($destinationFolder)) {
                    mkdir($destinationFolder, 0755, true);
                }

                if ($newImage) {
                    // Generate a new unique file name
                    $newImageName = Yii::$app->security->generateRandomString() . '.' . $newImage->extension;
                    $newFullImagePath = Yii::getAlias('@webroot/uploads/TourLandingImage/' . $newImageName);

                    // Move the uploaded image to the designated folder
                    if ($newImage->saveAs($newFullImagePath)) {
                        // Update the model with the new image path
                        $model->image_path = $newImageName;

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
     * Delete an existing TourLandingImage model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = TourLandingImage::findOne($id);

        if ($model) {
            // Get the image path from the model attribute
            $imagePath = $model->image_path; // Replace with your actual image attribute name

            // Build the full image path
            $fullImagePath = Yii::getAlias('@webroot/uploads/TourLandingImage/' . $imagePath);

            // Delete the image
            ImageHelper::deleteImage($fullImagePath);

            // Delete the model instance if needed
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Delete multiple existing TourLandingImage model.
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
     * Finds the TourLandingImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TourLandingImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TourLandingImage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
