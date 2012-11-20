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
		));

		$this->render('finishList',array(
			'dataProvider'=>$dp,
		));
	}
	
	public function actionCreate(){
		$model=new LoadUser();
		if(isset($_POST['LoadUser'])){
			$model->attributes=$_POST['LoadUser'];
			$row=$model->findByAttributes($_POST['LoadUser']);
			if(!empty($row)){
				throw new CHttpException(400,$_POST['LoadUser']['screen_name'].' is in task list and waiting for starting.');
			}
			
			if($model->save()){
				$this->redirect('/task/create',
					array('model'=>$model)
				);
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionStart($tid){//ajax
		$model=LoadUser::model()->findByPk($tid);
		if($model===null) throw new CHttpException(404,'The requested page does not exist.');
		$url = 'http://sapi.fens.me/api/load/screen/'.$model->screen_name;
		echo HttpService::get($url);
	}
	
	public function actionDelete($tid){//ajax
		$model=LoadUser::model()->findByPk($tid);
		if($model===null) throw new CHttpException(404,'The requested page does not exist.');
		$model->delete();
		echo '1';
	}

}