<?php

class controller_errors extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index($message='')
    {
        $this->view->msg = '<span style="color:red">'.$message.'</style>';
        $this->view->render('index/index');
    }

    function details()
    {
        $this->view->msg = 'this is from erros , details';
        $this->view->render('index/index');
    }

}
