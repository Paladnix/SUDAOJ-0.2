
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>SUDA Online Judge</title>
        <meta charset="utf-8">
        <meta name="description" content="Soochow University Online Judge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <link rel="icon" href="<?php echo APP_URL ?>/images/logo.png" type="image/x-icon">

        <!-- main page styles -->

        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/bootstrap-theme.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/style.css">

        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/page.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/theme.css">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/google-code-prettify/prettify.css" />

        <script>window.PAGE_TYPE = "<?php echo PAGE_TYPE ?>"</script>
    </head>

    <body class="docs" onload="prettyPrint()">

        <div id="mobile-bar"  >
            <a class="menu-button"></a>
            <a class="logo" href="<?php echo APP_URL ?>/"></a>
        </div>

        <div id="header">
            <a id="logo" href="<?php echo APP_URL ?>/">
                <img src="<?php echo APP_URL ?>/images/logo.png">
                <span>Online Judge</span>
            </a>
            <ul id="nav">
                <li>
                    <form id="search-form">
                        <input type="text" id="search-query-nav" class="search-query st-default-search-input">
                    </form>
                </li>

                <li><a href="<?php echo APP_URL ?>/" class="nav-link <?php if($controller == "Index") echo "current";?>">Home</a></li>
                <li><a href="<?php echo APP_URL ?>/contest/" class="nav-link <?php if($controller == "Contest") echo "current";?>">Contest</a></li>
                <li><a href="<?php echo APP_URL ?>/problem/" class="nav-link <?php if($controller == "Problem") echo "current";?>">Problem</a></li>
                <li><a href="<?php echo APP_URL ?>/guide/" class="nav-link <?php if($controller == "Guide") echo "current";?>">Guide</a></li>

            <?php if( isset( $_SESSION['username'] ) ) { ?>
                <li class="nav-dropdown-container">
                    <a class="nav-link <?php if($controller == "User") echo "current";?>"><?php echo $_SESSION['username'] ?><span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="<?php echo APP_URL ?>/user/profile" class="nav-link ">Your Profile</a></li>
                        <li><a href="<?php echo APP_URL ?>/user/message/" class="nav-link" >Your Message</a></li>
                        <li><a href="<?php echo APP_URL ?>/user/logout" class="nav-link" >Logout</a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><a href="#registerModal" class="nav-link" data-toggle="modal" data-target="#registerModal" role="button">Register</a></li>
                <li><a href="#loginModal" class="nav-link" data-toggle="modal" data-target="#loginModal" role="button" >Login</a></li>
            <?php } ?>

 




            <?php /*
                <li class="nav-dropdown-container ecosystem">
                    <a class="nav-link">生态系统</a><span class="arrow"></span>
                    <ul class="nav-dropdown">
                        <li><h4>帮助</h4></li>
                        <li><ul>
                                <li><a href="http://forum.vuejs.org" class="nav-link" target="_blank">论坛</a></li>
                                <li><a href="https://gitter.im/vuejs/vue" class="nav-link" target="_blank">聊天室</a></li>
                                <li><a href="https://github.com/vuejs-templates" class="nav-link" target="_blank">模板</a></li>
                            </ul></li>
                            <li><h4>信息</h4></li>
                            <li><ul>
                                    <li><a href="https://twitter.com/vuejs" class="nav-link" target="_blank">Twitter</a></li>
                                    <li><a href="https://medium.com/the-vue-point" class="nav-link" target="_blank">博客</a></li>
                                    <li><a href="https://vuejobs.com/?ref=vuejs" class="nav-link" target="_blank">工作</a></li>
                                </ul></li>
                                <li><h4>核心插件</h4></li>
                                <li><ul>
                                        <li><a href="https://router.vuejs.org/" class="nav-link" target="_blank">Vue Router</a></li>
                                        <li><a href="https://vuex.vuejs.org/" class="nav-link" target="_blank">Vuex</a></li>
                                    </ul></li>
                                    <li><h4>资源列表</h4></li>
                                    <li><ul>
                                            <li><a href="https://github.com/vuejs" class="nav-link" target="_blank">官方仓库</a></li>
                                            <li><a href="https://github.com/vuejs/awesome-vue" class="nav-link" target="_blank">Vue 资源</a></li>
                                        </ul></li>
                    </ul>
                </li>
                <li class="nav-dropdown-container language">
                    <a class="nav-link">多语言</a><span class="arrow"></span>
                    <ul class="nav-dropdown">
                        <li><a href="https://cn.vuejs.org/" class="nav-link" target="_blank">中文</a></li>
                        <li><a href="https://vuejs.org/" class="nav-link" target="_blank">English</a></li>
                        <li><a href="https://jp.vuejs.org/" class="nav-link" target="_blank">日本語</a></li>
                        <li><a href="https://ru.vuejs.org/" class="nav-link" target="_blank">Русский</a></li>
                        <li><a href="https://kr.vuejs.org/" class="nav-link" target="_blank">한국어</a></li>
                    </ul>
                </li>
                */ ?>
            </ul>
        </div>
 

