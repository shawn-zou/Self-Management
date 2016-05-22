<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\User;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月22日
 * 后台登录类
 */
class LoginForm extends Model
{
    public $admin_name;
    public $password;
    public $rememberMe = true;

    private $_admin;

    /**
     * 字段验证规则
     * @see \yii\base\Model::rules()
     */
    public function rules()
    {
        return [
            [['admin_name', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * 属性标签
     * @see \yii\base\Model::attributeLabels()
     */
    public function attributeLabels()
    {
    	return [
    		'admin_name' => Yii::t('lang', '登录名'),
            'password' => Yii::t('lang', '密码'),
    		'rememberMe' => Yii::t('lang', '记住我'),
    	];
    }

    /**
     * rules调用的
     * 先通过登录名查找数据对象，再对比密码hash，任何一个不匹配就报错
     * @param string $attribute
     * @param unknown $params
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors())
        {
            $admin = $this->getAdmin();
            if (!$admin || !$admin->validatePassword($this->password))
            {
                $this->addError($attribute, Yii::t('lang', '账号或密码错误'));
            }
        }
    }

    /**
     * 通过查询到的对应数据对象登录，登录成功会改变状态
     * @see yii\web\User login()
     * @return boolean
     */
    public function login()
    {
        if ($this->validate())
        {
            return Yii::$app->user->login($this->getAdmin(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        else
        {
            return false;
        }
    }

    /**
     * 通过[admin_name]，调用Admin::findByAdminname查找数据对象
     * @return \backend\models\Admin|NULL
     */
    protected function getAdmin()
    {
        if ($this->_admin === null)
        {
            $this->_admin = Admin::findByAdminname($this->admin_name);
        }

        return $this->_admin;
    }
}