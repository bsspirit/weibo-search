<?php if(!empty($form)){?>
<div class="form">
	<form method="GET">
		<?php if(!empty($form->uid)){?>
		<div class="row">
			User ID:<input name="uid">
		</div>
		<?php }?>

		<?php if(!empty($form->area)){?>
		<div class="row">
			Area:<input name="area">
		</div>
		<?php }?>
		<input type="submit" value="Search" />
	</form>
</div>
<?php }?>