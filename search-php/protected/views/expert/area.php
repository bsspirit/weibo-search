<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>领域管理</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<div class="view">
	<a href="/expert/areaCreate">增加新领域</a>
</div>

<?php 
function operate($area){
	$v = '<a href="/expert/areaUpdate?area='.$area.'">update</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="javascript:void(0);" onclick="actionAreaDelete(this)" area="'.$area.'">delete</a>&nbsp;&nbsp;';
	return $v;
}

if(!empty($dataProvider)){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'areaUsers-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'area',
		'description',
		'create_date',
		array(
			'name'=>'operate',
			'type'=>'raw',
			'value'=>'operate($data->area)',		
		),
	),
));
}
?>

<script type="text/javascript">
	function actionAreaDelete(obj){
		var area = $(obj).attr('area');
		var path='/expert/areaDelete?area='+area;

		if(confirm("删除操作将领域中已关联的用户，是否删除?")){
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
		
		
	}
</script>

