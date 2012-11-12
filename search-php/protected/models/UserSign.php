<?php

/**
 * This is the model class for table "t_user_sign".
 *
 * The followings are the available columns in table 't_user_sign':
 * @property integer $id
 * @property string $uid
 * @property string $area
 * @property string $reason
 * @property string $type
 * @property string $verified
 * @property string $create_date
 */
class UserSign extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserSign the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_user_sign';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, area, reason, type', 'required'),
			array('uid', 'length', 'max'=>20),
			array('area', 'length', 'max'=>32),
			array('reason, type', 'length', 'max'=>16),
			array('verified', 'length', 'max'=>1),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, area, reason, type, verified, create_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => 'Uid',
			'area' => 'Area',
			'reason' => 'Reason',
			'type' => 'Type',
			'verified' => 'Verified',
			'create_date' => 'Create Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('verified',$this->verified,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function mappingReason($reason){
		$label='';
		switch($reason){
			case 'choice':
				$label='人工选择';
				break;
			case 'recommend':
				$label='系统推荐';
				break;
		}
		return $label;
	}
	
	public static function mappingType($type){
		$label='';
		switch($type){
			case 'leader':
				$label='专家';
				break;
			case 'member':
				$label='用户';
				break;
		}
		return $label;
	}
	
	public static function mappingVerified($v){
		$label='';
		switch($v){
			case 1:
			case 't':
				$label='V认证';
				break;
			case 0:
			case 'f':
				$label='';
				break;
		}
		return $label;
	}
}