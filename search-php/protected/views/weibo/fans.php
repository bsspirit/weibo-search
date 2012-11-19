<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>粉丝列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
function portrait($url){
	return '<img src="'.$url.'"/>';
}

if(!empty($dataProvider)){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fans-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name'=>'portrait',
			'type'=>'raw',
			'value' => 'portrait($data->profile_image_url)',
		),
		'fansid',
		'screen_name',
		'followers_count',
		'friends_count',
		'statuses_count',
		array(
			'name'=>'verified',
			'value' => 'UserSign::mappingVerified($data->verified)',
		),
		'created_at',
	),
));
}
?>
