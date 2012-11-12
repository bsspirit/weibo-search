<?php

/**
 * This is the model class for table "v_fans_area".
 *
 * The followings are the available columns in table 'v_fans_area':
 * @property string $fansid
 * @property string $screen_name
 * @property string $num
 * @property string $area
 */
class VFansArea extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VFansArea the static model class
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
		return 'v_fans_area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fansid, screen_name, area', 'required'),
			array('fansid', 'length', 'max'=>20),
			array('screen_name, area', 'length', 'max'=>32),
			array('num', 'length', 'max'=>21),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fansid, screen_name, num, area', 'safe', 'on'=>'search'),
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
			'fansid' => 'Fansid',
			'screen_name' => 'Screen Name',
			'num' => 'Num',
			'area' => 'Area',
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

		$criteria->compare('fansid',$this->fansid,true);
		$criteria->compare('screen_name',$this->screen_name,true);
		$criteria->compare('num',$this->num,true);
		$criteria->compare('area',$this->area,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}