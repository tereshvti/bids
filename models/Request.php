<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $urgency
 * @property string $description
 * @property string $tel
 *
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'description', 'tel'], 'required'],
            [['userid', 'urgency'], 'integer'],
            [['tel'], 'string', 'max' => 55],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'urgency' => 'Urgency',
            'description' => 'Description',
            'tel' => 'Telephone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid'])->inverseOf('requests');
    }
}
