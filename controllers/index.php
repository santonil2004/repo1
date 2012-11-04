<?php

class controller_index extends Controller
{

    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
       $this->view->msg = 'this is from index , index';
        $this->view->render('index/index');
    }

 

}
