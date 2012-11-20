<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>等待中的任务</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function operate($tid){
	$html = '<a href="javascript:void(0);" onclick="actionStart(this)" tid="'.$tid.'">start</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
	$html .= '<a href="javascript:void(0);" onclick="actionDelete(this)" tid="'.$tid.'">delete</a>';
	return $html;
}

if(!empty($dataProvider)){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'wait-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'uid',
		'screen_name',
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
	function actionDelete(obj){
		var tid = $(obj).attr('tid');
		var path='/task/delete?tid='+tid;

		$.ajax({
			  url: path,
			  success: function(obj){
				  if(obj==1){
					  location.reload();
				  } else {
					  alert('操作失败!');
				  }
			  }
		});
	}

	function actionStart(obj){
		var tid = $(obj).attr('tid');
		var path='/task/start?tid='+tid;
		
		$(obj).removeAttr('onclick');
		$(obj).css({"color":"gray", "text-decoration":"none"});

		$.ajax({
			  url: path,
			  success: function(obj){
				  if(obj==1){
					  alert('正在加载!');
				  } else {
					  alert('操作失败!');
				  }
			  }
		});

	}
		
</script>
