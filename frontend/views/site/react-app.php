<?php
use yii\helpers\Html;

$this->title = 'React App';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="root"></div>

<?php
// Include React app's static files
$basePath = Yii::$app->request->baseUrl;
$this->registerJsFile("@web/react-app/static/js/main.f6e64e50.js");
// $this->registerJsFile("$basePath/react-app/static/js/runtime-main.js");
$this->registerJsFile("@web/react-app/static/js/453.2a82e7ac.chunk.js");
$this->registerCssFile("@web/react-app/static/css/main.f855e6bc.css");
?>
