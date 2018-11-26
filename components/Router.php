<?php

class Router {

    private $routes;

    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include $routesPath;
    }
    
    private function getURI() {
        $uri = $_SERVER['REQUEST_URI'];
        return trim($uri, '/');
    }
    
    public function run() {
        $uri = $this->getURI();
        
        foreach($this->routes as $uriPattern => $path) {
            if(preg_match("~$uriPattern~", $uri)) {
                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                $pieces = explode('/', $internalRoute);
                
                $controllerName = ucfirst(array_shift($pieces)).'Controller';
                $actionName = 'action'.ucfirst(array_shift($pieces));
                
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                
//                print_r($pieces);
//                echo $controllerName.' '.$actionName.'<br>';
//                unset($_SESSION['products']);
                
                if(file_exists($controllerFile)) {
                    include_once $controllerFile;
                
                    $params = $pieces;

                    $controllerObject = new $controllerName();
                    call_user_func_array(array($controllerObject, $actionName), $params);
                    break;
                }
            }
        }

    }

}

?>