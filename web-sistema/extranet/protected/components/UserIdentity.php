<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {


    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate($senha_encript = false) {

        $user = User::model()->findByAttributes(array('email' => $this->username));

        if (!is_object($user) || $user->active != 1)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif (!$user->senhaValida($this->password, $senha_encript = false))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->setState('obj', $user);
            if($user->idUserGroup!=1){
                $idcliente = 0;
                if(count($user->clientes)==1){
                    $idcliente = $user->clientes[0]->idcliente;
                }
                $this->setState('filtro_cliente', $idcliente);
            }

            $this->setState('pageSize', Yii::app()->params['defaultPageSize']);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

//	public function authenticate()
//	{
//		$user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
//		if($user===null)
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		else if(!$user->validatePassword($this->password))
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//		{
//			$this->_id=$user->id;
//			$this->username=$user->username;
//			$this->errorCode=self::ERROR_NONE;
//		}
//		return $this->errorCode==self::ERROR_NONE;
//	}


}
