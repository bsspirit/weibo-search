<?php if(!empty($form)){?>
<div class="form">
	<form method="GET">
		<?php if(!empty($form->uid)){?>
		<div class="row">
			User ID:<input name="uid" value="<?php echo (empty($_GET['uid'])?'':$_GET['uid'])?>" />
		</div>
		<?php }?>

		<?php if(!empty($form->area)){?>
		<div class="row">
			Area:<?php echo Area::dropDownArea(empty($_GET['area'])?'':$_GET['area'])?>
		</div>
		
		<?php }?>
		<input type="submit" value="Search" />
	</form>
</div>
<?php }?>