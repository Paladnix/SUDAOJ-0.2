<?php 

class UserController extends Controller{

    public function index(){

        define('PAGE_TYPE', 'guide');
        $this->assign('error', '暂时没有页面');

        $this->render('index');
    }


    public function error( $e ){

        $this->assign('error', $e);
        define('PAGE_TYPE', 'guide');

        $this->render('error');
    }


    public function register()
    {
        $data = array();

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {   
        	$data['truename'] = $_POST["truename"];
        	$data['username'] = $_POST["username"];
        	$data['password'] = $_POST["password"];
        	$data['email'] = $_POST["email"];
        	$data['tel'] = $_POST["tel"];
        	$data['sex'] = $_POST["sex"];
        }
        else {
            LOGGER::ERROR("The service has not got message from the http url by the method of POST.");
            exit("System Error! Connect the system administrator, please.");
        }

        $result = (new UserModel)->add( $data );

        if($result == 1){

            $_SESSION['username'] = $data['username'];

            header("Location:".APP_URL);

        }
        else $this->error("注册失败，用户名已被注册");
    }

    public function login()
    {
        $data = array();

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
        }
        else {
            LOGGER::ERROR("The service has not got message from the http url by the method of POST.");
            exit("System Error! Connect the system administrator, please.");
        }
        
        $tmp_data = array();
        $tmp_data['username'] = $data['username'];

        $result = (new UserModel)->select($tmp_data);

        if( $result == array() ){

            $this->error("用户不存在，请先注册");

        }else {
            
            foreach($result as $row)
                if( $row['password'] == $data['password'] )
                {
                    $_SESSION['username'] = $data['username'];

                    header("Location:".APP_URL);
                }
                else $this->error("密码错误");
        }
        return ;
    }
    public function logout(){

        unset($_SESSION['username']);

        header("Location:".APP_URL);
    }

    public function lostpw(){

        $this->error("Coding...");
    }


    public function profile(){

        $this->error("Coding...");
    }


    public function message(){

        $this->error("Coding...");
    }
}

