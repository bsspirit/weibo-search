<?php

/**
 * This is the model class for table "t_tweet".
 *
 * The followings are the available columns in table 't_tweet':
 * @property integer $id
 * @property string $tid
 * @property string $mid
 * @property string $uid
 * @property string $retid
 * @property string $created_at
 * @property string $text
 * @property string $source_name
 * @property integer $reposts_count
 * @property integer $comments_count
 * @property string $thumbnailPic
 * @property string $bmiddlePic
 * @property string $originalPic
 * @property string $create_date
 */
class Tweet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tweet the static model class
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
		return 't_tweet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tid, mid, uid, created_at, text, source_name', 'required'),
			array('reposts_count, comments_count', 'numerical', 'integerOnly'=>true),
			array('tid, mid, uid, retid', 'length', 'max'=>20),
			array('text', 'length', 'max'=>256),
			array('source_name', 'length', 'max'=>64),
			array('thumbnailPic, bmiddlePic, originalPic', 'length', 'max'=>512),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tid, mid, uid, retid, created_at, text, source_name, reposts_count, comments_count, thumbnailPic, bmiddlePic, originalPic, create_date', 'safe', 'on'=>'search'),
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
			'tid' => 'Tid',
			'mid' => 'Mid',
			'uid' => 'Uid',
			'retid' => 'Retid',
			'created_at' => 'Created At',
			'text' => 'Text',
			'source_name' => 'Source Name',
			'reposts_count' => 'Reposts Count',
			'comments_count' => 'Comments Count',
			'thumbnailPic' => 'Thumbnail Pic',
			'bmiddlePic' => 'Bmiddle Pic',
			'originalPic' => 'Original Pic',
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
		$criteria->compare('tid',$this->tid,true);
		$criteria->compare('mid',$this->mid,true);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('retid',$this->retid,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('source_name',$this->source_name,true);
		$criteria->compare('reposts_count',$this->reposts_count);
		$criteria->compare('comments_count',$this->comments_count);
		$criteria->compare('thumbnailPic',$this->thumbnailPic,true);
		$criteria->compare('bmiddlePic',$this->bmiddlePic,true);
		$criteria->compare('originalPic',$this->originalPic,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}