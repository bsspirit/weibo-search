<?php

class SetupController extends Controller{
	
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
	
	public function actionIndex(){
		$this->render('index');
	}
	
	/**
	 * 专家列表
	 */
	public function actionLeaders(){
		$cond='';
		$info=null;
		if(!empty($_REQUEST['uid'])){
			$cond.=' and uid='.$_REQUEST['uid'];
		}
		if(!empty($_REQUEST['area'])){
			$cond.=" and area='".$_REQUEST['area']."'";
			$info=SetupService::leadersInfo($_REQUEST['area']);
		}
		
		$dp=null;
		if(!empty($cond)){
			$dp=new CActiveDataProvider('VUserSign',array(
					'criteria' => array('condition'=>substr($cond,4)),
					'pagination'=>array('pageSize'=>20)
			));
		}
		
		$this->render('leaders',array(
				'dataProvider'=>$dp,
				'form'=>FormService::create(array('uid','area')),
				'info'=>$info,
		));
	}
	
	/**
	 * 专家操作
	 */
	public function actionLeader(){
		
	}
	
	/**
	 * 某领域的潜在用户
	 */
	public function actionAreaUsers(){
		$cond='';
		if(!empty($_REQUEST['area'])){
			$cond.=" and area='".$_REQUEST['area']."'";
		}
		
		$dp=null;
		if(!empty($cond)){
			$dp=new CActiveDataProvider('VFansArea',array(
					'criteria' => array('condition'=>substr($cond,4)),
					'pagination'=>array('pageSize'=>30),
			));
		}
		
		
		$this->render('areaUsers',array(
				'dataProvider'=>$dp,
				'form'=>FormService::create(array('area')),
		));
	}
	

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}