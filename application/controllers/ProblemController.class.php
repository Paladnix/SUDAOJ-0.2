<?php 

class ProblemController extends Controller{

    public function index(){

        define('PAGE_TYPE', 'guide');


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
            $data['pname'] = $_POST["pname"];
            $data['timeLimit'] = $_POST["timeLimit"];
            $data['memoryLimit'] = $_POST["memoryLimit"];
            $data['author'] = $_POST["author"];
            $data['tag'] = $_POST["tag"];
            $data['discription'] = $_POST["discription"];
            $data['input'] = $_POST["input"];
            $data['output'] = $_POST["output"];
            $data['inputCase'] = $_POST["inputCase"];
            $data['outputCase'] = $_POST["outputCase"];
            $data['visable'] = $_POST["visable"];
        }
        else {
            exit("The service has not got message from the http url by the method of POST.");
        }

        $result = (new ProblemModel)->add( $data );

        if( $result == array() ){

            $this->error("题目有些问题");
            return ;

        } 

        $pid = $result;

        $dir = "/home/judge/problemIO/$pid/";

        if( ! is_dir($dir) && !mkdir($dir) ){

            $this->error("创建文件夹：$dir 失败");
            return ;
        }

        chmod($dir, 0777);

        $fileIN = $dir."IN";
        $fileOUT = $dir."OUT";

        if($_FILES["fileIN"]["error"] ){

            $this->error("上传文件$fileIN失败");
            return ;
        }
        if($_FILES["fileOUT"]['error'] ){

            $this->error("上传文件$fileOUT失败");
            return ;
        }

        if(! move_uploaded_file($_FILES["fileIN"]["tmp_name"], $fileIN)){

            $this->error("文件$fileIN 转储失败");
            return ;
        }
        if(!move_uploaded_file($_FILES['fileOUT']['tmp_name'],$fileOUT)){

            $this->error("文件$fileOUT 转储失败");
            return ;
        }

        $params = array( sprintf("pid=%s", $pid));

        $this->show($params);



    }

    public function show( $params ){

        $data = array();

        foreach($params as $param){

            $tmp = explode("=", $param);

            $data[$tmp[0]] = $tmp[1];

        }

        $result = (new ProblemModel)->select($data);

        if($result == array()){

            $this->error("没有这个题目");
            return ;
        }

        foreach($result as $row){

            foreach($row as $key => $value){

                $value = str_replace("\n", "<br>", $value);
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

        $result = (new ProblemModel)->archive( $data );

        if($result == array()){

            $this->error("没有找到对应的题目");
            return ;
        }


        $this->assign("row", $result);

        $this->render("archive");

    }





}

