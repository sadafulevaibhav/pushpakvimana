<?php

namespace backend\controllers;

use Yii;
use common\models\DestinationMedia;
use common\models\DestinationMediaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;
use common\components\ImageHelper;
use yii\helpers\FileHelper;

/**
 * DestinationMediaController implements the CRUD actions for DestinationMedia model.
 */
class DestinationMediaController extends Controller
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
     * Lists all DestinationMedia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DestinationMediaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single DestinationMedia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "DestinationMedia #" . $id,
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
     * Creates a new DestinationMedia model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new DestinationMedia();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new DestinationMedia",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $model->media_file = UploadedFile::getInstance($model, 'media_file');
                if ($model->media_file) {
                    $media_type = $model->media_file->extension;
                    $model->media_type = in_array($media_type, ['jpg', 'png', 'gif']) ? 'image' : 'video';
                    $uploadPath = Yii::getAlias('@webroot/uploads/DestinationMedia/' . ($model->media_type == 'image' ? 'images' : 'videos'));
                    FileHelper::createDirectory($uploadPath, $mode = 0775, $recursive = true);
                    $fileName =  date('YmdHis') . '.' . $media_type;
                    $model->media_file->saveAs($uploadPath . '/' . $fileName);
                    $model->media_file = $fileName;
                }
                if ($model->save()) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "Create new DestinationMedia",
                        'content' => '<span class="text-success">Create DestinationMedia success</span>',
                        'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                            Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                } else {
                    return [
                        'title' => "Create new DestinationMedia",
                        'content' => $this->renderAjax('create', [
                            'model' => $model,
                        ]),
                        'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                            Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                    ];
                }
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post())) {
                $model->media_file = UploadedFile::getInstance($model, 'media_file');

                if ($model->media_file) {
                    $media_type = $model->media_file->extension;
                    $model->media_type = in_array($media_type, ['jpg', 'png', 'gif']) ? 'image' : 'video';
                    $uploadPath = Yii::getAlias('@webroot/uploads/DestinationMedia/' . ($model->media_type == 'image' ? 'images' : 'videos'));
                    FileHelper::createDirectory($uploadPath, $mode = 0775, $recursive = true);
                    $fileName =  date('YmdHis') . '.' . $media_type;
                    $model->media_file->saveAs($uploadPath . '/' . $fileName);
                    $model->media_file = $fileName;
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DestinationMedia model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $oldMediaFile = $model->media_file;

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update DestinationMedia #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post())) {
                $model->media_file = UploadedFile::getInstance($model, 'media_file');

                if ($model->media_file) {
                    $this->deleteOldMediaFile($model->media_type, $oldMediaFile);

                    $media_type = $model->media_file->extension;
                    $model->media_type = in_array($media_type, ['jpg', 'png', 'gif']) ? 'image' : 'video';
                    $uploadPath = Yii::getAlias('@webroot/uploads/DestinationMedia/' . ($model->media_type == 'image' ? 'images' : 'videos'));
                    FileHelper::createDirectory($uploadPath, $mode = 0775, $recursive = true);
                    $fileName = date('YmdHis') . '.' . $media_type;
                    $model->media_file->saveAs($uploadPath . '/' . $fileName);
                    $model->media_file = $fileName;
                }

                if ($model->save()) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "DestinationMedia #" . $id,
                        'content' => $this->renderAjax('view', [
                            'model' => $model,
                        ]),
                        'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                            Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                } else {
                    return [
                        'title' => "Update DestinationMedia #" . $id,
                        'content' => $this->renderAjax('update', [
                            'model' => $model,
                        ]),
                        'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => "modal"]) .
                            Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                    ];
                }
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post())) {
                $model->media_file = UploadedFile::getInstance($model, 'media_file');

                if ($model->media_file) {
                    $this->deleteOldMediaFile($model->media_type, $oldMediaFile);

                    $media_type = $model->media_file->extension;
                    $model->media_type = in_array($media_type, ['jpg', 'png', 'gif']) ? 'image' : 'video';
                    $uploadPath = Yii::getAlias('@webroot/uploads/DestinationMedia/' . ($model->media_type == 'image' ? 'images' : 'videos'));
                    FileHelper::createDirectory($uploadPath, $mode = 0775, $recursive = true);
                    $fileName =  date('YmdHis') . '.' . $media_type;
                    $model->media_file->saveAs($uploadPath . '/' . $fileName);
                    $model->media_file = $fileName;
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes the old media file if a new file is uploaded.
     * @param string $mediaType The media type ('image' or 'video')
     * @param string $oldMediaFile The name of the old media file
     */
    protected function deleteOldMediaFile($mediaType, $oldMediaFile)
    {
        if (!empty($oldMediaFile)) {
            $oldFilePath = Yii::getAlias('@webroot/uploads/DestinationMedia/' . ($mediaType == 'image' ? 'images/' : 'videos/') . $oldMediaFile);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
    }

    /**
     * Delete an existing DestinationMedia model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = DestinationMedia::findOne($id);

        if ($model) {
            // Get the image path from the model attribute
            $imagePath = $model->media_file; // Replace with your actual image attribute name
            // Build the full image path
            $fullImagePath = Yii::getAlias('@webroot/uploads/DestinationMedia/' . ($model->media_type == 'image' ? 'images' : 'videos') . '/' . $imagePath);
            echo 'ssdd' . $fullImagePath;
            // Delete the image
            ImageHelper::deleteImage($fullImagePath);

            // Delete the model instance if needed
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Delete multiple existing DestinationMedia model.
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
     * Finds the DestinationMedia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DestinationMedia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DestinationMedia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
