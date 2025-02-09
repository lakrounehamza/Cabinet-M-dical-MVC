router
<?php
require_once(__DIR__ . '/../cont/UserCont.php');
require_once(__DIR__ . '/../cont/PagesCont.php');
require_once(__DIR__ . '/../cont/HomeCont.php');
class Router
{    
    
    private ?String  $controller = "UserCont";
    private ?String  $method     = "index";
    private          $param      =  []; 
    public function  __construct()
    {
        $url = $this->getUrl();
        if (isset($url[0])) {
            $controllerName = ucwords($url[0]) . 'Cont';
            if (file_exists(__DIR__ . '/../cont/' . $controllerName . '.php')) {
                require_once __DIR__ . '/../cont/' . $controllerName . '.php';
                $this->controller = $controllerName;
                unset($url[0]);
            }
        // echo  'url '.  $url[1];
        }
        

        if (isset($url[1])){

            if (method_exists($this->controller, $url[1])){
                
                $this->method = $url[1];
                unset($url[1]);

            }

        }
        $this->param = $url ? array_values($url):[];
        echo  'method  : ' . $this->method.'   ';
        // echo  'exist  '.$url[1] .' a  '.$this->controller.'Cont'.' : ' . method_exists($this->controller.'Cont',$url[1]).'   ';
        $controller = new $this->controller;
        // echo ' router   param : '; print_r($this->param); echo ' end ;';
        call_user_func_array([$controller,$this->method],$this->param);

    }
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = rtrim($url, '/');
            $url  =  explode('/', $url);
            return $url;
        }
    }
}
