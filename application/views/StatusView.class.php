<?php

/*
    protected $vars = array();
    protected $_controller;
    protected $_action;

    protected $defaultHeader = APP_PATH.'application/views/default/header.php';
    protected $defaultFooter = APP_PATH.'application/views/default/footer.php';
    protected $defaultLayout = APP_PATH.'application/views/default/layout.php';

    protected $controllerHeader='';
    protected $controllerLayout='';
    protected $controllerFooter='';

 */

class StatusView extends View{

/*
 * 如果这个页面组件增加
 * 重写 render() 渲染这个页面
 * 
 */

    public function error(){

        $page = APP_PATH."application/views/Index/error.php";
        $this->page($page);
    }
    public function show(){

        $pages[] = APP_PATH.'application/views/Index/header.php';
        $pages[] = APP_PATH."application/views/Index/left.php";
        $pages[] = APP_PATH."application/views/Status/show.php";
        $pages[] = APP_PATH.'application/views/Index/end.html';
        $pages[] = APP_PATH.'application/views/Index/login.php';
        $pages[] = APP_PATH.'application/views/Index/register.php';
        $pages[] = APP_PATH.'application/views/Index/newProblem.php';
        $pages[] = APP_PATH.'application/views/Index/newContest.php';
        $pages[] = APP_PATH.'application/views/Index/footer.php';

        foreach($pages as $page) $this->page($page);
    }
    public function render($action ){
        if($action == 'show'){
            $this->show(); return ;
        }

        $this->error();
        return ;
    }

}
