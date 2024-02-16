<?php

namespace app\controllers;

use app\models\Lesson;
use app\models\LessonComplete;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
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
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $lessons = Lesson::find()->all();

        $courseComplete = true;
        foreach ($lessons as $lesson) {
            if (!$lesson->result->is_read)
                $courseComplete = false;
        }
        return $this->render('index',compact('lessons','courseComplete'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $lesson = Lesson::findOne($id);
        $firstLesson = Lesson::find()->orderBy(['id' => SORT_ASC])->one();
        $lastLesson = Lesson::find()->orderBy(['id' => SORT_DESC])->one();

        return $this->render('view', compact('lesson','firstLesson','lastLesson'));
    }

    public function actionLessonRead($id)
    {
        $lessonComplete = LessonComplete::find()
            ->andWhere(['lesson_id' => $id])
            ->andWhere(['user_id' => Yii::$app->user->identity->id])
            ->one();
        $lessonComplete->is_read = Yii::$app->request->post('lesson_complete');

        if ($lessonComplete->save())
            return $this->redirect(['/site/view', 'id' => $id]);

        return false;
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
