<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>领域潜在用户列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function portrait($url){
	return '<img src="'.$url.'"/>';
}

if(!empty($dataProvider)){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'areaUsers-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'fansid',
		'screen_name',
		'num',
	),
));
}


?>
