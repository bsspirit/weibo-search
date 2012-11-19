<?php

/**
 * This is the model class for table "v_load_freq".
 *
 * The followings are the available columns in table 'v_load_freq':
 * @property integer $id
 * @property string $uid
 * @property string $screen_name
 * @property string $type
 * @property string $create_date
 */
class VLoadFreq extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VLoadFreq the static model class
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
		return 'v_load_freq';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, screen_name', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('uid', 'length', 'max'=>20),
			array('screen_name', 'length', 'max'=>32),
			array('type', 'length', 'max'=>43),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, screen_name, type, create_date', 'safe', 'on'=>'search'),
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
			'screen_name' => 'Screen Name',
			'type' => 'Type',
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
		$criteria->compare('screen_name',$this->screen_name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}