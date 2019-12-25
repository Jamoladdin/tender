<?php

namespace backend\models;

use Yii;

/**
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $date
 *
 * @property Winners[] $winners
 */
class Tender extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tender';
    }

    public function rules()
    {
        return [
            [['name', 'text', 'date'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }

    public function getWinners()
    {
        return $this->hasOne(Winners::className(), ['tender_id' => 'id'])->orderBy(['sum' => SORT_DESC]);
    }
}
