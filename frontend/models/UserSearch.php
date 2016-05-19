<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;

/**
 * UserSearch represents the model behind the search form about `frontend\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_email_status', 'user_phonenum', 'user_phone_activate_token', 'user_phone_status', 'is_status', 'user_sex', 'user_emotional_state', 'user_birthday', 'user_blood_type', 'user_qq', 'create_time', 'update_time', 'login_time', 'is_delete', 'is_forbidden'], 'integer'],
            [['user_name', 'user_pwd', 'salt', 'user_pwd_hash', 'user_pwd_reset_token', 'auth_key', 'user_email', 'user_email_activate_token', 'user_nickname', 'user_realname', 'user_location', 'user_introduction', 'user_img', 'login_ip', 'user_education_id', 'user_job_id', 'user_tag_id', 'user_shipping_address'], 'safe'],
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
        $query = User::find();

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
            'user_email_status' => $this->user_email_status,
            'user_phonenum' => $this->user_phonenum,
            'user_phone_activate_token' => $this->user_phone_activate_token,
            'user_phone_status' => $this->user_phone_status,
            'is_status' => $this->is_status,
            'user_sex' => $this->user_sex,
            'user_emotional_state' => $this->user_emotional_state,
            'user_birthday' => $this->user_birthday,
            'user_blood_type' => $this->user_blood_type,
            'user_qq' => $this->user_qq,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'login_time' => $this->login_time,
            'is_delete' => $this->is_delete,
            'is_forbidden' => $this->is_forbidden,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'user_pwd', $this->user_pwd])
            ->andFilterWhere(['like', 'salt', $this->salt])
            ->andFilterWhere(['like', 'user_pwd_hash', $this->user_pwd_hash])
            ->andFilterWhere(['like', 'user_pwd_reset_token', $this->user_pwd_reset_token])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'user_email_activate_token', $this->user_email_activate_token])
            ->andFilterWhere(['like', 'user_nickname', $this->user_nickname])
            ->andFilterWhere(['like', 'user_realname', $this->user_realname])
            ->andFilterWhere(['like', 'user_location', $this->user_location])
            ->andFilterWhere(['like', 'user_introduction', $this->user_introduction])
            ->andFilterWhere(['like', 'user_img', $this->user_img])
            ->andFilterWhere(['like', 'login_ip', $this->login_ip])
            ->andFilterWhere(['like', 'user_education_id', $this->user_education_id])
            ->andFilterWhere(['like', 'user_job_id', $this->user_job_id])
            ->andFilterWhere(['like', 'user_tag_id', $this->user_tag_id])
            ->andFilterWhere(['like', 'user_shipping_address', $this->user_shipping_address]);

        return $dataProvider;
    }
}
