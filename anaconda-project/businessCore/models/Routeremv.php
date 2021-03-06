<?php

/**
 * This is the model class for table "routeremv".
 *
 * The followings are the available columns in table 'routeremv':
 * @property integer $id
 * @property integer $idProduct
 * @property string $compteEMV
 * @property string $type
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Product $idProduct0
 *
 * @package Models.Campaign
 */
class Routeremv extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Routeremv the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function rawTableName()
	{
		return 'routeremv';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProduct', 'required'),
			array('idProduct', 'numerical', 'integerOnly'=>true),
			array('compteEMV, type', 'length', 'max'=>24),
			array('url', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idProduct, compteEMV, type, url', 'safe', 'on'=>'search'),
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
			'Product' => array(self::BELONGS_TO, 'Product', 'idProduct'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idProduct' => 'Id Product',
			'compteEMV' => 'Compte Emv',
			'type' => 'Type',
			'url' => 'Url',
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
		$criteria->compare('idProduct',$this->idProduct);
		$criteria->compare('compteEMV',$this->compteEMV,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}