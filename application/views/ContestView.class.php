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

class ContestView extends View{

    /*
     * 如果这个页面组件增加
     * 重写 render() 渲染这个页面
     * 
     */

    public function render( $action ){

        // 将数组中的键值对的键转换成同名的变量
        extract($this->variables);

        $vars = $this->variables;

        $controllerHeader = APP_PATH.'application/views/'.$this->_controller.'/header.php';
        $controllerFooter = APP_PATH.'application/views/'.$this->_controller.'/footer.php';
        $controllerLayout = APP_PATH.'application/views/'.$this->_controller.'/'.$action.'.php';
        $controllerUpdate = APP_PATH.'application/views/'.$this->_controller.'/update.php';
        $controllerProblem = APP_PATH.'application/views/Problem/problem.php';
        $controller = $this->_controller;

        // Header
        if(file_exists ($controllerHeader)){
            if( APP_DEBUG_FRA ) echo "<br><br><br>include $controllerHeader<br>";

            include($controllerHeader);
        }
        else{

            include($this->defaultHeader);

            if( APP_DEBUG_FRA ) echo "<br><br><br>include $controllerHeader failed.<br>";
        }
        // Update

        // Body
        if( file_exists($controllerLayout) )   include($controllerLayout);
        else{

            if( APP_DEBUG_FRA ) echo "<br> $controllerLayout has not been find.<br>";
            include($this->defaultError);
        } 

        // Footer       
        if(file_exists($controllerFooter)){

            if( APP_DEBUG_FRA ) echo "<br>include $controllerFooter<br>";

            include($controllerFooter);

        }
        else {

            include($this->defaultFooter);

            if( APP_DEBUG_FRA ) echo "<br>include $controllerFooter failed.<br>";
        }

    }
}
