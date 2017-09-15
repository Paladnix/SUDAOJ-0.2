<?php 

class ProblemController extends Controller{

    public function index(){

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
            if(isset($_POST['cid']))
                $data['cid'] = $_POST["cid"];
        }
        else {
            LOGGER::ERROR("The service has not got message from the http url by the method of POST.");
            exit("System Error! Connect the system administrator, please.");
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

        $params[] = sprintf("pid=%s", $pid);

        if( ! isset($data['cid'])){
            $this->show($params);
            return ;
        }

        $where_tmp = array("cid" => $data['cid']);

        $result = (new ContestModel)->addProblem($pid, $where_tmp);

        if( $result == 0 ){

            $this->error("添加题目失败");

            return ;
        }

        header("Location:".APP_URL."/contest/show/cid=".$data['cid']);
        
        return ;
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
            LOGGER::ERROR("The service has not got message from the http url by the method of POST.");
            exit("System Error! Connect the system administrator, please.");
        }

        if(isset($data['cid'])){
            $where = array('cid' => $data['cid']);
            $result = (new ContestModel)->select($where);
            if($result == array()){
                $this->error("没有相应的比赛");
                return ;
            }
            $timeEnd = $result[0]['timeEnd'];
            if(strtotime($timeEnd) < strtotime(date("y-m-d H:i:s")))
            {
                echo "超出比赛时间请到题库中提交";
                return ;
            }
        }

        $result = (new StatusModel)->add($data);

        if( $result == array() ){

            $this->error("提交失败");
            return ;

        } 

        $rid = $result;
        $data['rid'] = $rid;

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

        $data_tmp = array("submited" => "submited + 1");
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
            $data['timeLimit'] = ceil($row['timeLimit']/1000);
            $data['memoryLimit'] = $row['memoryLimit'] * 1024;
        }

        /*
         *  Judge
         *  后缀Dir 的为存储路径，不包含到文件名
         *  后缀Name 为单纯文件名，不包含路径
         *  二者都没有的为绝对路径. 
         */

        if(APP_DEBUG) LOGGER::DEBUG($data);

        $data = $this->judge($data);

        $data_tmp = array("rtime" => $data['rtime'], "rmemory" => $data['rmemory'], "status" => $data['result']);

        $where_tmp = array("rid" => $rid);

        if( !(new StatusModel)->update($data_tmp, $where_tmp)){

            $this->error("更新 status 失败");
            return ;
        } 

        if($data['result'] == "AC"){

            echo "<h2 style='color:green;'>Accepted</h2>Time: ".$data['rtime']." ms<br>Memory: ".$data['rmemory']." KB";
        }
        else if($data['result'] == "WA")

            echo "<h2 style='color:red;'>Wrong Answer</h2>Time: ".$data['rtime']." ms<br>Memory: ".$data['rmemory']." KB";

        else if($data['result'] == "TLE")

            echo "<h2 style='color:red;'>Time Limit Error</h2>Time: ".$data['rtime']." ms<br>Memory: ".$data['rmemory']." KB";

        else if($data['result'] == "MLE")

            echo "<h2 style='color:red;'>Memory Limit Error</h2>Time: ".$data['rtime']." ms<br>Memory: ".$data['rmemory']." KB";

        else if($data['result'] == "CE"){

            echo "<h2 style='color:blue;'>Compiler Error</h2>Time: ".$data['rtime']." ms<br>Memory: ".$data['rmemory']." KB<br>";
            print_r($data['message']);
        }
        else if($data['result'] == "RE"){

            echo "<h2 style='color:red;'>Runtime Error</h2>Time: ".$data['rtime']." ms<br>Memory: ".$data['rmemory']." KB<br>";
            print_r($data['message']);

        }

        else {
            LOGGER::ERROR("System Error");
            exit("System Error! Connect the system administrator, please.");
        }

        return ;
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

        $data = array();

        $result = $Judge->Compile();

        if($result != 0 ){
            /*
             *  Compiler Error 需要特殊处理;
             */
            $data['result'] = "CE";
            $data['message'] = $result;
            $data['rtime'] = 0;
            $data['rmemory'] = 0;
            return $data;
        }

        $data = $Judge->Run();
        if( $data['result'] == "Pre" ){

            if( $Judge->Check() == 4){
                $data['result'] = "AC";
            }else $data['result'] = "WA";
        }

        return $data;

    }

}

