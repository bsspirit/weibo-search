<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>等待中的任务</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function operate($screen){
	return '<a href="#">start</a>';
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
				'value'=>'operate($data->screen_name)',
		),
	),
));
}
?>
