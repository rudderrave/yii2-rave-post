<?php

use ravesoft\helpers\Html;
use ravesoft\post\models\Tag;
use ravesoft\widgets\ActiveForm;
use ravesoft\widgets\LanguagePills;

/* @var $this yii\web\View */
/* @var $model ravesoft\post\models\Tag */
/* @var $form ravesoft\widgets\ActiveForm */
?>

<div class="post-tag-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'post-tag-form',
        'validateOnBlur' => false,
    ])
    ?>

    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">

                    <?php if ($model->isMultilingual()): ?>
                        <?= LanguagePills::widget() ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('rave', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('rave', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>
                            <?php else: ?>
                                <?= Html::submitButton(Yii::t('rave', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('rave', 'Delete'), ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ])
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>