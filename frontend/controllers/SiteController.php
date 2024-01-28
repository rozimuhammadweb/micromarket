<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Blog;
use common\models\Category;
use common\models\CategoryBlog;
use common\models\LoginForm;
use common\models\Product;
use common\models\Setting;
use common\models\Tags;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $categories = Category::getCategories();
        $products = Product::getProducts();
        $latests = Product::getLatest();
        $reviews = Product::getRandProducts();
        $blogs = Blog::getBlogs();
        $banner = Banner::getBanner();
        return $this->render('index', [
            'categories' => $categories,
            'products' => $products,
            'latests' => $latests,
            'reviews' => $reviews,
            'blogs' => $blogs,
            'banner' => $banner
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
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

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $setting = Setting::getSetting();
        return $this->render('contact', ['setting' => $setting]);
    }

    /**
     * @return string
     */
    public function actionShoppingCard()
    {
        return $this->render('shopping-card');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionBlog()
    {
        $blogCategoryFilter = Yii::$app->request->get('category');
        $blogsQuery = Blog::find()->orderBy(['id' => SORT_DESC]);

        if ($blogCategoryFilter) {
            $blogsQuery->andWhere(['category_id' => $blogCategoryFilter]);
        }
        $blogs = $blogsQuery->all();

        $tags = Tags::getTags();
        $blogCategories = CategoryBlog::getCategoriesBlog();
        $recentNews = Blog::getRecentNews();

        return $this->render('blog', [
            'blogCategories' => $blogCategories,
            'blogs' => $blogs,
            'recentNews' => $recentNews,
            'tags' => $tags,
        ]);
    }

    public function actionChangeLang($lang)
    {
        Yii::$app->language = $lang;
        Yii::$app->session->set('lang', $lang);
        $referrer = Yii::$app->request->referrer;
        return $this->redirect($referrer ?: Yii::$app->homeUrl);
    }


    /**
     * @param $id
     * @return string
     */
    public function actionBlogDetail($id)
    {
        $blog = Blog::findOne($id);
        return $this->render('blog-detail', [
            'blog' => $blog
        ]);
    }

    public function actionShop()
    {
        $categoryFilter = Yii::$app->request->get('category');
        $query = Product::find();
        if ($categoryFilter) {
            $query->andWhere(['category_id' => $categoryFilter]);
        }
        $products = $query->orderBy(['id' => SORT_DESC])->all();

        $categories = Category::getCategories();
        $latests = Product::getLatest();
        return $this->render('shop', [
            'categories' => $categories,
            'products' => $products,
            'latests' => $latests,
        ]);
    }

    /**
     * @return string
     */
    public function actionCheckout()
    {
        return $this->render('checkout');
    }

    /**
     * @return string
     */
    public function actionShopDetail($id)
    {
        $product = Product::findOne($id);
        return $this->render('shop-detail', [
            'product' => $product
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
