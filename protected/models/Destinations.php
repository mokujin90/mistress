<?php

/**
 * This is the model class for table "Destinations".
 *
 * The followings are the available columns in table 'Destinations':
 * @property string $id
 * @property string $order_id
 * @property string $name
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
            array('order_id, name, date, type', 'required'),
            array('order_id', 'length', 'max'=>10),
            array('contact_name, contact_phone, time_from, time_to', 'length', 'max'=>255),
            array('number, lat, lng', 'length', 'max'=>100),
            array('type', 'length', 'max'=>5),
            array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, order_id, name, description, contact_name, contact_phone, number, date, time_from, time_to, type, lat, lng', 'safe', 'on'=>'search'),
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
            'name' => 'Name',
            'description' => 'Description',
            'contact_name' => 'Contact Name',
            'contact_phone' => 'Contact Phone',
            'number' => 'Number',
            'date' => 'Date',
            'time_from' => 'Time From',
            'time_to' => 'Time To',
            'type' => 'Type',
            'lat' => 'Lat',
            'lng' => 'Lng',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('order_id', $this->order_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_phone', $this->contact_phone, true);
        $criteria->compare('number', $this->number, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('time_from', $this->time_from, true);
        $criteria->compare('time_to', $this->time_to, true);
        $criteria->compare('type', $this->type, true);

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

    const T_FROM = 'from'; //откуда
    const T_WHERE = 'where'; //куда

    public static function initialize($type)
    {
        $model = new self();
        $model->type = $type;
        return $model;
    }
}
