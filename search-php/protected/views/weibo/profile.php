<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>用户资料</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php if(!empty($model)){?>
<div class="view l" style="width:90%">

	<div class="view l">
		<img src="<?php echo $model->avatar_large?>" />
	</div>
	
	<div class="view l" style="margin:10px;width:65%;">
		<div class="row h25">
			User Id&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->uid?>
		</div>
		<div class="row h25">
			Screen Name&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->screen_name?>
		</div>
		<div class="row h25">
			Location&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->location?>
		</div>

		<div class="row h25">
			URL&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->url?>
		</div>
		<div class="row h25">
			Gender&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->gender=='m'?'男':'女'?>
		</div>
		<div class="row h25">
			Follow&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->friends_count?>&nbsp;&nbsp;
			Fans&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->followers_count?>&nbsp;&nbsp;
			Tweet&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->statuses_count?>&nbsp;&nbsp;
		</div>
		<div class="row h25">
			CreateAt&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->created_at?>
		</div>
		<div class="row h25">
			Verified:&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->verified=='f'?'未认证':'V认证'?>
		</div>
		<div class="row h40">
			Description&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $model->description?>
		</div>
	</div>
	<div class="c"></div>
</div>
<?php }?>

