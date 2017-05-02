
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
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/font-awesome.min.css">

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
                <li class="nav-dropdown-container">
                    <a href="<?php echo APP_URL ?>/contest/" class="nav-link <?php if($controller == "Contest") echo "current";?>">Contest<span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="#createConModal" class="nav-link" data-toggle="modal" data-target="#createConModal" role="button">New Contest</a></li>
                        <li><a href="<?php echo APP_URL ?>/contest/my/" class="nav-link" >My Contest</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown-container">
                    <a href="<?php echo APP_URL ?>/problem/" class="nav-link <?php if($controller == "Problem") echo "current";?>">Problem<span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="#createProModal" class="nav-link" data-toggle="modal" data-target="#createProModal" role="button">New Problem</a></li>
                    </ul>
                </li>
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
            <div class="form-group"><div class="pos">
              <input type="text" class="login-field" value="" placeholder="Enter your username" name="username" />
            </div></div>

            <div class="form-group "><div class="pos">
              <input type="password" class="login-field" value="" placeholder="Password" name="password" />
            </div></div>

			<div class="form-group login-pos">
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

            <div class="form-group"><div class="pos">
              <input type="text" class="login-field" value="" placeholder="Enter your truename" name="truename" />
            </div></div>
            <div class="form-group"><div class="pos">
              <input type="text" class="login-field" value="" placeholder="Enter your username/nickname" name="username" required="required"/>
            </div></div>
            <div class="form-group"><div class="pos">
              <input type="password" class="login-field" value="" placeholder="Password" name="password" required="required" id="password"/>
            </div></div>
            <div class="form-group"><div class="pos">
              <input type="password" class="login-field" value="" placeholder="Repeat Password" name="passwordrepeat" /required="required" id="passwordrepeat" />
            </div></div>

            <div class="form-group"><div class="pos">
              <input type="text" class="login-field" value="" placeholder="Enter your E-mail" name="email" required="required"/>
            </div></div>
            <div class="form-group"><div class="pos">
              <input type="text" class="login-field" value="" placeholder="Enter your telephone" name="tel" />
            </div></div>
			<div class="radio-custom radio-primary radio-pos"><div class="pos">
			    <input type="radio" id="radioSex1" name="sex" value="male"/>
				<label for="radioSex1">Male</label>
			</div></div>
			<div class="radio-custom radio-primary radio-pos"><div class="pos">
			    <input type="radio" id="radioSex2" class="" name="sex" value="female" />
				<label for="radioSex2">Female</label>
			</div></div>
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



<!-- New problem -->
<div class="modal fade " id="createProModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!-- header  -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Problem</h4>
      </div>
      <!-- Body -->
      <div class="modal-body login">
          <div class="login-form">
            <form class="form-horizontal" method="POST" action="<?php echo APP_URL."/problem/create"?>" enctype="multipart/form-data" onsubmit="return text_html()">

				<div class="form-group">
					<label class="col-lg-2 control-label">题目名称</label>
					<div class="col-lg-10">
						<input type="name" placeholder="" class="form-control" name="pname" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">时限(C++)</label>
					<div class="col-lg-10">
						<input type="number" placeholder="毫秒" class="form-control" name="timeLimit" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">内存限制</label>
					<div class="col-lg-10">
						<input type="memory" placeholder="MB" class="form-control" name="memoryLimit" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">出题人</label>
					<div class="col-lg-10">
						<input type="memory" placeholder="" class="form-control" name="author" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">题目类型</label>
					<div class="col-lg-10">
						<input type="memory" placeholder="多个类型请用#隔开" class="form-control" name="tag" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">题目描述</label>
					<div class="col-lg-10">
						<textarea type="text" class="form-control" style="height:150px" name="discription" id="discription"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Input</label>
					<div class="col-lg-10">
						<textarea type="text"  class="form-control" style="height:100px" name="input" id="input"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Output</label>
					<div class="col-lg-10">
						<textarea type="text" class="form-control" style="height:100px" name="output"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Sample Input</label>
					<div class="col-lg-10">
						<textarea type="text"  class="form-control" style="height:100px" name="inputCase"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Sample Output</label>
					<div class="col-lg-10">
						<textarea type="text" class="form-control"style="height:100px" name="outputCase"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-2 control-label">读入文件</label>
					<div class="col-lg-10">
						<input type="file" class="" name="fileIN">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">输出文件</label>
					<div class="col-lg-10">
						<input type="file"  class="" name="fileOUT">
					</div>
				</div>
                <input type="hidden" name="visable" value="1"/>
			<div class="form-group">
				<button type="submit" class="btn btn-primary-alt btn-block">Submit</button>
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


<div class="modal fade " id="createConModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!-- header  -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Contest</h4>
      </div>
      <!-- Body -->
      <div class="modal-body login">
          <div class="login-form">
            <form class="form-horizontal" method="POST" action="<?php echo APP_URL."/contest/create"?>" enctype="multipart/form-data" onsubmit="return checkForm()">
				<div class="form-group">
					<label class="col-lg-2 control-label">比赛名称</label>
					<div class="col-lg-10">
						<input type="name" placeholder="2016 新生赛-1" class="form-control" name=cname>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">开始时间</label>
					<div class="col-lg-10">
						<input type="datetime-local" placeholder="" class="form-control" name=timeStart>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">结束时间</label>
					<div class="col-lg-10">
						<input type="datetime-local" placeholder="" class="form-control" name=timeEnd>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">密码</label>
					<div class="col-lg-10">
						<input type="ID" placeholder="不填写即无密码" class="form-control" name=password>
					</div>
				</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary-alt btn-block">Submit</button>
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
                <li class="nav-dropdown-container">
                    <a href="<?php echo APP_URL ?>/contest/" class="nav-link <?php if($controller == "Contest") echo "current";?>">Contest<span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="#createConModal" class="nav-link" data-toggle="modal" data-target="#createConModal" role="button">New Contest</a></li>
                        <li><a href="<?php echo APP_URL ?>/contest/my/" class="nav-link" >My Contest</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown-container">
                    <a href="<?php echo APP_URL ?>/problem/" class="nav-link <?php if($controller == "Problem") echo "current";?>">Problem<span class="arrow"></span></a>
                    <ul class="nav-dropdown">
                        <li><a href="#createProModal" class="nav-link" data-toggle="modal" data-target="#createProModal" role="button">New Problem</a></li>
                    </ul>
                </li>
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
