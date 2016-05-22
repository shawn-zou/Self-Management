<?php
namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月22日
 * 暂时留作一些系统页面
 */
class SiteController extends BaseController
{
	/**
	 * 管理员登录
	 * 从Yii::$app->user->isGuest开始，
	 * @see \yii\web\User renewAuthStatus()，有自动登录的流程，只要配置enableAutoLogin就行
	 */
	public function actionLogin()
	{
		$this->layout = 'login';
	
		if(!Yii::$app->user->isGuest)
		{
			return $this->goHome();
		}
	
		$objLogin = new LoginForm();
		if($objLogin->load(Yii::$app->request->post()) && $objLogin->login())
		{
			return $this->goBack();
		}
		else
		{
			return $this->render('login', [
				'objLogin' => $objLogin,
			]);
		}
	}

	/**
	 * 管理员退出
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}
    /**
     * @inheritdoc
     */
    /* public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    } */

    public function actionIndex()
    {
        return $this->render('index');
    }
}