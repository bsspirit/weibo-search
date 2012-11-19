<h1>增加新任务</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'load-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'screen_name'); ?>
		<?php echo $form->textField($model,'screen_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'screen_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>