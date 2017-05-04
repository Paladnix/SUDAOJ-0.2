<?php

/*
 *  默认入口:Index/index
 * 
 */
session_start();

// APP_PATH 项目的根目录
define ('APP_PATH', __DIR__.'/');

// 默认开启DEBUG模式
    define ('APP_DEBUG', true);

   define ('APP_DEBUG_FRA', true);


//define('JUDGE_DEBUG', true);
defined ('JUDGE_DEBUG') or define ( 'JUDGE_DEBUG', false);


// APP_URL 是本地项目的主目录
define ('APP_URL', 'http://115.28.164.8/OJ');

require './PHP_MVC/phpmvc.php';
