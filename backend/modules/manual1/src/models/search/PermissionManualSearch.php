<?php

namespace milkyway\manual\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use milkyway\manual\models\PermissionManual;

/**
 * PermissionManualSearch represents the model behind the search form of `milkyway\manual\models\PermissionManual`.
 */
class PermissionManualSearch extends PermissionManual
{
    /**
     * @return array[]
     */
    public function rules()
    {
        return [
            [['id', 'parent', 'sort', 'created_at', 'created_by', 'updated_at', 'updated_by', 'level'], 'integer'],
            [['title', 'for_permission', 'status', 'alias'], 'safe'],
        ];
    }

    /**
     * @return array|array[]
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
        $query = PermissionManual::find();

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
            'parent' => $this->parent,
            'sort' => $this->sort,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'for_permission', $this->for_permission])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'alias', $this->alias]);

        return $dataProvider;
    }
}
