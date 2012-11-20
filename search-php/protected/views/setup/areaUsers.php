<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>领域潜在用户列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function operate($fansid){
	$v = '<a href="javascript:void(0);" onclick="actionLeaderCreate(this)"  uid="'.$fansid.'" area="'.$_GET['area'].'" type="leader">leader</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="javascript:void(0);" onclick="actionLeaderCreate(this)"  uid="'.$fansid.'" area="'.$_GET['area'].'" type="member">member</a>&nbsp;&nbsp;';
	return $v;
}

function basic($fansid){
	$v = '<a href="/weibo/fans?uid='.$fansid.'" target="_blank">fans</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/weibo/follows?uid='.$fansid.'" target="_blank">follow</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/weibo/tweets?uid='.$fansid.'" target="_blank">tweet</a>&nbsp;&nbsp;';
	return $v;
}

if(!empty($dataProvider)){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'areaUsers-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'fansid',
		'screen_name',
		'num',
		array(
			'name'=>'operate',
			'type'=>'raw',
			'value'=>'operate($data->fansid)',		
		),
		array(
			'name'=>'view',
			'type'=>'raw',
			'value'=>'basic($data->fansid)',
		),
	),
));
}

?>

<script type="text/javascript">
	function actionLeaderCreate(obj){
		var uid = $(obj).attr('uid');
		var area = $(obj).attr('area');
		var type = $(obj).attr('type');
		var path='/setup/leaderCreate?uid='+uid+'&type='+type+'&area='+area;

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

