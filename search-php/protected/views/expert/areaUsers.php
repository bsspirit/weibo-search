<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>领域潜在用户列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function operate($fansid,$screen){
	$v = '<a href="javascript:void(0);" onclick="actionLeaderCreate(this)"  uid="'.$fansid.'" area="'.$_GET['area'].'" type="leader">leader</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="javascript:void(0);" onclick="actionLeaderCreate(this)"  uid="'.$fansid.'" area="'.$_GET['area'].'" type="member">member</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="javascript:void(0);" onclick="actionAdd(this)" screen="'.$screen.'">Add Task</a>';
	return $v;
}

function basic($fansid){
	$v = '<a href="/weibo/profile?uid='.$fansid.'" target="_blank">profile</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/weibo/fans?uid='.$fansid.'" target="_blank">fans</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/weibo/follows?uid='.$fansid.'" target="_blank">follow</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/weibo/tweets?uid='.$fansid.'" target="_blank">tweet</a>&nbsp;&nbsp;';
	return $v;
}

if(!empty($dataProvider)){
?>

<div class="view">
	<a href="javascript:void(0);" onclick="actionGenerate('<?php echo $_GET['area']?>')">生成数据</a>
	<div id="area-download"></div>
</div>

<?php 	
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
			'value'=>'operate($data->fansid,$data->screen_name)',		
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
		var path='/expert/leaderCreateAjax?uid='+uid+'&type='+type+'&area='+area;

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

	function actionGenerate(area){
		$.ajax({
			  url: '/expert/generate?area='+area,
			  success: function(json){
				  var obj = $.parseJSON(json);  
				  if(obj.success=='1'){
					  alert('操作成功!');
					  $('#area-download').html('<br/><a href="'+obj.url+'">下载数据</a>');
				  } else {
					  alert("读取失败!");
				  }
			  }
		  });
	}
</script>

