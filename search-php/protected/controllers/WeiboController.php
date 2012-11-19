<?php

class WeiboController extends Controller{
	public function filters(){
		return array(
				'accessControl',
		);
	}
	
	public function accessRules(){
		return array(
				array('allow',
						'actions'=>array('*'),
						'users'=>array('@'),
				),
		// 				array('deny',
		// 						'users'=>array('*'),
		// 				),
		);
	}
	
	public function actionIndex()	{
		$this->render('index');
	}
	
	/**
	 * 粉丝列表
	 */
	public function actionFans(){
		$cond='';
		if(!empty($_REQUEST['uid'])){
			$cond.=' and uid='.$_REQUEST['uid'];
		}
	
		$dp=null;
		if(!empty($cond)){
			$dp=new CActiveDataProvider('VFans',array(
					'criteria' => array('condition'=>substr($cond,4)),
					'pagination'=>array('pageSize'=>10),
			));
		}
	
		$this->render('fans',array(
				'dataProvider'=>$dp,
				'form'=>FormService::create(array('uid')),
		));
	}
	
	/**
	 * 关注列表
	 */
	public function actionFollows(){
		$cond='';
		if(!empty($_REQUEST['uid'])){
			$cond.=' and fansid='.$_REQUEST['uid'];
		}
	
		$dp=null;
		if(!empty($cond)){
			$dp=new CActiveDataProvider('VFollows',array(
					'criteria' => array('condition'=>substr($cond,4)),
					'pagination'=>array('pageSize'=>10),
			));
		}
	
		$this->render('follows',array(
				'dataProvider'=>$dp,
				'form'=>FormService::create(array('uid')),
		));
	}
	
	/**
	 * 微博列表
	 */
	public function actionTweets(){
		$dp=null;
		if(!empty($_REQUEST['uid'])){
			$cond='uid='.$_REQUEST['uid'];
			$dp=new CActiveDataProvider('Tweet',array(
					'criteria' => array('condition'=>$cond),
					'pagination'=>array('pageSize'=>10),
			));
			//retweet====================================
			$retids=null;
			foreach($dp->getData() as $data){
				if(!empty($data->retid)){
					$retids.=','.$data->retid;
				}
			}
				
			$retweets=null;
			if(!empty($retids)){
				$sql="select * from t_tweet where tid in (".substr($retids,1).")";
				$conn=Yii::app()->db;
				$command = $conn->createCommand($sql);
				$retweets=$command->queryAll();
					
				foreach($dp->getData() as $data){
					if(!empty($data->retid)){
						foreach($retweets as $ret){
							if($data->retid == $ret['tid']) $data->retid = $ret;
						}
					}
				}
			}
		}
	
		$this->render('tweets',array(
				'dataProvider'=>$dp,
				'form'=>FormService::create(array('uid')),
		));
	}

}