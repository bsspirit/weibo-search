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
<div id="load-dialog"></div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.8.20.custom.min.js"></script>
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

	$("#load-dialog").dialog({
		autoOpen: false,
		height: 150,
		width: 300,
		modal: true
	});

	function actionStart(obj){
		var path='/task/start?tid='+$(obj).attr('tid');
		$(obj).removeAttr('onclick');
		$(obj).css({"color":"gray", "text-decoration":"none"});

		$('#load-dialog').html('请稍等: 正在加载微博数据');
		$('#load-dialog').dialog('option','title','数据初始化......');
		$('#load-dialog').dialog('open');
		
		$.ajax({
		  url: path,
		  success: function(obj){
			  if(obj=='1'){
				  $('#load-dialog').dialog('close');
			  } else {
				  alert("读取失败!");
				  $('#load-dialog').dialog('close');
			  }
		  }
		});
	}
</script>
