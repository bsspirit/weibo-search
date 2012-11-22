<h1>增加专家</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php if(!empty($model)){?>
<div class="view l" style="width:95%">

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

<div class="view l" style="width:95%">
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'leader-form',
	)); ?>
	
		<div class="row">
			UserId: <?php echo $model->uid?>
			<input type="hidden" name="uid" value="<?php echo $model->uid?>"/>
		</div>
		<div class="row">
			Area:<?php echo Area::dropDownArea('',false)?>
		</div>	
		
		<div class="row buttons">
			<input type="button" name="create" value="create" onclick="actionLeaderCreate('leader-form')">
		</div>
	
	<?php $this->endWidget(); ?>
	</div>
</div>

<script type="text/javascript">
	function actionLeaderCreate(formid){
		var area= $('#leader-form select[name="area"]').val();
		var uid= $('#leader-form input[name="uid"]').val();
		var path='/expert/leaderCreateAjax?uid='+uid+'&area='+area;

		$.ajax({
			  url: path,
			  success: function(obj){
				  if(obj==1){
					  alert('成功创建！');
				  } else if(obj==2){
					  alert('重复创建！');
				  } else {
					  alert('操作失败!');
				  }
			  }
		});
	}
</script>
<?php }?>




