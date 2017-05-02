<?php 

class ProblemController extends Controller{

    public function index(){

        define('PAGE_TYPE', 'guide');
    

        $this->render('index');
    }


    public function error( $e ){

        $this->assign('error', $e);
        define('PAGE_TYPE', 'guide');

        $this->render('error');
    }



}

