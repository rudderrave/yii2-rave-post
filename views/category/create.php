<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ravesoft\post\models\Category */

$this->title = Yii::t('rave/media', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/post', 'Posts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/post', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('rave', 'Create');
?>

<div class="post-category-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>