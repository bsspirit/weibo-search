<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>专家列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php
function operate($fansid){
	$v = '<a href="/setup/leader?uid='.$fansid.'&area='.$_GET['area'].'">leader</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/setup/member?uid='.$fansid.'&area='.$_GET['area'].'">member</a>&nbsp;&nbsp;|&nbsp;&nbsp';
	$v .= '<a href="/setup/delete?uid='.$fansid.'&area='.$_GET['area'].'">delete</a>&nbsp;&nbsp;';
	return $v;
}

 
if(!empty($dataProvider)){
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
				'value'=>'operate($data->uid)',
		),
	),
));
}

?>
