<?php

namespace backend\controllers;

use common\models\AdvancedService;
use common\models\BookingService;
use common\models\User;
use Yii;
use common\models\Booking;
use common\models\BookingSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $status = $_GET['status'];

        $searchModel = new BookingSearch();

        switch ($status) {

            case "1": $dataProvider = new ActiveDataProvider(['query' => Booking::find()->where(['book_status'=>'1'])->orderBy('book_status'),]);break;
            case "2": $dataProvider = new ActiveDataProvider(['query' => Booking::find()->where(['book_status'=>'2'])->orderBy('book_status'),]);break;
            case "3":$dataProvider = new ActiveDataProvider(['query' => Booking::find()->where(['book_status'=>'3'])->orderBy('book_status'),]);break;
            case "4":$dataProvider = new ActiveDataProvider(['query' => Booking::find()->where(['book_status'=>'4'])->orderBy('book_status'),]);break;
            case "5":$dataProvider = new ActiveDataProvider(['query' => Booking::find()->where(['book_status'=>'5'])->orderBy('book_status'),]);break;

            default: $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Booking();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $time=strtotime($model->book_time);
            $model->book_time=$time;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*
    * View detail Booking and service of booking
    * */
    public function actionInvoice() {
        $booking_id = $_GET['id'];
//        var_dump($booking_id);die;
        $booking_detail = Booking::find()->where(['id'=> $booking_id])->asArray()->one();
//        var_dump($booking_detail);die;
        $service_detail = BookingService::find()->where(['booking_id'=> $booking_id])->asArray()->all();
//        var_dump($service_detail);die;
        $advanced_service = AdvancedService::find()->asArray()->all();
        $user_detail=User::find()->where(['id'=>$booking_detail['user_id']])->asArray()->one();
//        $table_type_detail=TableType::find()->where(['id'=>$booking_detail['table_type']])->asArray()->one();
        return $this->render('invoice',[
            'booking_detail' => $booking_detail,
            'service_detail' => $service_detail,
            'advanced_service' => $advanced_service,
            'user_detail' => $user_detail,
//            'table_type_detail'=>$table_type_detail
        ]);
    }
}
