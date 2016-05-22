<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月21日
 * 创建以备通用操作
 */
class BaseController extends Controller
{
	/**
	 * 设置公共行为配置
	 * @see \yii\base\Component::behaviors()
	 */
	public function behaviors()
	{
		return [
			/**
			 * 入口过滤
			 * `?`: matches a guest user (not authenticated yet) => 未登录
			 * `@`: matches an authenticated user => 登录
			 */
			'access' => [
				'class' => AccessControl::className(),
				//'only' => [''],如果设置了only，则only以外的操作将无条件获得授权
				//'except' => ['site' ,'user'],
				'rules' => [
					[
						//只有user和site控制器可以在未登录情况下访问；user用于登录、注册等，site用于一些系统级的信息展示
						'controllers' => ['user', 'site'],
						'allow' => true,
						'roles' => ['?'],
						'denyCallback' => function($rule, $action)
						{
							throw new ForbiddenHttpException('亲爱的用户，您暂时无法进行该操作！');
						}
					],
				],
			],
			/**
			 * 动态过滤
			 */
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
					'delete' => ['post'],
				],
			],
		];
	}
}