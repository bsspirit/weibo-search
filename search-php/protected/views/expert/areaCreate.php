<h1>增加新领域</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-form',
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>32,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('maxlength'=>512,'style'=>'height:120px;width:280px;')) ; ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>

