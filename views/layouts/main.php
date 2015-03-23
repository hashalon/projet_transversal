<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
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
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'France',
                'brandUrl' => ['/map/index'],
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    TRUE ?
                    ['label' => 'Graphes', 'url' => ['/graph/index']] :
                    ['label' => 'Carte', 'url' => ['/map/index']],
                    ['label' => 'Affichage',
                        'items' => [
                            ['label' => 'regions', 'url' => '#'],
                            ['label' => 'departements', 'url' => '#'],
                            ['label' => 'arrondissements', 'url' => '#'],
                        ],
                    ],
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    '<div class="input-group">'.
                        '<input type="text" class="form-control" placeholder="Search for...">'.
                        '<span class="input-group-btn">'.
                            '<button class="btn btn-default" type="button">Go!</button>'.
                        '</span>'.
                    '</div>',
                ],
            ]);
            NavBar::end();
        
        ?>
        
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <!-- footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Université François Rabelais <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
