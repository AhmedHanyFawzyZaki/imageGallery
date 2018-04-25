<?php

/**
 * This is the model class for table "image_option".
 *
 * The followings are the available columns in table 'image_option':
 * @property integer $id
 * @property integer $image_id
 * @property integer $user_id
 * @property integer $type
 * @property string $title
 * @property string $alt_text
 * @property integer $action_performed
 * @property string $url
 * @property string $border_color
 * @property string $border_width
 * @property string $border_radius
 * @property string $shadow
 * @property string $border
 */
class ImageOption extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ImageOption the static model class
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
		return '{{image_option}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image_id, user_id, type, action_performed', 'numerical', 'integerOnly'=>true),
			array('title, alt_text, url, border_color, border_width, border_radius, shadow, border', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image_id, user_id, type, title, alt_text, action_performed, url, border_color, border_width, border_radius, shadow, border', 'safe', 'on'=>'search'),
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
			'image_id' => 'Image',
			'user_id' => 'User',
			'type' => 'Type',
			'title' => 'Title',
			'alt_text' => 'Alt Text',
			'action_performed' => 'Action Performed',
			'url' => 'Url',
			'border_color' => 'Border Color',
			'border_width' => 'Border Width',
			'border_radius' => 'Border Radius',
			'shadow' => 'Shadow',
			'border' => 'Border',
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
		$criteria->compare('image_id',$this->image_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alt_text',$this->alt_text,true);
		$criteria->compare('action_performed',$this->action_performed);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('border_color',$this->border_color,true);
		$criteria->compare('border_width',$this->border_width,true);
		$criteria->compare('border_radius',$this->border_radius,true);
		$criteria->compare('shadow',$this->shadow,true);
		$criteria->compare('border',$this->border,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}