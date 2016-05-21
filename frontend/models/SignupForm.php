<?php
namespace frontend\models;

use yii\base\Model;
use frontend\models\User;

/**
 * @author shawn-zou <1579627187@qq.com> 2016年5月18日
 */
class SignupForm extends Model
{
    public $user_name;            //用户名
    public $user_email;               //用户邮箱
    public $user_pwd;            //用户密码
    public $pwd_confirm;    //用户密码确认
    public $verifyCode;          //验证码

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            ['user_name', 'filter', 'filter' => 'trim'],
            ['user_name', 'required'],
            ['user_name', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '该帐户名已被使用！'],
            ['user_name', 'string', 'min' => 2, 'max' => 30],

            ['user_email', 'filter', 'filter' => 'trim'],
            ['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'string', 'max' => 255],
            ['user_email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '该邮箱已被使用！'],

            [['user_pwd', 'pwd_confirm'], 'required'],
            [['user_pwd', 'pwd_confirm'], 'string', 'min' => 6, 'max' => 16],
        	[['user_pwd', 'pwd_confirm'], 'compare', 'compareAttribute' => 'user_pwd'],

            //验证码必须正确输入
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * 设置属性标签
     * @see \yii\base\Model::attributeLabels()
     */
    public function attributeLabels()
    {
        return [
            'user_name' => '帐户名',
            'user_email' => '邮箱',
            'user_pwd' => '密码',
            'pwd_confirm' => '确认密码',
            'verifyCode' => '验证码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->user_name = $this->user_name;
        $user->user_email = $this->user_email;
        $user->setPassword($this->user_pwd);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}