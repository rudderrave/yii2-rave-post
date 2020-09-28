<?php

use ravesoft\grid\GridPageSize;
use ravesoft\grid\GridView;
use ravesoft\helpers\Html;
use ravesoft\post\models\Category;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel ravesoft\post\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/media', 'Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/post', 'Posts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="post-category-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'post-category-grid-pjax']) ?>
                </div>
            </div>

            <?php Pjax::begin(['id' => 'post-category-grid-pjax']) ?>

            <?= GridView::widget([
                'id' => 'post-category-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'post-category-grid',
                    'actions' => [Url::to(['bulk-delete']) => Yii::t('yee', 'Delete')]
                ],
                'columns' => [
                    ['class' => 'ravesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'ravesoft\grid\columns\TitleActionColumn',
                        'controller' => '/post/category',
                        'title' => function (Category $model) {
                            return Html::a($model->title, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    [
                        'attribute' => 'parent_id',
                        'value' => function (Category $model) {

                            if ($parent = $model->getParent()->one() AND $parent->id > 1) {
                                return Html::a($parent->title, ['update', 'id' => $parent->id], ['data-pjax' => 0]);
                            } else {
                                return '<span class="not-set">' . Yii::t('yii', '(not set)') . '</span>';
                            }

                        },
                        'format' => 'raw',
                        'filter' => Category::getCategories(),
                        'filterInputOptions' => ['class' => 'form-control', 'encodeSpaces' => true],
                    ],
                    'description:ntext',
                    [
                        'class' => 'ravesoft\grid\columns\StatusColumn',
                        'attribute' => 'visible',
                    ],
                ],
            ]); ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>