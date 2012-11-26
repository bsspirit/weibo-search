<?php 

class DownloadService{

	public static function httpUserArea($area){
		$url = 'http://ds.fens.me/';
		#/home/huang/deploy/weibo-search/search-php/temp/20121126022357
		
		$sqls=array(
				'fans_area'=>"select fansid,screen_name,num from v_fans_area where area='".$area."' and num>=3",
				'user'=>" select u.uid,u.screen_name,u.location,u.followers_count,u.friends_count,u.statuses_count,u.favourites_count,u.created_at,u.verified,u.description".
						" from t_user u,v_fans_area a".
						" where u.uid=a.fansid".
						" and a.area='".$area."' and a.num>=3",
				'tweet'=>" select t.tid,t.uid,t.retid,t.created_at,t.text,t.source_name,t.reposts_count,t.comments_count,t.bmiddlePic".
						 " from t_tweet t,v_fans_area a".
						 " where t.uid=a.fansid".
						 " and a.area='".$area."' and a.num>=3",
		);
		
		$dir=DownloadService::db2CSV($sqls);
		$zip=FileService::dirZip($dir);
		
		return $url.$zip;
	}
	
	private static function db2CSV($sqls){
		$loc = 'temp';
		$dir = FileService::mkdirNow($loc);
		$connection=Yii::app()->db;
		
		foreach(array_keys($sqls) as $key){
			$sql = $sqls[$key];			
			$command=$connection->createCommand($sql);
			$rows = $command->queryAll();
			
			foreach($rows as $row){
				FileService::writeCSV($dir.$key.'.csv', $row);
			}
		}
		return $dir;
	}

}

?>