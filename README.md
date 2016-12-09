**Bài tập môn Phân tích thiết kế HTTT - HungNV**

`Installation instructions`

____
step 1: Download project 

       run: 
       "composer global require "fxp/composer-asset-plugin:^1.2.0""
       "init" => 0 => yes
       "composer update" 
       in cmd where have file composer.json in project
       
step 2: Create an database named: "pttk" in your database

step 3: config database in common/config/main-local.php :

        `'db' => [
           'class' => 'yii\db\Connection',
                     'dsn' => 'mysql:host=localhost;dbname=pttk',
                     'username' => 'root',
                     'password' => '',
                     'charset' => 'utf8',
                 ],`
____   

**Login with facebook**

`follow page: "https://mushtaqtahir.com/blog/2/facebook-authentication-using-yii2-authclient" connect`

`In frontend/sitecontroller.php:`

`public function successCallback($client)

    {
    
        // Lấy thông tin người dùng từ fb
        
        $attributes = $client->getUserAttributes();
        
        $user = \common\models\User::find()->where(['=','fb_id',$attributes['link']])->one();
        
           //Nếu người dùng tồn tại với id thì login
           
        if(!empty($user['id'])){
        
            Yii::$app->user->login($user);
            
        }
        
        else
            {
             //Khởi tạo user mới, gán dữ liệu từ fb vào $model
             
            $model = new \common\models\User();
            
            $model->username = $attributes['name'];
            
            $model->fb_id = $attributes['link'];
            
            $model->email = $attributes['id'].'@facebook.com';
            
            $model->password = md5($attributes['id']);
            
            $model->phone_number = 'null';
            
            $model->generateAuthKey();
                
            if ($model->save()){
            
                Yii::$app->getUser()->login($model);               }
                
            }
    }`
    
    