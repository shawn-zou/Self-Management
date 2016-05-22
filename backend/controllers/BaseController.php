<?php
namespace backend\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月23日
 * 公共操作备用
 */
class BaseController extends Controller
{
	/**
	 * 公共行为规则
	 * @see \yii\base\Component::behaviors()
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					//只有site控制器可以在未登录时被访问
					[
						'controllers' => ['site'],
						'allow' => true,
						'roles' => ['?'],
					],
					//除site的控制器要登录时才能访问
					[
						'controllers' => [],
						'allow' => true,
						'roles' => ['@'],
					],
					/*
					 * @todo 只有login操作可以在未登录时被访问，原本想直接写在site控制器里的，但会覆盖base的，后续再处理
					 */
					/* [
						'actions' => ['login'],
						'allow' => true,
						'roles' => ['?'],
					], */
					//除login操作都要登录时才能访问
					/* [
						'actions' => ['index'],
						'allow' => true,
						'roles' => ['@'],
					], */
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}
}