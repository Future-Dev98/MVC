<?php
namespace MVC\Core;

class Controller {

    // get view file by $filePath
    public function View()
    {
        $urlProcess = $this->UrlProcess();
        $file = $pageUrl[count($filePath) - 1];
        $viewPath = VIEW_PATH;
        if (count($urlProcess) === 1 && $urlProcess[0] === 'MVC') {
            return SITE_URL . 'index.php';
        } else {
            //remove first element and second element in urlProcess
            unset($urlProcess[0]);
        }
        
        //set file path by url
        if ($urlProcess[0] == 'admin') {
            unset($urlProcess[0]);
            $viewPath .= 'Admin' . explode($urlProcess2);
        } else {
            $viewPath .= 'frontend' . explode($urlProcess2);
        }

        $notfoundPage = SITE_URL . 'page/404.php';
        $file = $viewPath . '.php';
        $viewPage = file_exists($file) ? $file : $notfoundPage;
        return $viewPage;
    }

    // get model file
    public function Model($model)
    {
        return MODEL_PATH . $model . '.php';
    }

    function UrlProcess() {
        if(isset($_SERVER['REQUEST_URI']) ){
            return explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
        }
    }
}