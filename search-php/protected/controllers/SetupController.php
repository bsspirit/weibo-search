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
	
	
// 	public function actionReject(){
// 		if(isset($_GET['qid'])){
// 			$quizStatus=$this->loadQuizStatus($_GET['qid']);
// 			$quizStatus->status='REJECT';
// 			$quizStatus->save();
// 		}
// 		echo 1;
// 	}


}