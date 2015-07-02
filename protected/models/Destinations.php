<?php

/**
 * This is the model class for table "Destinations".
 *
 * The followings are the available columns in table 'Destinations':
 * @property string $id
 * @property string $order_id
 * @property string $pos_country
 * @property string $pos_region
 * @property string $pos_city
 * @property string $pos_address
 * @property string $description
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $number
 * @property string $date
 * @property string $time_from
 * @property string $time_to
 * @property string $type
 * @property string $lat
 * @property string $lng
 *
 * The followings are the available model relations:
 * @property Order $order
 */
class Destinations extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Destinations';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('order_id, pos_country, date, type', 'required'),
            array('order_id', 'length', 'max' => 10),
            array('pos_country, pos_region, pos_city, contact_name, contact_phone, time_from, time_to', 'length', 'max' => 255),
            array('number, lat, lng', 'length', 'max' => 100),
            array('type', 'length', 'max' => 5),
            array('pos_address, description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, order_id, pos_country, pos_region, pos_city, pos_address, description, contact_name, contact_phone, number, date, time_from, time_to, type, lat, lng', 'safe', 'on' => 'search'),
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
            'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'order_id' => 'Order',
            'pos_country' => 'Страна',
            'pos_region' => 'Регион',
            'pos_city' => 'Город',
            'pos_address' => 'Адрес',
            'description' => 'Описание',
            'contact_name' => 'Контактное лицо',
            'contact_phone' => 'Контактный телефон',
            'number' => 'Номер',
            'date' => 'Дата',
            'time_from' => 'С',
            'time_to' => 'По',
            'type' => 'Тип',
            'lat' => 'Lat',
            'lng' => 'Lng',
        );
    }


    /**
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('order_id', $this->order_id, true);
        $criteria->compare('pos_country', $this->pos_country, true);
        $criteria->compare('pos_region', $this->pos_region, true);
        $criteria->compare('pos_city', $this->pos_city, true);
        $criteria->compare('pos_address', $this->pos_address, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_phone', $this->contact_phone, true);
        $criteria->compare('number', $this->number, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('time_from', $this->time_from, true);
        $criteria->compare('time_to', $this->time_to, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('lat', $this->lat, true);
        $criteria->compare('lng', $this->lng, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Destinations the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public $name = '';
    const T_FROM = 'from'; //откуда
    const T_WHERE = 'where'; //куда

    public static function initialize($type)
    {
        $model = new self();
        $model->type = $type;
        return $model;
    }

    public function getName()
    {
        $position = array();
        if(!empty($this->pos_region))
            $position[] = $this->pos_region;
        if(!empty($this->pos_city))
            $position[] = $this->pos_region;
        if(!empty($this->pos_address))
            $position[] = $this->pos_address;
        return implode(' ',$position);
    }
}
