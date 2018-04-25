<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property integer $id
 * @property string $slider_banner_image_width
 * @property string $slider_banner_image_height
 * @property string $logo_image_width
 * @property string $logo_image_height
 * @property string $inner_page_image_width
 * @property string $inner_page_image_height
 * @property string $testimonial_image_width
 * @property string $testimonial_image_height
 */
class Settings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{settings}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slider_banner_image_width, slider_banner_image_height, logo_image_width, logo_image_height, inner_page_image_width, inner_page_image_height, testimonial_image_width, testimonial_image_height, border_max_width, border_max_radius', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, slider_banner_image_width, slider_banner_image_height, logo_image_width, logo_image_height, inner_page_image_width, inner_page_image_height, testimonial_image_width, testimonial_image_height', 'safe', 'on'=>'search'),
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
			'slider_banner_image_width' => 'Slider Banner Image Width',
			'slider_banner_image_height' => 'Slider Banner Image Height',
			'logo_image_width' => 'Logo Image Width',
			'logo_image_height' => 'Logo Image Height',
			'inner_page_image_width' => 'Inner Page Image Width',
			'inner_page_image_height' => 'Inner Page Image Height',
			'testimonial_image_width' => 'Testimonial Image Width',
			'testimonial_image_height' => 'Testimonial Image Height',
                        'border_max_width'=>'Border Max Width',
                        'border_max_radius'=>'Border Max Radius'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('slider_banner_image_width',$this->slider_banner_image_width,true);
		$criteria->compare('slider_banner_image_height',$this->slider_banner_image_height,true);
		$criteria->compare('logo_image_width',$this->logo_image_width,true);
		$criteria->compare('logo_image_height',$this->logo_image_height,true);
		$criteria->compare('inner_page_image_width',$this->inner_page_image_width,true);
		$criteria->compare('inner_page_image_height',$this->inner_page_image_height,true);
		$criteria->compare('testimonial_image_width',$this->testimonial_image_width,true);
		$criteria->compare('testimonial_image_height',$this->testimonial_image_height,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Settings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
