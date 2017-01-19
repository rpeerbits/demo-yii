<?php

namespace app\models;
use app\models\Users;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $User = Users::find()->where(["id" => $id])->one();
        if (!count($User))
        {
            return null;
        }
        else
        {
            $dbUser = [
                'id' => $User->id,
                'username' => $User->username,
                'password' => $User->password,
                
            ];
            return new static($dbUser);    
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $User = Users::find()->where(["username" => $username])->one(); 
        if (!count($User))
        {
            return null;
        }
        else
        {
            $flag=0;
            if($flag == 0){
                $dbUser = [
                    'id' => $User->id,
                    'username' => $User->username,
                    'password' => $User->password,
                    //'authKey' => "test".$User->id."key",
                    //'accessToken' => "fashionapp".$User->id,
                ];
                return new static($dbUser);
            }else return null;
        }
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        //return $this->authKey;
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        //return $this->authKey === $authKey;
        return $this->id === $id;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
