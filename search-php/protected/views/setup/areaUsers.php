<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>领域潜在用户列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function operate($fansid){
	$v = '<a href="/setup/leader?uid='.$fansid.'&area='.$_GET['area'].'">leader</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/setup/member?uid='.$fansid.'&area='.$_GET['area'].'">member</a>&nbsp;&nbsp;';
	return $v;
}

function basic($fansid){
	$v = '<a href="/setup/fans?uid='.$fansid.'" target="_blank">fans</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/setup/follows?uid='.$fansid.'" target="_blank">follow</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/setup/tweets?uid='.$fansid.'" target="_blank">tweet</a>&nbsp;&nbsp;';
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
