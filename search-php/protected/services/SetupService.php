<?php 

class SetupService{

	public static function leadersInfo($area){
		$num = 3;
		
		$info = array('area'=>$area);
		$leaders = "select count(id) as count from t_user_sign where area='".$area."'";
		$fans = "select count(fansid) as count from v_fans_area where area='".$area."' and num>=".$num;
		$tweets = "select sum(statuses_count) as count from t_user u, v_fans_area fa where fa.area='".$area."' and fa.num>=".$num." and fa.fansid=u.uid";
		
		$conn=Yii::app()->db;
		$command = $conn->createCommand($leaders);
		$data=$command->queryRow();
		$info['leaders']=$data['count'];
		
		$command = $conn->createCommand($fans);
		$data=$command->queryRow();
		$info['fans']=$data['count'];
		
		$command = $conn->createCommand($tweets);
		$data=$command->queryRow();
		$info['tweets']=$data['count'];
		
		return $info;
	}
}

?>
