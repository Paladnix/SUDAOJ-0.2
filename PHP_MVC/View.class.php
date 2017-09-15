<?php


class View{

    protected $variable = array();
    protected $_controller;
    protected $_action;


    function __construct( $controller=NULL, $action=NULL ){

        $this->_controller = $controller;

        $this->_action = $action;

    }


    public function assign($name, $value){

        $this->variable[$name] = $value;

        if( APP_DEBUG_FRA ) LOGGER::DEBUG($value);
    }

    public function get($name){

        return $this->variable[$name];

    }

    public function page( $file ){

        $vars = $this->variable;

        if(file_exists ($file)){
            include( $file );
        }
        else{
            LOGGER::ERROR(" include $file failed. Can't find it.");
        }

    }


    public function render($action){

        // 将数组中的键值对的键转换成同名的变量
        // extract($this->vars);

        $pages[] = APP_PATH.'application/views/Index/index.php';

        foreach($pages as $page){

            $this->page($page);
        }

/*
        // Header
        if(file_exists ($controllerHeader)){

            if( APP_DEBUG_FRA ) echo "<br><br><br>include $controllerHeader<br>";

            include($controllerHeader);

        }
        else{

            include($this->defaultHeader);

            if( APP_DEBUG_FRA ) echo "<br><br><br>include $controllerHeader failed.<br>";
        }

        // Body
        if( file_exists($controllerLayout) )

            include($controllerLayout);

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
 */

    }
}
