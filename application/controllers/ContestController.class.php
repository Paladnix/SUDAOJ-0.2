<?php 

class ContestController extends Controller{

    public function index(){

        define('PAGE_TYPE', 'guide');

        $this->assign('error', '暂时没有页面');

        $this->archive();
    }


    public function error( $e ){

        $this->assign('error', $e);

        $this->render('error');
    }
    public function create(){

        $data = array();

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {   
            $data['cname'] = $_POST["cname"];
            $data['timeStart'] = str_replace("T", " ", $_POST["timeStart"]);
            $data['timeEnd'] = str_replace("T", " ", $_POST["timeEnd"]);
            $data['password'] = $_POST["password"];

        }
        else {
            exit("The service has not got message from the http url by the method of POST.");
        }

        $result = (new ContestModel)->add( $data );

        if( $result == array() ){

            $this->error("比赛有些问题");
            return ;

        } 

        $cid = $result;

        $params = array( sprintf("cid=%s", $cid));

        $this->show($params);

    }

    public function show( $params ){

        $data = array();

        foreach($params as $param){

            $tmp = explode("=", $param);

            $data[$tmp[0]] = $tmp[1];

        }

        $result = (new ContestModel)->select($data);

        if($result == array()){

            $this->error("没有这场比赛");
            return ;
        }

        foreach($result as $row){

            foreach($row as $key => $value){

                if($key == "problem"){

                    if( $value != ""){

                        $tmp = explode("#", $value);

                        $problems = array();

                        foreach($tmp as $pid){

                            $data = array("pid" => $pid);

                            $presult = (new ProblemModel)->select($data);

                            $problems[$presult['pid']]  = $presult['pname'];
                        }

                        $this->assign("problems", $problems);

                    }

                }
                $this->assign($key, $value);

            }
        }

        $this->render("show");

    }

    public function archive( $params = NULL ){

        $data = array();

        if($params != NULL)
        
            foreach($params as $param){

                $tmp = explode("=", $param);

                $data[$tmp[0]] = $tmp[1];

            }

        $result = (new ContestModel)->archive( $data );

        if($result == array() ){

            $this->error("没有找到对应的比赛");
            return ;
        }


        $this->assign("row", $result);

        $this->render("archive");

    }
}

