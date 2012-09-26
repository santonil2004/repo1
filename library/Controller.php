<?php

class Controller
{

    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    /**
     * extract data from url
     * @param type $request
     * @return type 
     */
    private function extractData($url='')
    {
        $url = rtrim(trim($url), '/');

        $request = explode('/', $url);

        $params = array();

        if (count($request) >= 2) {
            $params['controller'] = $request[0];
            $params['action'] = $request[1];
        }


        for ($i = 2; $i < count($request); $i = $i + 2) {
            if (!empty($request[$i + 1])) {
                $params[(string) $request[$i]] = $request[$i + 1];
            }
        }

        return $params;
    }

    /**
     * fetch $_POST and $_GET array
     * @return type array
     */
    public function getParams()
    {
        if (isset($_REQUEST['url'])) {
            $_REQUEST = $_REQUEST + $this->extractData($_REQUEST['url']);
        }
        return $_REQUEST;
    }

    /**
     * fetch particular data from POST or GET array
     * @param type $key
     * @return type 
     */
    public function getParam($key='')
    {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
    }

    /**
     * redirect
     * @param type $url
     * @return type 
     */
    public function redirect($url)
    {
        echo '<script>location.replace("' . URL . $url . '")</script>';
        // header("location:URL.$url");
        return true;
    }

}