<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property string $id
 * @property string $login
 * @property string $password_hash
 * @property string $email
 * @property string $name
 * @property string $last_name
 * @property string $phone
 * @property integer $is_active
 * @property integer $phone_approved
 * @property integer $email_approved
 * @property string $level_id
 *
 * The followings are the available model relations:
 * @property Level $level
 */
class User extends ActiveRecord
{
    public $password_repeat;
    public $password;
    public $old_password;

    const DEF_LEVEL = 1;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'User';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('login, email', 'required'),
            array('is_active, phone_approved, email_approved', 'numerical', 'integerOnly' => true),
            array('login, email, phone', 'length', 'max' => 255),
            array('level_id', 'length', 'max' => 10),
            array('name, last_name', 'safe'),
            array('password_hash, is_active, phone_approved,email_approved,level_id', 'unsafe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, login, password_hash, email, name, last_name, phone, is_active, phone_approved, email_approved, level_id', 'safe', 'on' => 'search'),

            array('password_repeat', 'compare', 'compareAttribute' => 'password', 'on' => 'signup,changePassword'),
            array('password_repeat,password', 'required', 'on' => 'signup,changePassword'),
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
            'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
        );
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'login' => 'Логин',
            'password_hash' => 'Password Hash',
            'email' => 'E-mail',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'phone' => 'Телефон',
            'is_active' => 'Is Active',
            'phone_approved' => 'Phone Approved',
            'email_approved' => 'Email Approved',
            'level_id' => 'Level',
            'password_repeat' => Yii::t('main', 'Пароль повторно'),
            'password' => Yii::t('main', 'Пароль'),
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
        $criteria->compare('login', $this->login, true);
        $criteria->compare('password_hash', $this->password_hash, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('is_active', $this->is_active);
        $criteria->compare('phone_approved', $this->phone_approved);
        $criteria->compare('email_approved', $this->email_approved);
        $criteria->compare('level_id', $this->level_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function scopes()
    {
        return array(
            'active' => array(
                'condition' => 't.is_active = 1', #активные-живые пользователи
            ),
        );
    }

    /**
     * Войти в систеы под выбранным пользователем
     */
    public function autologin()
    {
        $identity = new UserIdentity($this->login, $this->password);
        $identity->authenticate();

        if ($identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = 3600 * 24 * 30; // 30 days
            Yii::app()->user->login($identity, $duration);
            Yii::app()->user->setState('__id', $this->id);
        }
    }

    public function hash()
    {
        return parent::hash();
    }
}
