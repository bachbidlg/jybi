<?php

namespace milkyway\news\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use milkyway\news\models\NewsCategory;

/**
 * NewsCategorySearch represents the model behind the search form of `milkyway\news\models\NewsCategoryQuery`.
 */
class NewsCategorySearch extends NewsCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['slug', 'image', 'status', 'alias'], 'safe'],
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
        $query = NewsCategory::find()->where([self::tableName().'.type' => $this->type]);

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
            'id' => $this->id,
            'category' => $this->category,
            'sort' => $this->sort,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'alias', $this->alias]);

        return $dataProvider;
    }
}
