<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Winners;

class WinnersSearch extends Winners
{
   public function rules()
    {
        return [
            [['id', 'user_id', 'tender_id', 'sum'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Winners::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'tender_id' => $this->tender_id,
            'sum' => $this->sum,
        ]);

        return $dataProvider;
    }
}
