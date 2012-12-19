<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    public $_id;
    public $email;
    public $fullname;

    public function __construct($email="",$password="")
	{
        if(!empty ($email) && !empty ($password))
        {
            $this->email=$email;
            $this->password=$password;
        }
	}

    public function getId()
    {
        return $this->_id;
    }

    public static function genPassword($password)
    {
        $secKey = (Yii::app()->params['securityKey'])? Yii::app()->params['securityKey']: "Xyz123";
        return md5($secKey.$password);
    }
}