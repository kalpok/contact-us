<?php

namespace modules\contactus\backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modules\contactus\backend\models\Contactus;

/**
 * ContactusSearch represents the model behind the search form about `modules\contactus\backend\models\Contactus`.
 */
class ContactusSearch extends Contactus
{
    public function attributes()
    {
        return array_merge(parent::attributes(), ['department.title']);
    }

    public function rules()
    {
        return [
            [['departmentId'], 'integer'],
            [['language', 'name', 'email', 'phone', 'subject', 'department.title'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Contactus::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'departmentId' => $this->departmentId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'message', $this->message]);
        $query->joinWith('department AS department');
        $query->andFilterWhere(
            ['like', 'department.title', $this->getAttribute('department.title')]
        );

        return $dataProvider;
    }
}
