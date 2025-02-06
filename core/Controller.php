<?php

namespace  core;

class Controller
{
    private ?String  $controller = "pages";
    private ?String  $method     = "index";
    private          $param      =  [];
    public function  __construct()
    {
        $url = $this->getUrl();
        if (isset($url[0])) {
            if (file_exists('../app/models/' . ucwords($url[0]) . '.class')) {
                $this->controller = ucwords($url[0]);
                unset($url[0]);
            }
        } 
        if (isset($url[1]))
            if (method_exists($this->controller, $url[1]))
                $this->method = $url[1];
        $this->param = $url ? array_values($url):[];
    }
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['urt'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = rtrim($url, '/');
            $url  =  explode('/', $url);
            return $url;
        }
    }
}
