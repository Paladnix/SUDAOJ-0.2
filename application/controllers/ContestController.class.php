<?php 

class ContestController extends Controller{

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
            $data['cname'] = $_POST["cname"];
            $data['timeStart'] = str_replace("T", " ", $_POST["timeStart"]);
            $data['timeEnd'] = str_replace("T", " ", $_POST["timeEnd"]);
            $data['password'] = $_POST["password"];
            $data['author'] = $_POST["author"];
            $data['introduction'] = $_POST["introduction"];

        }
        else {
            LOGGER::ERROR("The service has not got message from the http url by the method of POST.");
            exit("System Error! Connect the system administrator, please.");
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

    public function update( $params ){

        $where = array();

        foreach($params as $param){

            $tmp = explode("=", $param);

            $where[$tmp[0]] = $tmp[1];

        }

        $data = array();

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {   
            $data['cname'] = $_POST["cname"];
            $data['timeStart'] = str_replace("T", " ", $_POST["timeStart"]);
            $data['timeEnd'] = str_replace("T", " ", $_POST["timeEnd"]);
            $data['password'] = $_POST["password"];
            $data['author'] = $_POST["author"];
            $data['introduction'] = $_POST["introduction"];

        }
        else {
            LOGGER::ERROR("The service has not got message from the http url by the method of POST.");
            exit("System Error! Connect the system administrator, please.");
        }

        $result = (new ContestModel)->update( $data , $where);

        if( $result == 0 ) {

            $this->error("更新失败, 如果未作改动请忽略此消息");
            return ;

        } 

        $params[] = sprintf("cid=%s", $where['cid'] );

        $this->show($params);

    }

    private function assignContest($result){

        $flag = 0;
        foreach($result as $row){
            if( $row['password'] != "" && (!isset($_SESSION['cid'])  || $_SESSION['cid']!=$row['cid'])){
                $flag = 1;
            }
            foreach($row as $key => $value){

                if($key == "problem"){

                    if( $value != "#"){

                        $tmp = explode("#", $value);
                        $tmp = array_filter( $tmp );

                        if( APP_DEBUG ) LOGGER::DENUG($tmp);

                        $problems = array();

                        foreach($tmp as $pid){

                            $data = array("pid" => $pid);

                            $presult = (new ProblemModel)->select($data);

                            if( APP_DEBUG ) LOGGER::DEBUG($presult);

                            $problems[$pid]  = array("pname" => $presult[0]['pname']);

                            $problems[$pid]['status'] = "unsubmited";
                            if(isset($_SESSION['username'])){

                                $data = array("pid" => $pid, "cid" => $_SESSION['cid'], "username" => $_SESSION['username']);
                                $presult = (new StatusModel)->select($data);

                                if($presult != array())
                                    $problems[$pid]['status'] = "submited";
                                foreach($presult as $srow){
                                    if($srow['status'] == "AC")
                                        $problems[$pid]['status'] = "accepted";
                                }
                            }
                            if(isset($_SESSION['cid'])){ 
                                $data = array("pid" => $pid, "cid" => $_SESSION['cid']);
                                $presult = (new StatusModel)->select($data);

                                $problems[$pid]['submited'] = 0;
                                $problems[$pid]['accepted'] = 0;
                                foreach($presult as $srow){
                                    if($srow['status'] == "AC")
                                        $problems[$pid]['accepted']++;
                                    $problems[$pid]['submited']++;
                                }
                            }
                        }
                        $this->assign("problems", $problems);
                    }
                }
                else
                {
                    $value = str_replace("\n", "<br>", $value);
                    $this->assign($key, $value);
                }
            }
        }
        if($flag == 1){
            $this->render("login");
            return false;
        }
        return true;
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

        if( $this->assignContest($result))
        {
            $now = date("y-m-d H:i:s");
            $timeStart = $result[0]['timeStart'];
            if( strtotime($now) < strtotime($timeStart) )
                $this->render("waiting");
            else $this->render("show");
        }

    }


    public function showProblem($params){

        $data = array();
        $where = array();

        foreach($params as $param){

            $tmp = explode("=", $param);
            if($tmp[0] == "pid")
                $data[$tmp[0]] = $tmp[1];
            else 
                $where[$tmp[0]] = $tmp[1];

        }

        $this->assign('cid', $where['cid']);
        $result = (new ProblemModel)->select($data);

        if($result == array()){

            echo "没有这个题目";
            return ;
        }

        foreach($result as $row){

            foreach($row as $key => $value){

                $value = str_replace("\n", "<br>", $value);
                $this->assign($key, $value);
            }
        }

        $result = (new ContestModel)->select($where);
        if($result == array()){

            echo "没有这个题目";
            return ;
        }

        if($this->assignContest($result))
            $this->render("showProblem");

        return ;

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

        if(APP_DEBUG) LOGGER::DEBUG($result);

        $this->assign("row", $result);

        $this->render("archive");

    }

    public function rmProblem($params){

        $data = array();
        $where = array();

        foreach($params as $param){

            $tmp = explode("=", $param);
            if($tmp[0] == "pid")
                $data[$tmp[0]] = $tmp[1];
            else 
                $where[$tmp[0]] = $tmp[1];

        }
        if(APP_DEBUG) LOGGER::DEBUG($data);
        if(APP_DEBUG) LOGGER::DEBUG($where);

        $result = (new ContestModel)->rmProblem($data, $where); 

        if($result == 0){

            $this->error("删除题目失败");
            return ;
        }
        return ;
    }

    public function showStatus($params){

        $data = array();
        $where = array();

        foreach($params as $param){

            $tmp = explode("=", $param);
            $where[$tmp[0]] = $tmp[1];

        }

        $result = (new StatusModel)->select($where);

        if($result == array()){
            $this->error("没有这个条件的提交记录");
            return ;
        } 
        $this->assign("result", $result);

        $result = (new ContestModel)->select($where);
        if($this->assignContest($result))
            $this->render("showStatus");

    }
    private function calTimeUsed($time1, $time2){
        // 计算时间差，单位：s 
        $y1 = strtotime($time1);
        $y2 = strtotime($time2);
        return  ceil($y1-$y2);
    }

    public function showRank($params){
        $data = array();
        $where = array();

        foreach($params as $param){
            $tmp = explode("=", $param);
            $where[$tmp[0]] = $tmp[1];
        }
        // 先找到有多少道题目，按照题目先后顺序。
        $result = (new ContestModel)->select($where);
        if($result == array()){
            $this->error('没有找到相应条件的比赛');
            return ;
        }
        $this->assignContest($result);
        foreach($result as $row){
            $startTime = $row['timeStart'];
            $problems = explode('#', $row['problem']);
            $problems = array_filter( $tmp );
        }
        $result = (new StatusModel)->select($where);
        if($result == array()){
            $this->error("没有这个条件的提交记录");
            return ;
        } 
        $FirstBlood = array();
        $Sum = array();
        foreach($result as $row){
            $username = $row['username'];
            if( !isset($Sum[$username]) ){
                $Sum[$username]=  array();
                $Sum[$username]['cost'] = 0;
            }
            $pid = $row['pid'];
            $sec = $this->calTimeUsed($row['submitTime'], $startTime);
            $hours = floor($sec/3600);
            $sec -= $hours*3600;
            $mins = floor( $sec/60 );
            $sec -= $mins * 60;
            $Sum[$username][$pid]['submitTime'] = $hours.":".$mins.":".$sec;
            if(isset($Sum[$username][$pid]['submitCount']))
                $Sum[$username][$pid]['submitCount']++;
            else $Sum[$username][$pid]['submitCount'] = 1;
            if($row['status'] == "AC"){
                if(!isset($Sum[$username][$pid]['status']) || $Sum[$username][$pid]['status'] == "NO"){
                    $Sum[$username][$pid]['status'] = "YES";
                    $Sum[$username]['cost'] += floor($this->calTimeUsed($row['submitTime'], $startTime)/60) + ($Sum[$username][$pid]['submitCount']-1)*20; 
                }
            }else if( !isset($Sum[$username][$pid]['status']) || $Sum[$username][$pid]['status'] == "NO" )
                $Sum[$username][$pid]['status'] = "NO";
            if( !isset($FirstBlood[$pid]) ){
                $FirstBlood[$pid] = $username;
            }

        }

        $this->assign('Sum', $Sum);
        $this->assign('FirstBlood', $FirstBlood);
        $this->render("showRank");

    }
    public function login($params){

        $data = array();
        $where = array();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $where['cid'] = $_POST['cid'];
            $data['password'] = $_POST['password'];
        }

        $result = (new ContestModel)->select($where);
        foreach($result as $row)
            if($row['password'] == $data['password']){
                $_SESSION['cid'] = $row['cid'];
                header("Location:".APP_URL."/contest/show/cid=".$where['cid']);
            }
        $this->error("密码错误");
        return ;
    }
}

