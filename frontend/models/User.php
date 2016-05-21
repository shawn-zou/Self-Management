<?php
namespace frontend\models;

use Yii;
use frontend\models\Base;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月19日
 * 
 * This is the model class for table "{{%user}}".
 *
 * @property string $id
 * @property string $user_name
 * @property string $user_pwd
 * @property string $salt
 * @property string $user_pwd_hash
 * @property string $user_pwd_reset_token
 * @property string $auth_key
 * @property string $user_email
 * @property string $user_email_activate_token
 * @property string $user_email_status
 * @property integer $user_phonenum
 * @property string $user_phone_activate_token
 * @property string $user_phone_status
 * @property string $is_status
 * @property string $user_nickname
 * @property string $user_realname
 * @property string $user_sex
 * @property string $user_location
 * @property string $user_emotional_state
 * @property integer $user_birthday
 * @property string $user_blood_type
 * @property string $user_introduction
 * @property integer $user_qq
 * @property string $user_img
 * @property integer $create_time
 * @property integer $update_time
 * @property string $login_ip
 * @property integer $login_time
 * @property string $is_delete
 * @property string $is_forbidden
 * @property string $user_education_id
 * @property string $user_job_id
 * @property string $user_tag_id
 * @property string $user_shipping_address
 */
class User extends Base implements IdentityInterface
{
	//用户处于激活状态
	const IS_STATUS = 1;

	//用户未注销账户状态
	const IS_DELETE = 0;

	//用户未被管理员禁用状态
	const IS_FORBIDDEN = 0;

    /**
     * 返回表名
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * 字段规则
     */
    public function rules()
    {
        return [
            [['user_name', 'user_pwd_hash', 'auth_key', 'create_time', 'update_time', 'is_forbidden'], 'required'],
            [['user_email_status', 'user_phonenum', 'user_phone_activate_token', 'user_phone_status', 'is_status', 'user_sex', 'user_emotional_state', 'user_birthday', 'user_blood_type', 'user_qq', 'create_time', 'update_time', 'login_time', 'is_delete', 'is_forbidden'], 'integer'],
            [['user_introduction', 'user_education_id', 'user_job_id'], 'string'],
            [['user_name', 'user_nickname'], 'string', 'max' => 30],
            [['user_pwd'], 'string', 'max' => 16],
            [['salt'], 'string', 'max' => 4],
            [['user_pwd_hash'], 'string', 'max' => 60],
            [['user_pwd_reset_token'], 'string', 'max' => 50],
            [['auth_key'], 'string', 'max' => 32],
            [['user_email', 'user_email_activate_token', 'user_location', 'user_img', 'user_tag_id', 'user_shipping_address'], 'string', 'max' => 255],
            [['user_realname'], 'string', 'max' => 15],
            [['login_ip'], 'string', 'max' => 20],
        ];
    }

    /**
     * 属性标签
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('lang', '用户id'),
            'user_name' => Yii::t('lang', '用户登录名'),
            'user_pwd' => Yii::t('lang', '用户密码，文档显示只读，在此暂留作明文密码调试'),
            'salt' => Yii::t('lang', '注册和修改密码时加密后缀,md5(user_pwd,salt)生成user_pwd_hash'),
            'user_pwd_hash' => Yii::t('lang', '用户密码hash'),
            'user_pwd_reset_token' => Yii::t('lang', '密码重置token'),
            'auth_key' => Yii::t('lang', '用于自动登录验证'),
            'user_email' => Yii::t('lang', '用户邮箱'),
            'user_email_activate_token' => Yii::t('lang', '邮箱激活需要的token'),
            'user_email_status' => Yii::t('lang', '邮箱激活状态，可能会用于激活账号；0:未激活;1:激活;'),
            'user_phonenum' => Yii::t('lang', '用户手机号'),
            'user_phone_activate_token' => Yii::t('lang', '手机激活码'),
            'user_phone_status' => Yii::t('lang', '手机激活状态;0:未激活;1:激活'),
            'is_status' => Yii::t('lang', '用户状态，需激活；0:未激活;1:激活;'),
            'user_nickname' => Yii::t('lang', '用户昵称'),
            'user_realname' => Yii::t('lang', '用户真实姓名'),
            'user_sex' => Yii::t('lang', '性别外键；对应一张性别表user_sex，后台可以增加个系统管理来管理，模仿facebook'),
            'user_location' => Yii::t('lang', '用户所在地，准备用json格式'),
            'user_emotional_state' => Yii::t('lang', '感情状况；待定表名user_emotional_state'),
            'user_birthday' => Yii::t('lang', '用户生日'),
            'user_blood_type' => Yii::t('lang', '1:A;2:B;3:AB;4:O;'),
            'user_introduction' => Yii::t('lang', '用户简介'),
            'user_qq' => Yii::t('lang', '用户qq'),
            'user_img' => Yii::t('lang', '用户头像，会有注册时默认设置的'),
            'create_time' => Yii::t('lang', '用户注册时间'),
            'update_time' => Yii::t('lang', '用户上次修改资料时间'),
            'login_ip' => Yii::t('lang', '上次登录ip'),
            'login_time' => Yii::t('lang', '上次登录时间'),
            'is_delete' => Yii::t('lang', '用户是否注销；0:未注销;1:注销;'),
            'is_forbidden' => Yii::t('lang', '是否被管理员禁用;0:未禁用;1:禁用;'),
            'user_education_id' => Yii::t('lang', '暂定user_education表中，自己教育信息的id的json，查询比较快'),
            'user_job_id' => Yii::t('lang', '暂定user_job中个人职业信息id的json，查询比较快'),
            'user_tag_id' => Yii::t('lang', '暂定user_tags中个人标签id的json，查询比较快，上限数量暂定5个'),
            'user_shipping_address' => Yii::t('lang', '暂定user_shipping_address表中个人收货地址的id的json，查询比较快'),
        ];
    }

    /**
     * 行为
     */
    public function behaviors()
    {
    	return ArrayHelper::merge(parent::behaviors(), [
    		'TimestampBehavior' => [
    			'class' => TimestampBehavior::className(),
    			'createdAtAttribute' => 'create_time',
    			'updatedAtAttribute' => 'update_time',
    		],
    	]);
    }

    /* 系统生成的可以借鉴的方法 */
    //根据指定的用户ID查找 认证模型类的实例，当你需要使用session来维持登录状态的时候会用到这个方法。
    public static function findIdentity($id)
    {
    	return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    //根据指定的存取令牌查找 认证模型类的实例，该方法用于 通过单个加密令牌认证用户的时候（比如无状态的RESTful应用）。
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    public static function findByUsername($username)
    {
    	return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
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
    //获取该认证实例表示的用户的ID。
    public function getId()
    {
    	return $this->getPrimaryKey();
    }
    //获取基于 cookie 登录时使用的认证密钥。 认证密钥储存在 cookie 里并且将来会与服务端的版本进行比较以确保 cookie的有效性。
    public function getAuthKey()
    {
    	return $this->auth_key;
    }
    //是基于 cookie 登录密钥的 验证的逻辑的实现。
    public function validateAuthKey($authKey)
    {
    	return $this->getAuthKey() === $authKey;
    }
    public function validatePassword($password)
    {
    	return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    public function setPassword($password)
    {
    	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    public function generateAuthKey()
    {
    	$this->auth_key = Yii::$app->security->generateRandomString();
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