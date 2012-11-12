
<div class="view">
	<?php echo $data->text?>

	<!-- retweet -->
	<?php if(!empty($data->retid)){
		$ret = $data->retid;
	?>
	<div class="view" style="background-color:#F7F7F7;">
		<?php echo $ret['text']?>
		<?php if(!empty($ret['thumbnailPic'])){?>
		<div class="view">
			<img src="<?php echo $ret['thumbnailPic']?>" />
		</div>
		<?php }?>
		<p style="margin:15px 5px 5px;">
			<?php echo $ret['created_at']?>&nbsp;&nbsp;|
			来自<?php echo $ret['source_name']?>&nbsp;&nbsp;|&nbsp;&nbsp;
			转发(<?php echo $ret['reposts_count']?>)&nbsp;&nbsp;|&nbsp;&nbsp;
			评论(<?php echo $ret['comments_count']?>)&nbsp;&nbsp;
		</p>
	</div>
	<?php }?>
	<!-- retweet -->
	
	<?php if(!empty($data->thumbnailPic)){?>
	<div class="view">
		<img src="<?php echo $data->thumbnailPic?>" />
	</div>
	<?php }?>
	
	<p style="margin:15px 5px 5px;">
		<?php echo $data->created_at?>&nbsp;&nbsp;|
		来自<?php echo $data->source_name?>&nbsp;&nbsp;|&nbsp;&nbsp;
		转发(<?php echo $data->reposts_count?>)&nbsp;&nbsp;|&nbsp;&nbsp;
		评论(<?php echo $data->comments_count?>)&nbsp;&nbsp;
	</p>

</div>