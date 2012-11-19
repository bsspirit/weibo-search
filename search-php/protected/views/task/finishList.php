<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>已完成的任务</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
if(!empty($dataProvider)){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'finish-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'uid',
		'screen_name',
		'type',
		'create_date',
	),
));
}
?>
