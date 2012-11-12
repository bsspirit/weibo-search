<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->textField($model,'uid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'screen_name'); ?>
		<?php echo $form->textField($model,'screen_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'screen_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province'); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_image_url'); ?>
		<?php echo $form->textField($model,'profile_image_url',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'profile_image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domain'); ?>
		<?php echo $form->textField($model,'domain',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'domain'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'followers_count'); ?>
		<?php echo $form->textField($model,'followers_count'); ?>
		<?php echo $form->error($model,'followers_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'friends_count'); ?>
		<?php echo $form->textField($model,'friends_count'); ?>
		<?php echo $form->error($model,'friends_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'statuses_count'); ?>
		<?php echo $form->textField($model,'statuses_count'); ?>
		<?php echo $form->error($model,'statuses_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'favourites_count'); ?>
		<?php echo $form->textField($model,'favourites_count'); ?>
		<?php echo $form->error($model,'favourites_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allow_all_act_msg'); ?>
		<?php echo $form->textField($model,'allow_all_act_msg',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'allow_all_act_msg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textField($model,'remark',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'geo_enabled'); ?>
		<?php echo $form->textField($model,'geo_enabled',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'geo_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verified'); ?>
		<?php echo $form->textField($model,'verified',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'verified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allow_all_comment'); ?>
		<?php echo $form->textField($model,'allow_all_comment',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'allow_all_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar_large'); ?>
		<?php echo $form->textField($model,'avatar_large',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'avatar_large'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verified_reason'); ?>
		<?php echo $form->textField($model,'verified_reason',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'verified_reason'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'online_status'); ?>
		<?php echo $form->textField($model,'online_status'); ?>
		<?php echo $form->error($model,'online_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->textField($model,'lang',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weihao'); ?>
		<?php echo $form->textField($model,'weihao',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'weihao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verifiedType'); ?>
		<?php echo $form->textField($model,'verifiedType'); ?>
		<?php echo $form->error($model,'verifiedType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->