<?php

class controller_dashboard extends Controller
{

    public $userId;

    function __construct()
    {
        parent::__construct();

        //Session::init();

        if (!(Session::get('userId'))) {
            Session::destory();
            $this->redirect('login/index/');
        }
    }

    public function index()
    {
        $this->view->render('dashboard/index');
    }

}
