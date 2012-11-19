<?php

/**
 * This is the model class for table "t_area".
 *
 * The followings are the available columns in table 't_area':
 * @property integer $id
 * @property string $area
 * @property string $description
 * @property string $create_date
 */
class Area extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Area the static model class
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
		return 't_area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area, description', 'required'),
			array('area', 'length', 'max'=>16),
			array('description', 'length', 'max'=>512),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, area, description, create_date', 'safe', 'on'=>'search'),
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
			'area' => 'Area',
			'description' => 'Description',
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
		$criteria->compare('area',$this->area,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function dropDownArea($area){
		$sql = "select area from t_area";
		$conn=Yii::app()->db;
		$command = $conn->createCommand($sql);
		$datas=$command->queryAll();
		
		$html='<select name="area">';
		for($i=0;$i<count($datas);$i++){
			$d=$datas[$i]['area'];
			if($i==0) $html.='<option value=""></option>';
			
			$c = '';
			if(!empty($area) && $area==$d){
				$c = 'SELECTED';
			}
			$html.='<option '.$c.' value="'.$d.'">'.$d.'</option>';
		}
		$html.='</select>';
		return $html;
	}
}