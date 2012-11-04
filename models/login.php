<?php

class model_login extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        if (!$username || !$password) {
            return false;
        } else {

            $sth = $this->db->prepare('SELECT id,username FROM user  WHERE username = :username AND password= :password');
            $sth->execute(array(':username' => $username, ':password' => md5($password)));

            $result = $sth->fetchAll();

            $rowCount = $sth->rowCount();

            if ($rowCount > 0) { // better to check if count is strictly equal to 1
                // set session
               // Session::init();
                Session::set('userId', $result[0]['id']);
                return true;
            }
        }

        return false;
    }

}
