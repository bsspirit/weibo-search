<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>专家列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php
function operate($id){
	$v = '<a href="javascript:void(0);" onclick="actionLeader(this)" lid="'.$id.'" type="leader">leader</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="javascript:void(0);" onclick="actionLeader(this)" lid="'.$id.'" type="member">member</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="javascript:void(0);" onclick="actionLeader(this)" lid="'.$id.'" type="delete">delete</a>&nbsp;&nbsp;';
	return $v;
}

function leader_head($info){
	$show = '<div class="view">';
	$show .= '信息链&nbsp;&nbsp;:&nbsp;&nbsp;';
	$show .= '<strong>'.$info['area']. '</strong>&nbsp;&nbsp;-->&nbsp;&nbsp;';
	$show .= '<strong>专家</strong>('.$info['leaders'].'人) + ';
	$show .= '<strong>用户</strong>('.$info['members'].'人)&nbsp;&nbsp;-->&nbsp;&nbsp;';
	$show .= '<strong>选出的用户数</strong>('.$info['fans'].'人)&nbsp;&nbsp;-->&nbsp;&nbsp;';
	$show .= '<strong>总微博数</strong>('.$info['tweets'].'条)';
	$show .= '</div>';
	return $show; 
}

if(!empty($dataProvider)){
	if(!empty($info)){
		echo leader_head($info);	
	}
	
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'leaders-grid',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
			'id' ,
			'uid',
			'screen_name',
			'area',
			array(
				'name'=>'Reason',
				'value' => 'UserSign::mappingReason($data->reason)',
			),
			array(
				'name'=>'Reason',
				'value' => 'UserSign::mappingType($data->type)',
			),
			array(
				'name'=>'verified',
				'value' => 'UserSign::mappingVerified($data->verified)',
			),
			'create_date',
			array(
					'name'=>'operate',
					'type'=>'raw',
					'value'=>'operate($data->id)',
			),
		),
	));
}
?>

<script type="text/javascript">
	function actionLeader(obj){
		var lid = $(obj).attr('lid');
		var type = $(obj).attr('type');
		var path='/expert/leader?lid='+lid+'&type='+type;

		$.ajax({
			  url: path,
			  success: function(obj){
				  if(obj==1){
					  location.reload();
				  } else {
					  alert("修改失败");
				  }
			  }
		});
	}
</script>
