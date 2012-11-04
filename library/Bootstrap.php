<?php

/**
 *  bootstrap class
 *  to get information from url and choose appropriate controller , methods according to information avilable at url
 */
class Bootstrap
{

    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = rtrim(trim($url), '/');


        $request = explode('/', $url);

        // set default controller in case if not specified, in case specified use specified
        if (empty($request[0])) {

            $controller = new controller_index();
            $controller->index();
            return false;
        } else {

            $controllerPath = 'controllers/' . $request[0] . '.php';

            if (file_exists($controllerPath)) {

                $controllerName = 'controller_' . $request[0];

                $controller = new $controllerName;

                if (!empty($request[1])) {
                    if (method_exists($controller, $request[1])) {
                        // check if params exists...
                        if (count($request) > 2) {
                            $params = $this->prepareParams($request);
                            $action = $controller->{$request[1]}($params);
                        } else {
                            $action = $controller->{$request[1]}();
                        }
                    } else {
                        $msg = "Method  <i>$request[1]</i> not found on Class  <i>controller_$request[0]</i> on <b>$request[0].php</b>";
                        $this->error($msg);
                        return false;
                    }
                } else {
                    // use default index method
                    $action = $controller->index();
                }
            } else {
                $msg = "Controller Class file  <b>$request[0].php</b> does not exist !";
                $this->error($msg);
                return false;
            }
        }
    }

    private function prepareParams($request = array())
    {
        $params = array();

        $params['controller'] = $request[0];

        $params['action'] = $request[1];

        for ($i = 2; $i < count($request); $i = $i + 2) {
            if (!empty($request[$i + 1])) {
                $params[(string) $request[$i]] = $request[$i + 1];
            }
        }

        return $params;
    }

    private function error($message='')
    {
        $controller = new controller_errors();
        $controller->index($message);
        return false;
    }

}
