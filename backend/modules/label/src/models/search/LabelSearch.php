<?php

namespace milkyway\label\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use milkyway\label\models\Label;

/**
 * LabelSearch represents the model behind the search form of `milkyway\label\models\Label`.
 */
class LabelSearch extends Label
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'text'], 'safe'],
            [['language_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Label::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'language_id' => $this->language_id,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
