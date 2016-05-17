<?php
namespace frontend\models;

use Yii;
use frontend\models\Base;

/**
 * @author shawn-zou <157962718@qq.com> 2016-5-17
 * 
 * This is the model class for table "{{%yiiad_user}}".
 *
 * @property string $id
 * @property string $user_name
 * @property string $user_pwd
 * @property string $salt
 * @property string $user_pwd_hash
 * @property string $user_email
 * @property string $email_code
 * @property string $user_email_status
 * @property integer $user_phonenum
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
 * @property integer $user_creatime
 * @property integer $user_updatime
 * @property string $login_ip
 * @property integer $login_time
 * @property string $is_delete
 * @property string $user_education_id
 * @property string $user_job_id
 * @property string $user_tag_id
 * @property string $user_shipping_address
 */
class User extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yiiad_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'salt', 'user_pwd_hash', 'user_creatime', 'user_updatime'], 'required'],
            [['user_email_status', 'user_phonenum', 'user_phone_status', 'is_status', 'user_sex', 'user_emotional_state', 'user_birthday', 'user_blood_type', 'user_qq', 'user_creatime', 'user_updatime', 'login_time', 'is_delete'], 'integer'],
            [['user_introduction', 'user_education_id', 'user_job_id', 'user_tag_id', 'user_shipping_address'], 'string'],
            [['user_name', 'user_nickname'], 'string', 'max' => 30],
            [['user_pwd'], 'string', 'max' => 16],
            [['salt'], 'string', 'max' => 4],
            [['user_pwd_hash'], 'string', 'max' => 32],
            [['user_email', 'email_code', 'user_location', 'user_img'], 'string', 'max' => 255],
            [['user_realname'], 'string', 'max' => 15],
            [['login_ip'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('language', '用户id'),
            'user_name' => Yii::t('language', '用户登录名'),
            'user_pwd' => Yii::t('language', '用户密码'),
            'salt' => Yii::t('language', '注册和修改密码时加密后缀,md5(user_pwd,salt)生成user_pwd_hash'),
            'user_pwd_hash' => Yii::t('language', '用户密码hash'),
            'user_email' => Yii::t('language', '用户邮箱'),
            'email_code' => Yii::t('language', '邮箱激活需要的code'),
            'user_email_status' => Yii::t('language', '邮箱激活状态，可能会用于激活账号；0:未激活;1:激活;'),
            'user_phonenum' => Yii::t('language', '用户手机号'),
            'user_phone_status' => Yii::t('language', '手机激活状态;0:未激活;1:激活'),
            'is_status' => Yii::t('language', '用户状态，需激活；0:未激活;1:激活;'),
            'user_nickname' => Yii::t('language', '用户昵称'),
            'user_realname' => Yii::t('language', '用户真实姓名'),
            'user_sex' => Yii::t('language', '性别外键；对应一张性别表user_sex，后台可以增加个系统管理来管理，模仿facebook'),
            'user_location' => Yii::t('language', '用户所在地，准备用json格式'),
            'user_emotional_state' => Yii::t('language', '感情状况；与性别的信息表一起，待定表名user_emotional_state'),
            'user_birthday' => Yii::t('language', '用户生日'),
            'user_blood_type' => Yii::t('language', '1:A;2:B;3:AB;4:O;'),
            'user_introduction' => Yii::t('language', '用户简介'),
            'user_qq' => Yii::t('language', '用户qq'),
            'user_img' => Yii::t('language', '用户头像，会有注册时默认设置的'),
            'user_creatime' => Yii::t('language', '用户注册时间'),
            'user_updatime' => Yii::t('language', '用户上次修改资料时间'),
            'login_ip' => Yii::t('language', '上次登录ip'),
            'login_time' => Yii::t('language', '上次登录时间'),
            'is_delete' => Yii::t('language', '是否被用户删除；0:未被删除;1:已删除;'),
            'user_education_id' => Yii::t('language', '这个字段提示需要这个张，暂定user_education'),
            'user_job_id' => Yii::t('language', '这个字段提示需要这张表，暂定uer_job'),
            'user_tag_id' => Yii::t('language', '提示需要标签表，暂定user_tags,上限数量暂定5个'),
            'user_shipping_address' => Yii::t('language', '提示需要这张表，暂定shipping_address'),
        ];
    }
}
