<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Stylesheets as StylesheetsModel;

/**
 * Stylesheets represents the model behind the search form about `app\models\Stylesheets`.
 */
class Stylesheets extends StylesheetsModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'full_name_contact_tag', 'full_name_contact_style', 'short_name_contact_tag', 'short_name_contact_style', 'medium_name_contact_tag', 'medium_name_contact_style', 'profession_flavor_tag', 'profession_flavor_style', 'contact_additional_tag', 'contact_additional_style', 'icon_phone_contact_style', 'icon_dni_contact_style', 'icon_birth_contact_style', 'icon_email_contact_style', 'icon_address_contact_style', 'icon_location_contact_style', 'icon_phone_additional_style', 'icon_github_additional_style', 'icon_gitlab_additional_style', 'icon_bitbucket_additional_style', 'icon_linkedIn_additional_style', 'icon_twitter_additional_style', 'icon_codePen_additional_style', 'icon_pinterest_additional_style', 'icon_other_additional_style', 'icon_personal_web_additional_style', 'icon_description_additional_style', 'experience_tag', 'experience_style', 'icon_experience_style', 'academic_tag', 'academic_style', 'icon_academic_style', 'technology_tag', 'technology_style', 'icon_technology_style', 'svg_technology_style', 'hobby_tag', 'hobby_style', 'icon_hobby_style', 'svg_hobby_style', 'skill_tag', 'skill_style', 'icon_skill_style', 'svg_skill_style', 'lenguage_tag', 'lenguage_style', 'icon_lenguage_style', 'svg_languages_style', 'attitude_tag', 'attitude_style', 'icon_attitude_style', 'svg_attitude_style', 'background_first', 'background_second', 'background_third'], 'safe'],
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
        $query = StylesheetsModel::find();

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
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'full_name_contact_tag', $this->full_name_contact_tag])
            ->andFilterWhere(['like', 'full_name_contact_style', $this->full_name_contact_style])
            ->andFilterWhere(['like', 'short_name_contact_tag', $this->short_name_contact_tag])
            ->andFilterWhere(['like', 'short_name_contact_style', $this->short_name_contact_style])
            ->andFilterWhere(['like', 'medium_name_contact_tag', $this->medium_name_contact_tag])
            ->andFilterWhere(['like', 'medium_name_contact_style', $this->medium_name_contact_style])
            ->andFilterWhere(['like', 'profession_flavor_tag', $this->profession_flavor_tag])
            ->andFilterWhere(['like', 'profession_flavor_style', $this->profession_flavor_style])
            ->andFilterWhere(['like', 'contact_additional_tag', $this->contact_additional_tag])
            ->andFilterWhere(['like', 'contact_additional_style', $this->contact_additional_style])
            ->andFilterWhere(['like', 'icon_phone_contact_style', $this->icon_phone_contact_style])
            ->andFilterWhere(['like', 'icon_dni_contact_style', $this->icon_dni_contact_style])
            ->andFilterWhere(['like', 'icon_birth_contact_style', $this->icon_birth_contact_style])
            ->andFilterWhere(['like', 'icon_email_contact_style', $this->icon_email_contact_style])
            ->andFilterWhere(['like', 'icon_address_contact_style', $this->icon_address_contact_style])
            ->andFilterWhere(['like', 'icon_location_contact_style', $this->icon_location_contact_style])
            ->andFilterWhere(['like', 'icon_phone_additional_style', $this->icon_phone_additional_style])
            ->andFilterWhere(['like', 'icon_github_additional_style', $this->icon_github_additional_style])
            ->andFilterWhere(['like', 'icon_gitlab_additional_style', $this->icon_gitlab_additional_style])
            ->andFilterWhere(['like', 'icon_bitbucket_additional_style', $this->icon_bitbucket_additional_style])
            ->andFilterWhere(['like', 'icon_linkedIn_additional_style', $this->icon_linkedIn_additional_style])
            ->andFilterWhere(['like', 'icon_twitter_additional_style', $this->icon_twitter_additional_style])
            ->andFilterWhere(['like', 'icon_codePen_additional_style', $this->icon_codePen_additional_style])
            ->andFilterWhere(['like', 'icon_pinterest_additional_style', $this->icon_pinterest_additional_style])
            ->andFilterWhere(['like', 'icon_other_additional_style', $this->icon_other_additional_style])
            ->andFilterWhere(['like', 'icon_personal_web_additional_style', $this->icon_personal_web_additional_style])
            ->andFilterWhere(['like', 'icon_description_additional_style', $this->icon_description_additional_style])
            ->andFilterWhere(['like', 'experience_tag', $this->experience_tag])
            ->andFilterWhere(['like', 'experience_style', $this->experience_style])
            ->andFilterWhere(['like', 'icon_experience_style', $this->icon_experience_style])
            ->andFilterWhere(['like', 'academic_tag', $this->academic_tag])
            ->andFilterWhere(['like', 'academic_style', $this->academic_style])
            ->andFilterWhere(['like', 'icon_academic_style', $this->icon_academic_style])
            ->andFilterWhere(['like', 'technology_tag', $this->technology_tag])
            ->andFilterWhere(['like', 'technology_style', $this->technology_style])
            ->andFilterWhere(['like', 'icon_technology_style', $this->icon_technology_style])
            ->andFilterWhere(['like', 'svg_technology_style', $this->svg_technology_style])
            ->andFilterWhere(['like', 'hobby_tag', $this->hobby_tag])
            ->andFilterWhere(['like', 'hobby_style', $this->hobby_style])
            ->andFilterWhere(['like', 'icon_hobby_style', $this->icon_hobby_style])
            ->andFilterWhere(['like', 'svg_hobby_style', $this->svg_hobby_style])
            ->andFilterWhere(['like', 'skill_tag', $this->skill_tag])
            ->andFilterWhere(['like', 'skill_style', $this->skill_style])
            ->andFilterWhere(['like', 'icon_skill_style', $this->icon_skill_style])
            ->andFilterWhere(['like', 'svg_skill_style', $this->svg_skill_style])
            ->andFilterWhere(['like', 'lenguage_tag', $this->lenguage_tag])
            ->andFilterWhere(['like', 'lenguage_style', $this->lenguage_style])
            ->andFilterWhere(['like', 'icon_lenguage_style', $this->icon_lenguage_style])
            ->andFilterWhere(['like', 'svg_languages_style', $this->svg_languages_style])
            ->andFilterWhere(['like', 'attitude_tag', $this->attitude_tag])
            ->andFilterWhere(['like', 'attitude_style', $this->attitude_style])
            ->andFilterWhere(['like', 'icon_attitude_style', $this->icon_attitude_style])
            ->andFilterWhere(['like', 'svg_attitude_style', $this->svg_attitude_style])
            ->andFilterWhere(['like', 'background_first', $this->background_first])
            ->andFilterWhere(['like', 'background_second', $this->background_second])
            ->andFilterWhere(['like', 'background_third', $this->background_third]);

        return $dataProvider;
    }
}
