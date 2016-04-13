<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Request;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $currentUserId integer */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user',
                'value' => 'user.username'
            ],
            'urgency',
            'description',
            'tel',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:70px;'],
                'buttons'=>[
                    'update' => function ($url, $model, $key) use ($currentUserId) {
                        /* @var $model Request */
                        return $model->userid == $currentUserId ? Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            $url
                        ) : '';
                    },
                    'delete' => function ($url, $model, $key) use ($currentUserId) {
                        /* @var $model Request */
                        return $model->userid === $currentUserId ? Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            $url,
                            ['data' => [
                                'confirm' => "Are you sure you want to delete request?",
                                'method' => 'post',
                             ],
                            ]
                        ) : '';
                    },
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
