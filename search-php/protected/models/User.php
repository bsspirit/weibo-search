<?php

/**
 * This is the model class for table "t_user".
 *
 * The followings are the available columns in table 't_user':
 * @property integer $id
 * @property string $uid
 * @property string $screen_name
 * @property string $name
 * @property integer $province
 * @property integer $city
 * @property string $location
 * @property string $description
 * @property string $url
 * @property string $profile_image_url
 * @property string $domain
 * @property string $gender
 * @property integer $followers_count
 * @property integer $friends_count
 * @property integer $statuses_count
 * @property integer $favourites_count
 * @property string $created_at
 * @property string $allow_all_act_msg
 * @property string $remark
 * @property string $geo_enabled
 * @property string $verified
 * @property string $allow_all_comment
 * @property string $avatar_large
 * @property string $verified_reason
 * @property integer $online_status
 * @property string $lang
 * @property string $weihao
 * @property integer $verifiedType
 * @property string $create_date
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 't_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, screen_name, name, created_at', 'required'),
			array('province, city, followers_count, friends_count, statuses_count, favourites_count, online_status, verifiedType', 'numerical', 'integerOnly'=>true),
			array('uid', 'length', 'max'=>20),
			array('screen_name, name, location, domain, remark, verified_reason, weihao', 'length', 'max'=>32),
			array('description, url, profile_image_url, avatar_large', 'length', 'max'=>128),
			array('gender, allow_all_act_msg, geo_enabled, verified, allow_all_comment', 'length', 'max'=>1),
			array('lang', 'length', 'max'=>8),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, screen_name, name, province, city, location, description, url, profile_image_url, domain, gender, followers_count, friends_count, statuses_count, favourites_count, created_at, allow_all_act_msg, remark, geo_enabled, verified, allow_all_comment, avatar_large, verified_reason, online_status, lang, weihao, verifiedType, create_date', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'province' => 'Province',
			'city' => 'City',
			'location' => 'Location',
			'description' => 'Description',
			'url' => 'Url',
			'profile_image_url' => 'Profile Image Url',
			'domain' => 'Domain',
			'gender' => 'Gender',
			'followers_count' => 'Followers Count',
			'friends_count' => 'Friends Count',
			'statuses_count' => 'Statuses Count',
			'favourites_count' => 'Favourites Count',
			'created_at' => 'Created At',
			'allow_all_act_msg' => 'Allow All Act Msg',
			'remark' => 'Remark',
			'geo_enabled' => 'Geo Enabled',
			'verified' => 'Verified',
			'allow_all_comment' => 'Allow All Comment',
			'avatar_large' => 'Avatar Large',
			'verified_reason' => 'Verified Reason',
			'online_status' => 'Online Status',
			'lang' => 'Lang',
			'weihao' => 'Weihao',
			'verifiedType' => 'Verified Type',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('province',$this->province);
		$criteria->compare('city',$this->city);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('profile_image_url',$this->profile_image_url,true);
		$criteria->compare('domain',$this->domain,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('followers_count',$this->followers_count);
		$criteria->compare('friends_count',$this->friends_count);
		$criteria->compare('statuses_count',$this->statuses_count);
		$criteria->compare('favourites_count',$this->favourites_count);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('allow_all_act_msg',$this->allow_all_act_msg,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('geo_enabled',$this->geo_enabled,true);
		$criteria->compare('verified',$this->verified,true);
		$criteria->compare('allow_all_comment',$this->allow_all_comment,true);
		$criteria->compare('avatar_large',$this->avatar_large,true);
		$criteria->compare('verified_reason',$this->verified_reason,true);
		$criteria->compare('online_status',$this->online_status);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('weihao',$this->weihao,true);
		$criteria->compare('verifiedType',$this->verifiedType);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}