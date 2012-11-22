<?php

class ExpertController extends Controller
{
	
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
	 * 专家操作, update/delete
	 */
	public function actionLeader($lid,$type='leader'){//ajax
		$model=UserSign::model()->findByPk($lid);
		if($model===null) throw new CHttpException(404,'The requested page does not exist.');

		switch($type){
			case 'leader':
			case 'member':
				$model->type=$type;
				$model->save();
				break;
			case 'delete':
				$model->delete();
				break;
		}
		
		echo 1;		
	}
	
	/**
	 * 专家操作, create 
	 */
	public function actionLeaderCreate($uid,$area,$type='leader'){
		if(empty($uid) || empty($area)) throw new CHttpException(401,'userid and area can\'t by empty.');
		
		$model = new UserSign();
		$model->uid=$uid;
		$model->area=$area;
		
		$m=$model->find('uid='.$uid.' and area="'.$area.'"');
		if(!empty($m)){
			echo 2 ;
			return;
		}
		
		$model->type=$type;		
		$model->reason='choice';
		
		$user=User::model()->find('uid='.$uid);
		if($user===null) throw new CHttpException(404,'The requested page does not exist.');
		$model->verified=$user->verified;

		$model->save();
		echo 1;
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
	
	
	/**
	 * 领域管理
	 */
	public function actionArea(){
		$dp=new CActiveDataProvider('Area',array(
				'criteria' => array('condition'=>''),
				'pagination'=>array('pageSize'=>30),
				'sort'=>array('defaultOrder'=>'id DESC'),
		));
		
		$this->render('area',array(
				'dataProvider'=>$dp,
		));
	}
	
	/**
	 * 领域增加
	 */
	public function actionAreaCreate(){
		$model=new Area;
		
		if(isset($_POST['Area'])){
			$model->attributes=$_POST['Area'];
			if($model->save())
				$this->redirect('/expert/area');
		}
		
		$this->render('areaCreate',array(
				'model'=>$model,
		));
	}
	
	/**
	 * 领域修改
	 */
	public function actionAreaUpdate($area){
		$area=Area::model()->find("area='".$area."'");
		if($area===null) throw new CHttpException(404,'The requested page does not exist.');
		
		if(isset($_POST['Area'])){
			$area->attributes=$_POST['Area'];
			if($area->save())
				$this->redirect('/expert/area');
		}
		
		$this->render('areaUpdate',array(
			'model'=>$area,
		));
	}
	
	/**
	 * 领域删除
	 */
	public function actionAreaDelete($area){//ajax
		$model=Area::model()->find("area='".$area."'");
		if($model===null) throw new CHttpException(404,'The requested page does not exist.');
		$model->delete();
		UserSign::model()->deleteAll("area='".$area."'");
		echo 1;
	}
	
	
}