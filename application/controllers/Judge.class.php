<?php

class Judge
{
    var $rid;         // rid
    var $Code;        // 源文件
    var $Compiler;    // 编译器
    var $IN;          // 标准输入文件
    var $OUT;         // 标准输出文件
    var $User_out;    // 存放用户输出文件
    var $Compile_out; // 存放编译后可执行文件夹路径
    var $Pid;         // 题目编号
    var $Time;        // 时间限制
    var $Memory;      // 空间限制

    var $Exe;         // 编译后可执行文件完整路径
    var $Command;     // 代码运行命令

    function __construct($data)
    {
        $pid = $data['pid'];
        $rid = $data['rid'];
        $Code = $data['codeFileDir'].$data['codeFileName'];
        $Compiler = $data['compiler'];
        $IN = $data['IN'];
        $OUT = $data['OUT'];
        $Compile_out = $data['userExe'];
        $User_out = $data['userOut'];
        $Time = $data['timeLimit'];
        $Memory = $data['memoryLimit'];
    }

    /*
     * 编译的参数对java程序是必须的；因为要获取java的编译后的文件。 
     */
    function Compile( $codeFile )
    {
        $sh = "";

	    if( $Compiler == "g++" )
        {
            $Exe = $Compile_out.$rid;

            $sh = "g++ $Code -o $Exe"; 
        }
        else if( $Compiler == "javac" )
        {
            $sh = "javac $Code -d $Compile_out";

            // 截取java代码的类名以获得编译后可执行文件名；
            $len = strlen($codeFile) - strpos($codeFile, ".java");

            $sub = substr($codeFile, 0, $len);
           
            $Exe = $Compile_out.$sub;
        }
        else if( $Compiler == "python3" )
        {
            $sh = "mv $Code $Compile_out";

            $Exe = $Compile_out.$rid."py";
        }
        
        exec("$sh 2>&1", $result);
       
        if($result == "")
       
            return 0;
       
        else return $result;
    }

    function Run()
    {
        $sh = "";

        if( $Compiler == "g++" )
        {
            $Command = "";

            $sh = "sudo su judge ./Run_C.sh $IN $Command $Exe $User_out$rid.out $Time $Memory";
        }
        else if( $Compiler == "javac")
        {
            $Command = "java";

            $sh = "sudo su judge ./Run_Java.sh $IN $Command $Exe $User_out$rid.out $Time $Memory";
        }
        else if( $Compiler == "python3" )
        {
            $Command = "python3";

            $sh = "sudo su judge ./Run_Py.sh $IN $Command $Exe $User_out$rid.out $Time $Memory";
        }

        exec("$sh 2>&1", $result);

        // 成功运行，判断是否超时或超空间
        $Count = count($result);
        
        if( $Count == 1 )
            // 程序属于正常退出。
            $ret_str = $result[0];

        else $ret_str = $result[1];
        
        $len = strpos($result, " ");

        $ret_time = substr( $result, 0, $len-1 );
         
        $minutes = substr( $ret_time, 0, strpos($ret_time, ":") - 1 );
        $seconds = substr( $ret_time, strpos($ret_time, ":"), 2 );
        $msec = substr( $ret_time, strpos($ret_time, ".") );
        $time_use = ( $minutes * 60 + $seconds ) * 1000 + $msec * 10;

        $ret_memory = substr( $result, $len);

        $memory_use = $ret_memory;

        if( $memory_use >= $Memory )
        {
            return "Memory Limit Error";
        }
            
        if( $time_use >= $Time )
        {
            return "Time Limit Error";
        }

        if( $Count == 1 ) return "Y".$time_use.",".$memory_use;

        // 没有成功运行
        return "N".$result[0];
    }


    function Check()
    {
        $sh = " diff $IN $User_out$rid.out ";

        exec("$sh 2>&1", $result);

        if($result == "")

            return "Accepted";

        else return "Wrong Answer";
    }

?>
