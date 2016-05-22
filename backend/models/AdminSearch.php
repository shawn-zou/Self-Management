<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Admin;

/**
 * AdminSearch represents the model behind the search form about `backend\models\Admin`.
 */
class AdminSearch extends Admin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phonenum', 'phone_status', 'email_status', 'is_forbidden'], 'integer'],
            [['admin_name', 'admin_pwd_hash', 'auth_key', 'real_name', 'phone_active_token', 'email', 'email_active_token'], 'safe'],
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
        $query = Admin::find();

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
            'phonenum' => $this->phonenum,
            'phone_status' => $this->phone_status,
            'email_status' => $this->email_status,
            'is_forbidden' => $this->is_forbidden,
        ]);

        $query->andFilterWhere(['like', 'admin_name', $this->admin_name])
            ->andFilterWhere(['like', 'admin_pwd_hash', $this->admin_pwd_hash])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'real_name', $this->real_name])
            ->andFilterWhere(['like', 'phone_active_token', $this->phone_active_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email_active_token', $this->email_active_token]);

        return $dataProvider;
    }
}
