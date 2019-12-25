<?php

namespace backend\models;

use Yii;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $tender_id
 * @property integer $sum
 *
 * @property Tender $tender
 * @property User $user
 */
class Winners extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'winners';
    }

    public function rules()
    {
        return [
            [['user_id', 'tender_id', 'sum'], 'required'],
            [['user_id', 'tender_id', 'sum'], 'integer'],
            [['tender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tender::className(), 'targetAttribute' => ['tender_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'tender_id' => 'Tender ID',
            'sum' => 'Sum',
        ];
    }

    public function getTender()
    {
        return $this->hasOne(Tender::className(), ['id' => 'tender_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
