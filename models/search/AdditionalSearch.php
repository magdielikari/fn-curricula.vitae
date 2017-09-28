<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Additional;

/**
 * AdditionalSearch represents the model behind the search form about `app\models\Additional`.
 */
class AdditionalSearch extends Additional
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phone', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'github', 'gitlab', 'bitbucket', 'linkedIn', 'twitter', 'codePen', 'pinterest', 'other', 'personal_web', 'description'], 'safe'],
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
        $query = Additional::find();

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
            'phone' => $this->phone,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'github', $this->github])
            ->andFilterWhere(['like', 'gitlab', $this->gitlab])
            ->andFilterWhere(['like', 'bitbucket', $this->bitbucket])
            ->andFilterWhere(['like', 'linkedIn', $this->linkedIn])
            ->andFilterWhere(['like', 'twitter', $this->twitter])
            ->andFilterWhere(['like', 'codePen', $this->codePen])
            ->andFilterWhere(['like', 'pinterest', $this->pinterest])
            ->andFilterWhere(['like', 'other', $this->other])
            ->andFilterWhere(['like', 'personal_web', $this->personal_web])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
