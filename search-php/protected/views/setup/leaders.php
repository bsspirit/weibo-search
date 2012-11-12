<p>
<a href="/setup/leaders">专家列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="/setup/recommendUsers">系统选出的用户列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;
</p>

<p>
<a href="/setup/fans/uid">粉丝列表 </a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="/setup/follows/uid">关注列表 </a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="/setup/tweets/uid">微博列表 </a>&nbsp;&nbsp;|&nbsp;&nbsp;
</p>

<h1>专家列表</h1>

<?php 


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
	),
));

?>
