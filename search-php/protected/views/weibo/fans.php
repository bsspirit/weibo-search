<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>粉丝列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function operate($screen){
	$html = '<a href="javascript:void(0);" onclick="actionAdd(this)" screen="'.$screen.'">Add Task</a>';
	return $html;
}

function portrait($url){
	return '<img src="'.$url.'"/>';
}

if(!empty($dataProvider)){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fans-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name'=>'portrait',
			'type'=>'raw',
			'value' => 'portrait($data->profile_image_url)',
		),
		'fansid',
		'screen_name',
		'followers_count',
		'friends_count',
		'statuses_count',
		array(
			'name'=>'verified',
			'value' => 'UserSign::mappingVerified($data->verified)',
		),
		'created_at',
		array(
			'name'=>'operate',
			'type'=>'raw',
			'value'=>'operate($data->screen_name)',
		),
	),
));
}
?>

<script type="text/javascript">
	function actionAdd(obj){
		var screen = $(obj).attr('screen');
		var path='/task/add?screen='+screen;
		$(obj).removeAttr('onclick');
		$(obj).css({"color":"gray", "text-decoration":"none"});
		
		$.ajax({
		  url: path,
		  success: function(obj){
			  if(obj=='1'){
				  alert('操作成功!');
			  } else if(obj=='2'){
				  alert(screen+',已在任务列表中!');
			  } else {
				  alert("读取失败!");
			  }
		  }
		});
	}
</script>
