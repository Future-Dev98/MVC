<?php

namespace Core;

class App {

    /**
     * get view path
     *
     * @return string
     */
    public function View()
    {
        $urlProcess = $this->UrlProcess();
        $fileName = $urlProcess[count($urlProcess) - 1];
        $viewPath = VIEW_PATH;
        if (count($urlProcess) === 1 && $urlProcess[0] === ROOT_FOLDER) {
            return SITE_URL . '/page/Index.php';
        } else {
            //remove first element and second element in urlProcess
            array_shift($urlProcess);
        }
        
        //add admin or frontend for array
        if ($urlProcess[0] == 'admin') {
            array_shift($urlProcess);
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

    /**
     * require view file
     *
     */
    public function ViewFile()
    {
        $urlProcess = $this->UrlProcess();
        require_once $urlProcess[1] === 'admin' ? VIEW_PATH . '/Admin/View.php' : VIEW_PATH . '/Frontend/View.php';
    }

    /**
     * get controller
     *
     * @return string
     */
    public function Controller()
    {
        $urlProcess = $this->UrlProcess();
        if (count($urlProcess) === 1 && $urlProcess[0] === ROOT_FOLDER) {
            return CONTROLLER_PATH . '/Frontend/Index.php';
        } else {
            //remove first element and second element in urlProcess
            array_shift($urlProcess);
        }
        
        //add admin or frontend for array
        if ($urlProcess[0] == 'admin') {
            array_shift($urlProcess);
            array_unshift($urlProcess,'Admin');
        } else {
            array_unshift($urlProcess,'Frontend');
        }

        // check url has must be blog
        if (count($urlProcess) > 3) {
            if ($urlProcess[count($urlProcess - 2)] === 'post' ||
                $urlProcess[count($urlProcess - 2)] === 'category')
            {
                //add blog folder for array
                array_splice($urlProcess, count($urlProcess - 2), 'Blog',count($urlProcess - 3));

                //remove last element of array
                unset($urlProcess[count($urlProcess - 1)]);
            } else {
                array_splice($urlProcess, 0, 'Page', 1);
            }
        }

        //convert first letter of string to uppercase
        $fileName = ucfirst($urlProcess[count($urlProcess) - 1]);

        //remove last element of array
        array_pop($urlProcess);

        //$notfoundPage = SITE_URL . 'page/404.php';
        $filePath = implode('/',$urlProcess) . $fileName '.php';
        
        return $filePath;
    }

    /**
     * get controller class
     *
     * @return string
     */
    public function ControllerClass()
    {
        $filePathProcess = explode('/', $this->Controller());
        $file = $filePathProcess[count($filePathProcess) - 1];
        return str_replace('.php', '',  $file);
    }
    
    /**
     * get model
     *
     * @param string $model
     * @return Class
     */
    public function Model($model)
    {
        require_once MODEL_PATH . $model . '.php';
        return new Model\$model;
    }

    /**
     * Url Process
     *
     * @return array
     */
    function UrlProcess() {
        if(isset($_SERVER['REQUEST_URI']) ){
            $urlProcess = explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
            //remove folder path pt2
            array_shift($urlProcess);
            return $urlProcess;
        }
    }
}
