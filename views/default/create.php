<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = Yii::t('rave', 'Create {item}', ['item' => Yii::t('rave/post', 'Post')]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/post', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>
