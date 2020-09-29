<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ravesoft\post\models\Tag */

$this->title = Yii::t('rave/media', 'Update Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/post', 'Posts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/post', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('rave', 'Update');
?>
<div class="post-tag-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>