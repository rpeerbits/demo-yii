<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

<?php $this->beginBody() ?>
    <div class="page-wrapper">
        <?php include_once('top_header.php');?>
        
            <?php include_once('left.php');?>
            <div class="page-content-wrapper">
                <div class="page-content" >
                    <div class="page-bar">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            
                        ]) ?>
                    </div>
                    <h1 class="page-title"></h1>
                    
                    <?= $content ?>
                </div>
            </div>
        
    
        <?php include_once('footer.php');?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>