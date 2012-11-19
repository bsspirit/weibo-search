<?php include_once dirname(__FILE__).'/../common/_quickBar.php';?>
<h1>微博列表</h1>
<?php include_once dirname(__FILE__).'/../common/_quickForm.php';?>

<?php 
if(!empty($dataProvider)){
$this->widget('zii.widgets.CListView', array(
	'id'=>'tweets-grid',
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewTweets',
));
}
?>
