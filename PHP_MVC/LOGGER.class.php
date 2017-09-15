<?php 

class LOGGER{

    public static $LogFile = LOG_PATH."localhost.log";

    public static function DateFormat(){
        return "[".date('Y-m-d H:i:s')."]";
    }

    public static function ERROR( $data ){
        $content = "[ERROR]".LOGGER::DateFormat().": ".$data."\n";
        file_put_contents(self::$LogFile, $content, FILE_APPEND);
    }

    public static function DEBUG( $data ){
        $content = "[DEBUG]".LOGGER::DateFormat().": ".$data."\n";
        file_put_contents(self::$LogFile, $content, FILE_APPEND); 
    }

    public static function INFO( $data ){
        $content = "[INFO]".LOGGER::DateFormat().": ".$data."\n";
        file_put_contents(self::$LogFile, $content, FILE_APPEND); 
    }
}
