<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Receipts;

/**
 * ReceiptsSearch represents the model behind the search form of `app\models\Receipts`.
 */
class ReceiptsSearch extends Receipts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'doctor_id', 'patient_id'], 'integer'],
            [['body_deail', 'symptoms', 'diagnosis', 'cilinical_note', 'test_advised', 'special_instruction', 'next_visit', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Receipts::find();

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
            'doctor_id' => $this->doctor_id,
            'patient_id' => $this->patient_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'body_deail', $this->body_deail])
            ->andFilterWhere(['like', 'symptoms', $this->symptoms])
            ->andFilterWhere(['like', 'diagnosis', $this->diagnosis])
            ->andFilterWhere(['like', 'cilinical_note', $this->cilinical_note])
            ->andFilterWhere(['like', 'test_advised', $this->test_advised])
            ->andFilterWhere(['like', 'special_instruction', $this->special_instruction])
            ->andFilterWhere(['like', 'next_visit', $this->next_visit]);

        return $dataProvider;
    }
}
