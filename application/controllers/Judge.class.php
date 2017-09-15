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
            $sh = "mv $this->Code $this->Compile_out$this->rid";

            $this->Exe = $this->Compile_out.$this->rid;
        }

        if( JUDGE_DEBUG ) LOGGER::DEBUG($sh);

        $result = "";

        exec("$sh 2>&1", $result);

        if (JUDGE_DEBUG ) LOGGER::DEBUG($result);

        if($result == array() )

            return 0;

        else return $result;
    }

    function Run()
    {
        $sh = "";
        $Mem = $this->Memory * 3;

        if( $this->Compiler == "g++" )
        {
            $sh = "".APP_PATH."application/controllers/Run_C.sh $this->IN  $this->Exe $this->User_out $this->Time $Mem";
        }
        else if( $this->Compiler == "javac")
        {
            $Command = "java";

            $sh = APP_PATH."application/controllers/Run_Java.sh $this->IN $Command $this->Exe $this->User_out $this->Time $Mem";
        }
        else if( $this->Compiler == "python3" )
        {
            $Command = "python3.5";

            $sh = APP_PATH."application/controllers/Run_Py.sh $this->IN $Command $this->Exe $this->User_out $this->Time $Mem";
        }
        if(JUDGE_DEBUG) LOGGER::DEBUG($sh);

        exec("$sh 2>&1", $result);
        if(JUDGE_DEBUG)
            LOGGER::DEBUG($result);
        // 成功运行，判断是否超时或超空间
        $Count = count($result);

        if( $Count == 1 )
            // 程序属于正常退出。
            $ret_str = $result[0];

        else $ret_str = $result[1];

        $mes = explode(" ", $ret_str);

        $ti = explode(":", $mes[0]);
        $minutes = $ti[0];
        $ti = explode(".", $ti[1]);
        $seconds = $ti[0];
        if(isset($ti[1]))
            $msec = $ti[1];
        else $msec = 0;

        $time_use = $minutes*60*1000 + $seconds*1000 + $msec*10;

        if(isset($mes[1]))
            $memory_use = $mes[1];
        else $memory_use = 0;
        
        if(JUDGE_DEBUG) LOGGER::DEBUG($memory_use);

        if( $memory_use >= $this->Memory )
        {
            return array("result" => "MLE", "rmemory" => $memory_use, "rtime" => $time_use);
        }

        if( $time_use >= $this->Time*1000 )
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
        $sh = " diff $this->OUT $this->User_out";

        if(JUDGE_DEBUG)
            LOGGER::DEBUG($sh);

        exec("$sh 2>&1", $result);

        if(JUDGE_DEBUG)
            LOGGER::DEBUG($result);
        if($result == array())

            return 4; // AC

        else return 7; // WA
    }
}
