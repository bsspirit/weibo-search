<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'screen_name',
		'name',
		'province',
		'city',
		'location',
		'description',
		'url',
		'profile_image_url',
		'domain',
		'gender',
		'followers_count',
		'friends_count',
		'statuses_count',
		'favourites_count',
		'created_at',
		'allow_all_act_msg',
		'remark',
		'geo_enabled',
		'verified',
		'allow_all_comment',
		'avatar_large',
		'verified_reason',
		'online_status',
		'lang',
		'weihao',
		'verifiedType',
		'create_date',
	),
)); ?>
