<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Academic;

/**
 * AcademicSearch represents the model behind the search form about `app\models\Academic`.
 */
class AcademicSearch extends Academic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'duration', 'from', 'to', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['institute_name', 'titration', 'reason', 'place'], 'safe'],
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
        $query = Academic::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'duration' => $this->duration,
            'from' => $this->from,
            'to' => $this->to,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'institute_name', $this->institute_name])
            ->andFilterWhere(['like', 'titration', $this->titration])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'place', $this->place]);

        return $dataProvider;
    }
}
