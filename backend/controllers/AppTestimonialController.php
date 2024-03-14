<?php

namespace backend\controllers;

use Yii;
use backend\models\AppTestimonial;
use backend\models\AppTestimonialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;
use common\components\ImageHelper;

/**
 * AppTestimonialController implements the CRUD actions for AppTestimonial model.
 */
class AppTestimonialController extends Controller
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
     * Lists all AppTestimonial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppTestimonialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single AppTestimonial model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "AppTestimonial #" . $id,
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
     * Creates a new AppTestimonial model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new AppTestimonial();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new AppTestimonial",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $image = UploadedFile::getInstance($model, 'image');
                if (!is_null($image)) {
                    $model->image = $image->name;
                    $doc_name = $image->name;
                    $ext = $image->getExtension();
                    // generate a unique file name to prevent duplicate filenames
                    $model->image = date('YmdHis') . $image->name;
                    // the path to save file, you can set an uploadPath
                    $path = Yii::$app->basePath . '/web/uploads/AppTestimonial/';
                    $path = $path . $model->image;
                    $image->saveAs($path);
                }
                $model->created_at = date('Y-m-d H:i:s'); // Update the created_at field
                $model->created_by = Yii::$app->user->id; // Update the created_by field
                $model->company_id = Yii::$app->user->id; // Update the company_id field

                $model->save();
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new AppTestimonial",
                    'content' => '<span class="text-success">Create AppTestimonial success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new AppTestimonial",
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
                ]);
            }
        }
    }

    /**
     * Updates an existing AppTestimonial model.
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
                    'title' => "Update AppTestimonial #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post())) {
                // Get the old image path
                $oldImagePath = $model->oldAttributes['image']; // Replace with your actual image attribute name
                $oldFullImagePath = Yii::getAlias('@webroot/uploads/AppTestimonial/' . $oldImagePath);

                // Get the new uploaded image
                $newImage = UploadedFile::getInstance($model, 'image');

                if ($newImage) {
                    // Generate a new unique file name
                    $newImageName = Yii::$app->security->generateRandomString() . '.' . $newImage->extension;
                    $newFullImagePath = Yii::getAlias('@webroot/uploads/AppTestimonial/' . $newImageName);

                    // Move the uploaded image to the designated folder
                    if ($newImage->saveAs($newFullImagePath)) {
                        // Update the model with the new image path
                        $model->image = $newImageName;
                        $model->updated_at = date('Y-m-d H:i:s'); // Update the updated_at field
                        $model->updated_by = Yii::$app->user->id; // Update the updated_by field

                        if ($model->save()) {
                            // Delete the old image if it exists
                            if (!empty($oldImagePath) && file_exists($oldFullImagePath)) {
                                ImageHelper::deleteImage($oldFullImagePath);
                            }

                            return [
                                'forceReload' => '#crud-datatable-pjax',
                                'title' => "AppTestimonial #" . $id,
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
                    $model->updated_at = date('Y-m-d H:i:s'); // Update the updated_at field
                    $model->updated_by = Yii::$app->user->id; // Update the updated_by field

                    if ($model->save()) {
                        return [
                            'forceReload' => '#crud-datatable-pjax',
                            'title' => "AppTestimonial #" . $id,
                            'content' => $this->renderAjax('view', [
                                'model' => $model,
                            ]),
                            'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-dismiss' => "modal"]) .
                                Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                        ];
                    }
                }

                return [
                    'title' => "Update AppTestimonial #" . $id,
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
            if ($model->load($request->post())) {
                // Get the old image path
                $oldImagePath = $model->oldAttributes['image']; // Replace with your actual image attribute name
                $oldFullImagePath = Yii::getAlias('@webroot/uploads/AppTestimonial/' . $oldImagePath);

                // Get the new uploaded image
                $newImage = UploadedFile::getInstance($model, 'image');

                if ($newImage) {
                    // Generate a new unique file name
                    $newImageName = Yii::$app->security->generateRandomString() . '.' . $newImage->extension;
                    $newFullImagePath = Yii::getAlias('@webroot/uploads/AppTestimonial/' . $newImageName);

                    // Move the uploaded image to the designated folder
                    if ($newImage->saveAs($newFullImagePath)) {
                        // Update the model with the new image path
                        $model->image = $newImageName;
                        $model->updated_at = date('Y-m-d H:i:s'); // Update the updated_at field
                        $model->updated_by = Yii::$app->user->id; // Update the updated_by field

                        if ($model->save()) {
                            // Delete the old image if it exists
                            if (!empty($oldImagePath) && file_exists($oldFullImagePath)) {
                                ImageHelper::deleteImage($oldFullImagePath);
                            }

                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    }
                } else {
                    // No new image uploaded, just save the model
                    $model->updated_at = date('Y-m-d H:i:s'); // Update the updated_at field
                    $model->updated_by = Yii::$app->user->id; // Update the updated_by field

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
     * Delete an existing AppTestimonial model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = AppTestimonial::findOne($id);

        if ($model) {
            // Get the image path from the model attribute
            $imagePath = $model->image; // Replace with your actual image attribute name

            // Build the full image path
            $fullImagePath = Yii::getAlias('@webroot/uploads/AppTestimonial/' . $imagePath);

            // Delete the image
            ImageHelper::deleteImage($fullImagePath);

            // Delete the model instance if needed
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Delete multiple existing AppTestimonial model.
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
     * Finds the AppTestimonial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppTestimonial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AppTestimonial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
