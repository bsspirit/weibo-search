<?php

class TaskController extends Controller{
	
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
	
	public function actionWaitList(){
		$dp=new CActiveDataProvider('VLoadUser',array(
			'criteria' => array('condition'=>''),
			'pagination'=>array('pageSize'=>20),
			'sort'=>array('defaultOrder'=>'id ASC'),
		));

		$this->render('waitList',array(
			'dataProvider'=>$dp,
		));
	}
	
	public function actionFinishList(){
		$dp=new CActiveDataProvider('VLoadFreq',array(
			'criteria' => array('condition'=>''),
			'pagination'=>array('pageSize'=>20),
			//'sort'=>array('defaultOrder'=>'id DESC'),
		));

		$this->render('finishList',array(
			'dataProvider'=>$dp,
		));
	}
	
	public function actionStart(){
		$this->render('index');
	}

}