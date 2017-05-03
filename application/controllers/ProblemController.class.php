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


    public function submit(){

        $data = array();

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $data['pid'] = $_POST['pid'];
            $data['compiler'] = $_POST['compiler'];
            $data['username'] = $_POST['username'];
            if(isset($_POST['cid']))
                $data['cid'] = $_POST['cid'];
        
        }
        else {
            exit("The service has not got message from the http url by the method of POST.");
        }

        $result = (new StatusModel)->add($data);

        if( $result == array() ){

            $this->error("提交失败");
            return ;

        } 

        $rid = $result;

        $dir = "/home/judge/userCode/$rid/";

        if( ! is_dir($dir) && !mkdir($dir) ){

            $this->error("创建文件夹：$dir 失败");
            return ;
        }

        chmod($dir, 0777);
/*
        if($data['compiler'] == "g++")
            $file = $dir."$rid.cpp";

        else if($data['compiler'] == "javac")
            $file = $dir."";

        else if($data['compiler'] == "python3")
            $file = $dir."$rid.py";
        else {

            $this->error("编译器选择失败");
            return ;
        }
 */
        if($_FILES["file"]["error"] ){

            $this->error("上传文件$file失败");
            return ;
        }

        $file = $_FILES['file']['name'];

        if(! move_uploaded_file($_FILES["file"]["tmp_name"], $dir.$file)){

            $this->error("文件$file 转储失败");
            return ;
        }

        $data['codeFileName'] = $file;
        $data['codeFileDir'] = $dir;
        /*
         *  更新problem 提交数据
         */

        $data_tmp = array("submit" => "submit+1");
        $where_tmp = array("pid" => $data['pid']);
        $result = (new ProblemModel)->updateSubmit($data_tmp, $where_tmp);

        if( $result == 0 ){
            
            $this->error("更新题目提交数据时发生错误， 没有更新");
            return ;
        }


        /*
         *  获取题目的限制 
         */
        $result = (new ProblemModel)->selectLimit($where_tmp);

        if( $result == 0){
            $this->error("获取题目限制数据出错");
            return ;
        }

        foreach($result as $row ){
            $data['timeLimit'] = $row['timeLimit'];
            $data['memoryLimit'] = $row['memoryLimit'];
        }

        /*
         *  Judge
         *  后缀Dir 的为存储路径，不包含到文件名
         *  后缀Name 为单纯文件名，不包含路径
         *  二者都没有的为绝对路径. 
         */

        $result = $this->judge($data);

    }

    public function judge($data){

        $data['IN'] = "/home/judge/problemIO/".$data['pid']."/IN";
        $data['OUT'] = "/home/judge/problemIO/".$data['pid']."/OUT";

        $data['userOut'] = "/home/judge/userOut/".$data['rid'].".out";
        $data['userExeDir'] = '/home/judge/userExe/'.$data['rid']."/";
        
        if( ! is_dir($data['userExeDir']) && !mkdir($data['userExeDir']) ){

            $this->error("创建文件夹：".$data['userExe']."失败");
            return ;
        }

        chmod($data['userExeDir'], 0777);

        $Judge = new Judge($data);

    }

}

