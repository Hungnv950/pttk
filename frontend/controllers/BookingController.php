<?php

namespace frontend\controllers;

use common\models\Shift;
use common\models\Table;
use common\models\TableType;
use Yii;
use common\models\Booking;
use common\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;

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
        $model = Table::find()->where(['>', 'id', 0])->asArray()->all();

        return $this->render('index', [
            'model' => $model,
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
    public function actionCreate($table_type)
    {
        $model = new Booking();
        $booking = Booking::find()->asArray()->all();
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        $table = Table::find()->asArray()->all();
        $shift = Shift::find()->asArray()->all();
        $employee = User::find()->select('id')->where(['=', 'positon', 1])->asArray()->all();

        shuffle($employee);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->user_id = intval(Yii::$app->user->id);
            $model->employee_id = $employee['0']['id'];
            $model->table_type = $table_type;
            $model->money_payed = 0;
            $model->book_time = Date('m-d-Y');
            $model->book_status = 1;
            $model->cost = 1;
            $data = '';
            foreach ($model->table_id as $row) {
                $data.=$row.' ';
            }
            $model->table_id = trim($data);

//            var_dump($model);die;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $table_type = TableType::find()->where(['=', 'id', $table_type])->asArray()->all();
        return $this->render('create', [
            'model' => $model,
            'table_type' => $table_type,
            "table" => $table,
            "shift" => $shift,
            'user' =>$user,
            'booking' => $booking,
        ]);

    }
    public function actionCreat2e($table_type)
    {
        /** @var TableType[] $table_type */

//        var_dump($table_type);die;
        $table = Table::find()->asArray()->all();
        $shift = Shift::find()->asArray()->all();

        $model = new Booking();

        $employee = User::find()->select('id')->where(['=', 'positon', 1])->asArray()->all();
        shuffle($employee);
        if ($model->load(Yii::$app->request->post())) {

            $model->user_id = intval(Yii::$app->user->id);
            $model->employee_id = $employee['0']['id'];
            $model->table_type = $table_type;
            $model->money_payed = 0;
            $model->book_time = time();
            $model->book_status = 1;
            $model->cost = 1;
            $model->table_id = json_encode($model->table_id);
//            var_dump($model->table_id);die;

//            var_dump($model);
//            die;// echo $model->id;die;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        $table_type = TableType::find()->where(['=', 'id', $table_type])->asArray()->all();
        return $this->render('create', [
            'model' => $model,
            'table_type' => $table_type,
            "table" => $table,
            "shift" => $shift,
        ]);

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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

        return $this->goHome();
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
}
