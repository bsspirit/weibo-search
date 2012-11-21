<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>粉丝列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function operate($screen){
	$html = '<a href="javascript:void(0);" onclick="actionAdd(this)" screen="'.$screen.'">Add Task</a>';
	return $html;
}

function linkLabel($uid,$label){
	$html = '';
// 	if($type=='screen'){
		$html = '<a target="_blank" href="/weibo/profile?uid='.$uid.'">'.$label.'</a>';
// 	}
// 		case 'fans':
// 			$html = '<a target="_blank" href="/weibo/fans?uid='.$uid.'">'.$label.'</a>';
// 			break;
// 		case 'follow':
// 			$html = '<a target="_blank" href="/weibo/follows?uid='.$uid.'">'.$label.'</a>';
// 			break;
// 		case 'tweet':
// 			$html = '<a target="_blank" href="/weibo/tweets?uid='.$uid.'">'.$label.'</a>';
// 			break;
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
		array(
			'name'=>'screen_name',
			'type'=>'raw',
			'value' => 'linkLabel($data->fansid,$data->screen_name)',
		),
// // 		array(
// // 			'name'=>'follows',
// // 			'type'=>'raw',
// // 			'value' => 'link($data->fansid,$data->friends_count,"follow")',
// // 		),
// // 		array(
// // 			'name'=>'fans',
// // 			'type'=>'raw',
// // 			'value' => 'link($data->fansid,$data->followers_count,"fans")',
// // 		),
// 		array(
// 			'name'=>'tweets',
// 			'type'=>'raw',
// 			'value' => 'link($data->fansid,$data->statuses_count,"tweet")',
// 		),
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
