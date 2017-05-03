<?php

class Judge
{
    protected $rid;         // rid
    protected $Code;        // 源文件
    protected $Compiler;    // 编译器
    protected $IN;          // 标准输入文件
    protected $OUT;         // 标准输出文件
    protected $User_out;    // 存放用户输出文件
    protected $Compile_out; // 存放编译后可执行文件夹路径
    protected $pid;         // 题目编号
    protected $Time;        // 时间限制
    protected $Memory;      // 空间限制
    protected $codeFile;

    protected $Exe;         // 编译后可执行文件完整路径
    protected $Command;     // 代码运行命令

    function __construct($data)
    {
        $this->pid = $data['pid'];
        $this->rid = $data['rid'];
        $this->Code = $data['codeFileDir'].$data['codeFileName'];
        $this->codeFile = $data['codeFileName'];
        $this->Compiler = $data['compiler'];
        $this->IN = $data['IN'];
        $this->OUT = $data['OUT'];
        $this->Compile_out = $data['userExeDir'];
        $this->User_out = $data['userOut'];
        $this->Time = $data['timeLimit'];
        $this->Memory = $data['memoryLimit'];
    }

    /*
     * 编译的参数对java程序是必须的；因为要获取java的编译后的文件。 
     */
    function Compile()
    {
        $sh = "";

	    if( $this->Compiler == "g++" )
        {
            $this->Exe = $this->Compile_out.$this->rid;

            $sh = "g++ $this->Code -o $this->Exe"; 
        }
        else if( $this->Compiler == "javac" )
        {
            $sh = "javac $this->Code -d $this->Compile_out";

            // 截取java代码的类名以获得编译后可执行文件名；
            //$len = strlen($codeFile) - strpos($codeFile, ".java");

            $sub = substr($this->codeFile, 0, -5);
           
            $this->Exe = $this->Compile_out.$sub;
        }
        else if( $this->Compiler == "python3" )
        {
            $sh = "mv $this->Code $this->Compile_out";

            $Exe = $this->Code;
        }
        
        $result = "";

        exec("$sh 2>&1", $result);
       
        if($result == "")
       
            return 0;
       
        else return $result;
    }

    function Run()
    {
        $sh = "";

        if( $this->Compiler == "g++" )
        {
            $sh = " ./Run_C.sh $this->IN  $this->Exe $this->User_out $this->Time $this->Memory";
        }
        else if( $this->Compiler == "javac")
        {
            $Command = "java";

            $sh = " ./Run_Java.sh $this->IN $Command $this->Exe $this->User_out $this->Time $this->Memory";
        }
        else if( $this->Compiler == "python3" )
        {
            $Command = "python3";

            $sh = " ./Run_Py.sh $this->IN $Command $this->Exe $this->User_out $this->Time $this->Memory";
        }

        exec("$sh 2>&1", $result);

        // 成功运行，判断是否超时或超空间
        $Count = count($result);
        
        if( $Count == 1 )
            // 程序属于正常退出。
            $ret_str = $result[0];

        else $ret_str = $result[1];
/*        
        $len = strpos($result, " ");

        $ret_time = substr( $result, 0, $len-1 );
         
        $minutes = substr( $ret_time, 0, strpos($ret_time, ":") - 1 );
        $seconds = substr( $ret_time, strpos($ret_time, ":"), 2 );
        $msec = substr( $ret_time, strpos($ret_time, ".") );
 */
        $mes = explode(" ", $ret_str);

        $time_use = $mes[0];

        $memory_use = $mes[1];

        if( $memory_use >= $this->Memory * 1024 )
        {
            return array("result" => "MLE", "rmemory" => $memory_use, "rtime" => $time_use);
        }
            
        if( $time_use >= $this->Time )
        { 
            return array("result" => "TLE", "rmemory" => $memory_use, "rtime" => $time_use);
        }

        if( $Count == 1 )

            return array("result" => "Pre", "rmemory" => $memory_use, "rtime" => $time_use);

        // 没有成功运行
        return array("result" => "RE", "rmemory" => $memory_use, "rtime" => $time_use, "message" => $result[1]);
    }


    function Check()
    {
        $sh = " diff $this->IN $this->User_out";

        exec("$sh 2>&1", $result);

        if($result == "")

            return 4; // AC

        else return 7; // WA
    }

?>
