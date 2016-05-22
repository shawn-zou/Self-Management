<?php
namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\models\LoginForm;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月23日
 * 主要是登录、退出，以免在未登录状态对Admin造成不必要的侵入
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

    public function actionIndex()
    {
        return $this->render('index');
    }
}