<!-- Button trigger modal -->
<!-- Big Modal -->
<div class="modal fade " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <!-- header  -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">User Login</h4>
      </div>
      <!-- Body -->
      <div class="modal-body login">
          <div class="login-form ">
            <form role="form" action="<?php echo APP_URL."/user/login"?>" method="post">
            <div class="form-group">
              <input type="text" class="login-field" value="" placeholder="Enter your username" name="username" />
            </div>

            <div class="form-group">
              <input type="password" class="login-field" value="" placeholder="Password" name="password" />
            </div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary-alt btn-block">Login</button>
			</div>
            </form>
            <a class="login-link" href="<?php echo APP_URL?>/user/lostpw">Lost your password?</a>
          </div>
      </div>
      <!-- Footer -->
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
        -->
    </div>
  </div>
</div>


<!-- Big Modal -->
<div class="modal fade " id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <!-- header  -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">User Register</h4>
      </div>
      <!-- Body -->
      <div class="modal-body login">
          <div class="login-form">
            <form role="form" action="<?php echo APP_URL."/user/register/"?>" method="post" onsubmit="return checkForm()">

            <div class="form-group">
              <input type="text" class="login-field" value="" placeholder="Enter your truename" name="truename" />
            </div>
            <div class="form-group">
              <input type="text" class="login-field" value="" placeholder="Enter your username/nickname" name="username" required="required"/>
            </div>
            <div class="form-group">
              <input type="password" class="login-field" value="" placeholder="Password" name="password" required="required" id="password"/>
            </div>
            <div class="form-group">
              <input type="password" class="login-field" value="" placeholder="Repeat Password" name="passwordrepeat" /required="required" id="passwordrepeat">
            </div>

            <div class="form-group">
              <input type="text" class="login-field" value="" placeholder="Enter your E-mail" name="email" required="required"/>
            </div>
            <div class="form-group">
              <input type="text" class="login-field" value="" placeholder="Enter your telephone" name="tel" />
            </div>
			<div class="radio-custom radio-primary">
			    <input type="radio" id="radioSex1" name="sex" value="male">
				<label for="radioSex1">Male</label>
			</div>
			<div class="radio-custom radio-primary">
			    <input type="radio" id="radioSex2" name="sex" value="female">
				<label for="radioSex2">Female</label>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary-alt btn-block">Register</button>
			</div>
            </form>
          </div>
      </div>
      <!-- Footer -->
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
        -->
    </div>
  </div>
</div>


        <div id="main" class="fix-sidebar">


            <div class="sidebar">
                <ul class="main-menu">
                
                <li>
                    <form id="search-form">
                        <input type="text" id="search-query-nav" class="search-query st-default-search-input">
                    </form>
                </li>

                <li><a href="<?php echo APP_URL ?>/" class="nav-link <?php if($controller == "Index") echo "current";?>">Home</a></li>
                <li><a href="<?php echo APP_URL ?>/contest/" class="nav-link <?php if($controller == "Contest") echo "current";?>">Contest</a></li>
                <li><a href="<?php echo APP_URL ?>/problem/" class="nav-link <?php if($controller == "Problem") echo "current";?>">Problem</a></li>
                <li><a href="<?php echo APP_URL ?>/guide/" class="nav-link <?php if($controller == "Guide") echo "current";?>">Guide</a></li>

            <?php if( isset( $_SESSION['username'] ) ) { ?>
                <li class="nav-dropdown-container">
                    <a class="nav-link <?php if($controller == "User") echo "current";?>"><?php echo $_SESSION['username'] ?><span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="<?php echo APP_URL ?>/user/profile" class="nav-link ">Your Profile</a></li>
                        <li><a href="<?php echo APP_URL ?>/user/message/" class="nav-link" >Your Message</a></li>
                        <li><a href="<?php echo APP_URL ?>/user/logout" class="nav-link" >Logout</a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><a href="#registerModal" class="nav-link" data-toggle="modal" data-target="#registerModal" role="button">Register</a></li>
                <li><a href="#loginModal" class="nav-link" data-toggle="modal" data-target="#loginModal" role="button" >Login</a></li>
            <?php } ?>

 
 
                </ul>
