<?php
/**
 * @var \yii\web\View $this
 * @var \yii\widgets\ActiveForm $form
 * @var \yii\queue\gii\Generator $generator
 */
?>
<?= $form->field($generator, 'ruleClass')->textInput(['autofocus' => true]) ?>
<?= $form->field($generator, 'ns') ?>
<?= $form->field($generator, 'baseClass') ?>
