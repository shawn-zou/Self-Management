<?php
namespace backend\models;

use Yii;
use backend\models\Base;
use yii\web\IdentityInterface;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月21日
 * 管理员操作类
 * 
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $id
 * @property string $admin_name
 * @property string $admin_pwd_hash
 * @property string $auth_key
 * @property string $real_name
 * @property integer $phonenum
 * @property string $phone_active_token
 * @property integer $phone_status
 * @property string $email
 * @property string $email_active_token
 * @property integer $email_status
 * @property integer $is_forbidden
 */
class Admin extends Base implements IdentityInterface
{
	//可用状态
	const IS_FORBIDDEN = 0;

	/**
	 * 返回表名
	 */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * 字段验证规则
     */
    public function rules()
    {
        return [
            [['admin_name', 'admin_pwd_hash', 'is_forbidden'], 'required'],
            [['phonenum', 'phone_status', 'email_status', 'is_forbidden'], 'integer'],
            [['admin_name', 'email'], 'string', 'max' => 50],
            [['admin_pwd_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['real_name'], 'string', 'max' => 15],
            [['phone_active_token', 'email_active_token'], 'string', 'max' => 30],
        ];
    }

    /**
     * 属性标签
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('lang', '管理员编号'),
            'admin_name' => Yii::t('lang', '管理员账号'),
            'admin_pwd_hash' => Yii::t('lang', '管理员密码hash'),
            'auth_key' => Yii::t('lang', '自动登录验证'),
            'real_name' => Yii::t('lang', '管理员真实姓名'),
            'phonenum' => Yii::t('lang', '管理员手机号'),
            'phone_active_token' => Yii::t('lang', '手机激活码'),
            'phone_status' => Yii::t('lang', '手机认证状态;0:未认证;1:认证;'),
            'email' => Yii::t('lang', '管理员邮箱'),
            'email_active_token' => Yii::t('lang', '邮箱激活码'),
            'email_status' => Yii::t('lang', '邮箱认证状态;0:未认证;1:认证;'),
            'is_forbidden' => Yii::t('lang', '是否被禁用;0:未禁用;1:禁用;'),
        ];
    }

    /**
     * 通过登录名寻找数据对象
     * @param string $admin_name
     * @return \backend\models\Admin|NULL
     */
    public static function findByAdminname($admin_name)
    {
    	return static::findOne([
    		'admin_name' => $admin_name,
    		'is_forbidden' => self::IS_FORBIDDEN]
    		);
    }

    /**
     * 生成新的密码hash
     * @param string $password
     */
    public function setPassword($password)
    {
    	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * 对输入密码进行加密，再对比数据对象里的admin_pwd_hash
     * @param string $password
     * @return boolean
     */
    public function validatePassword($password)
    {
    	return Yii::$app->security->validatePassword($password, $this->admin_pwd_hash);
    }

    /**
     * 主动登录以后生成cookie时需要
     * @see \yii\web\IdentityInterface::getId()
     */
    public function getId()
    {
    	return $this->getPrimaryKey();
    }

    /**
     * 主动登录以后生成cookie时需要
     * @see \yii\web\IdentityInterface::getAuthKey()
     */
    public function getAuthKey()
    {
    	return $this->auth_key;
    }

    /**
     * 对比auth_key
     * @see \yii\web\User loginByCookie()
     * @see \yii\web\IdentityInterface::validateAuthKey()
     */
    public function validateAuthKey($authKey)
    {
    	return $this->getAuthKey() === $authKey;
    }

    /**
     * 新增后台管理员和修改密码时使用，重新生成auth_key
     */
    public function generateAuthKey()
    {
    	$this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * 从 \backend\controllers\SiteController login() Yii::$app->user->isGuest开始，
     * 到@see \yii\web\User renewAuthStatus()
     * 先检查session会话是否存在，存在的话，直接用session里的id来查询、更新数据
     */
    public static function findIdentity($id)
    {
    	return static::findOne([
    		'id' => $id,
    		'is_forbidden' => self::IS_FORBIDDEN
    	]);
    }

    //系统原有的方法，集成过来改造
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    public static function findByPasswordResetToken($token)
    {
    	if (!static::isPasswordResetTokenValid($token)) {
    		return null;
    	}
    
    	return static::findOne([
    		'password_reset_token' => $token,
    		'status' => self::STATUS_ACTIVE,
    	]);
    }
    public static function isPasswordResetTokenValid($token)
    {
    	if (empty($token)) {
    		return false;
    	}
    
    	$timestamp = (int) substr($token, strrpos($token, '_') + 1);
    	$expire = Yii::$app->params['user.passwordResetTokenExpire'];
    	return $timestamp + $expire >= time();
    }
    public function generatePasswordResetToken()
    {
    	$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    public function removePasswordResetToken()
    {
    	$this->password_reset_token = null;
    }
}