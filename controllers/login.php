<?php

class controller_login extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('login/index');
    }

    public function login()
    {
        r($this->getParams());

        $username = $this->getParam('username');
        $password = $this->getParam('password');
        
        $model = new model_login();
        
        $result = $model->login($username, $password);
        
        if($result) {
            $this->redirect('dashboard/index/');
        }

        $this->view->render('login/index');
    }

}
