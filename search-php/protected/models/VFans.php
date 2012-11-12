<?php

/**
 * This is the model class for table "v_fans".
 *
 * The followings are the available columns in table 'v_fans':
 * @property string $fansid
 * @property string $screen_name
 * @property string $profile_image_url
 * @property integer $followers_count
 * @property integer $friends_count
 * @property integer $statuses_count
 * @property string $verified
 * @property string $created_at
 * @property string $uid
 */
class VFans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VFans the static model class
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
		return 'v_fans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fansid, screen_name, created_at, uid', 'required'),
			array('followers_count, friends_count, statuses_count', 'numerical', 'integerOnly'=>true),
			array('fansid, uid', 'length', 'max'=>20),
			array('screen_name', 'length', 'max'=>32),
			array('profile_image_url', 'length', 'max'=>128),
			array('verified', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fansid, screen_name, profile_image_url, followers_count, friends_count, statuses_count, verified, created_at, uid', 'safe', 'on'=>'search'),
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
			'profile_image_url' => 'Profile Image Url',
			'followers_count' => 'Followers Count',
			'friends_count' => 'Friends Count',
			'statuses_count' => 'Statuses Count',
			'verified' => 'Verified',
			'created_at' => 'Created At',
			'uid' => 'Uid',
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
		$criteria->compare('profile_image_url',$this->profile_image_url,true);
		$criteria->compare('followers_count',$this->followers_count);
		$criteria->compare('friends_count',$this->friends_count);
		$criteria->compare('statuses_count',$this->statuses_count);
		$criteria->compare('verified',$this->verified,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('uid',$this->uid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}