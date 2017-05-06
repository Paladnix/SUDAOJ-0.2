<?php 

class StatusController extends Controller{

    public function index(){

        $this->show();
    }


    public function error( $e ){

        $this->assign('error', $e);

        $this->render('error');
    }

    public function show($params=array()) {

       $result = (new StatusModel)->selectAll();

       if($result == array()){
           $this->error("没有判题记录");
           return ;
       }

       $this->assign('result', $result);

       $this->render('show');

    }

}

