<?php

/**
 * This is the model class for table "Order".
 *
 * The followings are the available columns in table 'Order':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $user_create
 * @property string $user_work
 *
 * The followings are the available model relations:
 * @property Destinations[] $destinations
 * @property User $userWork
 */
class Order extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, type, user_create', 'required'),
            array('type', 'length', 'max' => 7),
            array('user_create, user_work', 'length', 'max' => 10),
            array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, description, type, user_create, user_work', 'safe', 'on' => 'search'),
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
            'destinations' => array(self::HAS_MANY, 'Destinations', 'order_id'),
            'userWork' => array(self::BELONGS_TO, 'User', 'user_work'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'type' => 'Type',
            'user_create' => 'User Create',
            'user_work' => 'User Work',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('user_create', $this->user_create, true);
        $criteria->compare('user_work', $this->user_work, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Order the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    const T_CLIENT = 'client';
    const T_COURIER = 'courier';

    public static function getType($id = null)
    {
        $dictionary = array(
            self::T_CLIENT => 'Найти курьера',
            self::T_COURIER => 'Готов передать посылку',
        );
        return Candy::returnDictionaryValue($dictionary, $id);
    }
}
