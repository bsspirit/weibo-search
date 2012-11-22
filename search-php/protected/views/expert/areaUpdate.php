<h1>修改领域</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-form',
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<b>Area:</b>
		<?php echo $model->area; ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('maxlength'=>512,'style'=>'height:120px;width:280px;')) ; ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo $form->hiddenField($model,'area'); ?>
		<?php echo $form->hiddenField($model,'id'); ?>
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>

