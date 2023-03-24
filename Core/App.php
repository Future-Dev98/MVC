<?php
namespace MVC\Core;

class App {

    // get view file by $filePath
    public function View()
    {
        $urlProcess = $this->UrlProcess();
        $fileName = $urlProcess[count($urlProcess) - 1];
        $viewPath = VIEW_PATH;
        if (count($urlProcess) === 1 && $urlProcess[0] === 'MVC') {
            return SITE_URL . '/Index.php';
        } else {
            //remove first element and second element in urlProcess
            unset($urlProcess[0]);
        }
        
        //add admin or frontend for array
        if ($urlProcess[0] == 'admin') {
            unset($urlProcess[0]);
            array_unshift($urlProcess,'Admin');
        } else {
            array_unshift($urlProcess,'Frontend');
        }

        // check url has must be blog
        if ($urlProcess > 3) {
            if ($urlProcess[count($urlProcess - 2)] === 'post' ||
                $urlProcess[count($urlProcess - 2)] === 'category')
            {
                //add blog folder for array
                array_splice($urlProcess, count($urlProcess - 2), 'blog',count($urlProcess - 3));

                //remove last element of array
                unset($urlProcess[count($urlProcess - 1)]);
            } else {
                array_splice($urlProcess, 0, 'page', 1);
            }
        }
        $notfoundPage = SITE_URL . '/page/404.php';
        $filePath = implode('/',$urlProcess) . '.php';
        $viewPage = file_exists($filePath) ? $filePath : $notfoundPage;
        return $viewPage;
    }

    // get view file by $filePath
    public function Controller()
    {
        $urlProcess = $this->UrlProcess();
        $fileName = $urlProcess[count($urlProcess) - 1];
        $controllerPath = CONTROLLER_PATH;
        if (count($urlProcess) === 1 && $urlProcess[0] === 'MVC') {
            return $controllerPath . '/Frontend/Index.php';
        } else {
            //remove first element and second element in urlProcess
            unset($urlProcess[0]);
        }
        
        //add admin or frontend for array
        if ($urlProcess[0] == 'admin') {
            unset($urlProcess[0]);
            array_unshift($urlProcess,'Admin');
        } else {
            array_unshift($urlProcess,'Frontend');
        }

        // check url has must be blog
        if ($urlProcess > 3) {
            if ($urlProcess[count($urlProcess - 2)] === 'post' ||
                $urlProcess[count($urlProcess - 2)] === 'category')
            {
                //add blog folder for array
                array_splice($urlProcess, count($urlProcess - 2), 'blog',count($urlProcess - 3));

                //remove last element of array
                unset($urlProcess[count($urlProcess - 1)]);
            } else {
                array_splice($urlProcess, 0, 'page', 1);
            }
        }
        //$notfoundPage = SITE_URL . 'page/404.php';
        $filePath = implode('/',$urlProcess) . '.php';
        return $filePath;
    }

    //get controller class
    public function ControllerClass()
    {
        $filePathProcess = explode('/', $this->Controller());
        $file = $filePathProcess[count($filePathProcess) - 1];
        return str_replace('.php', '',  $file);
    }
    //get model file
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