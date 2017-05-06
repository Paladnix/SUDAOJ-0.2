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

class ProblemView extends View{

    /*
     * 如果这个页面组件增加
     * 重写 render() 渲染这个页面
     * 
     */
    public function showInContest(){

        $pages[] = APP_PATH.'application/views/Problem/problem.php';
        $pages[] = APP_PATH.'application/views/Index/end.html';
        $pages[] = APP_PATH.'application/views/Problem/submit.php';
        foreach($pages as $page) $this->page($page);
    }

    public function show(){

        $pages[] = APP_PATH.'application/views/Index/header.php';
        $pages[] = APP_PATH.'application/views/Problem/tagcloud.html';
        $pages[] = APP_PATH.'application/views/Problem/show.php';
        $pages[] = APP_PATH.'application/views/Problem/problem.php';
        $pages[] = APP_PATH.'application/views/Index/end.html';
        $pages[] = APP_PATH.'application/views/Problem/submit.php';
        $pages[] = APP_PATH.'application/views/Index/login.php';
        $pages[] = APP_PATH.'application/views/Index/register.php';
        $pages[] = APP_PATH.'application/views/Index/newProblem.php';
        $pages[] = APP_PATH.'application/views/Index/newContest.php';
        $pages[] = APP_PATH.'application/views/Index/footer.php';

        foreach($pages as $page) $this->page($page);
    }
    public function archive(){

        $pages[] = APP_PATH.'application/views/Index/header.php';
        $pages[] = APP_PATH.'application/views/Problem/tagcloud.html';
        $pages[] = APP_PATH.'application/views/Problem/archive.php';
        $pages[] = APP_PATH.'application/views/Index/end.html';
        $pages[] = APP_PATH.'application/views/Index/login.php';
        $pages[] = APP_PATH.'application/views/Index/register.php';
        $pages[] = APP_PATH.'application/views/Index/newProblem.php';
        $pages[] = APP_PATH.'application/views/Index/newContest.php';
        $pages[] = APP_PATH.'application/views/Index/footer.php';

        foreach($pages as $page) $this->page($page);
    }

    public function error(){
        $page = APP_PATH."application/views/Index/error.php";
        $this->page($page);
    }

    public function render( $action ){

        // 将数组中的键值对的键转换成同名的变量
        
        if($action == "showInContest"){
            $this->showInContest(); return ;
        }
        if( $action == "show" ){
            $this->show();  return ;
        }
        if( $action == "archive" ){
            $this->archive();   return ;
        }
        
        
        $this->error(); return ;

/*

        if( $action != "showInContest"){
            // Header
            if(file_exists ($controllerHeader)){
                if( APP_DEBUG_FRA ) echo "<br><br><br>include $controllerHeader<br>";

                include($controllerHeader);
            }
            else{

                include($this->defaultHeader);

                if( APP_DEBUG_FRA ) echo "<br><br><br>include $controllerHeader failed.<br>";
            }
            // Tagcloud
            if( file_exists($controllerTagcloud) )   include($controllerTagcloud);
            else{

                if( APP_DEBUG_FRA ) echo "<br> $controllerTagcloud has not been find.<br>";
                include($this->defaultError);
            } 

            // Body
            if( file_exists($controllerLayout) )   include($controllerLayout);
            else{

                if( APP_DEBUG_FRA ) echo "<br> $controllerLayout has not been find.<br>";
                include($this->defaultError);
            } 
            // problem
            if($action == "show"){

                if( file_exists($controllerProblem) )   include($controllerProblem);
                else{

                    if( APP_DEBUG_FRA ) echo "<br> $controllerProblem has not been find.<br>";
                    include($this->defaultError);
                } 
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
        else{

            if( file_exists($controllerProblem) )   include($controllerProblem);
            else{

                if( APP_DEBUG_FRA ) echo "<br> $controllerProblem has not been find.<br>";
                include($this->defaultError);
            } 
        }
 */

    }
}
