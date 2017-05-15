
<!-- Right Side -->
<div class="content guide with-sidebar index-guide">

<div class="container">
<div class="row">
<div class="col-md-5">
    <form class="form form-horizontal" role="form" action="<?php echo APP_URL."/contest/login"?>" method="POST">
        <h1 class="lead text-muted"><?php echo $vars['cname']?></h1>
        <div class="form-group">
            <label class="col-lg-2 control-label">密码</label>
            <div class="col-lg-7">
                <input type="password" placeholder="" class="form-control" name="password" />
                <input type="hidden" class="login-field" placeholder="" name="cid" value="<?php echo $vars['cid'] ?>" /> 
            </div>
            <button id="" type="submit" class="col-lg-3 btn btn-primary-alt">submit</button>
        </div>
    </form>
</div>
</div>
</div>
</div>

