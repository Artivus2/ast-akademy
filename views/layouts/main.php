<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
		'encodeLabels' => false,
        'items' => [
			[
				'visible' => !Yii::$app->user->isGuest,
				'label' => 'Пользователи',
				'items' => [
					'<div  class="dropdown-header">Клиенты</div >',
					['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-user"></span> Список клиентов', 'url' => ['/admin/users/index']],
					['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-collapse-down"></span> История пополнений', 'url' => ['/admin/payment-increases']],
                    ['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-collapse-up"></span> Заявки на вывод средств', 'url' => ['/admin/payment-outputs']],

                    '<div  class="dropdown-header">Партнеры</div >',
                    ['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-user"></span> Список партнеров', 'url' => ['/admin/affiliate-users/index']],
                    ['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-collapse-down"></span> Поступление средств', 'url' => ['/admin/affiliate-payment-increases']],
                    ['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-collapse-up"></span> Вывод средств', 'url' => ['/admin/affiliate-payment-outputs']],

                    '<div  class="dropdown-header">Управление доступом</div >',
					['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-lock"></span> Маршруты', 'url' => ['/rbac/route']],
					['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-lock"></span> Доступы', 'url' => ['/rbac/permission']],
					['visible' => !Yii::$app->user->isGuest, 'label' => '<span class="glyphicon glyphicon-lock"></span> Роли', 'url' => ['/rbac/role']],
                ]
			],
            [
                'visible' => !Yii::$app->user->isGuest,
                'label' => 'Партнерская программа',
                'items' => [
                    ['visible' => !Yii::$app->user->isGuest, 'label' => 'Партнерские ссылки', 'url' => ['/admin/affiliate-invitation']],
                    ['visible' => !Yii::$app->user->isGuest, 'label' => 'Типы партнерки', 'url' => ['/admin/affiliate-offers']],
                    ['visible' => !Yii::$app->user->isGuest, 'label' => 'Способы вывода', 'url' => ['/admin/affiliate-wallet-types']],
                ],
            ],
            [
                'visible' => !Yii::$app->user->isGuest,
                'label' => 'Терминал',
                'items' => [
                    ['visible' => !Yii::$app->user->isGuest, 'label' => 'Активы', 'url' => ['/admin/charts']],
                    ['visible' => !Yii::$app->user->isGuest, 'label' => 'Категории', 'url' => ['/admin/charts-categories']],
                    ['visible' => !Yii::$app->user->isGuest, 'label' => 'История ставкок', 'url' => ['/admin/deals']],

                ],
            ],
			[
				'visible' => !Yii::$app->user->isGuest,
				'label' => 'Другое',
				'items' => [
					['visible' => !Yii::$app->user->isGuest, 'label' => 'Настройки', 'url' => ['/admin/apps']],
					['visible' => !Yii::$app->user->isGuest, 'label' => 'Вид платежей', 'url' => ['/admin/payment-types']],
					['visible' => !Yii::$app->user->isGuest, 'label' => 'Промокоды', 'url' => ['/admin/promocodes']],

				],
			],
            Yii::$app->user->isGuest ? (
                ['label' => 'Авторизоваться', 'url' => ['/site/login']]
            ) : (
                ['label' => 'Выход (' . Yii::$app->user->identity->email . ')', 'url' => ['/site/logout']]
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
