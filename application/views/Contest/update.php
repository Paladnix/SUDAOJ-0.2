
<?php if( isset($_SESSION['username']) && $_SESSION['username'] == $vars['author'] ) { ?>
<!-- Big Modal -->
<div class="modal fade" id="updateModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel_submit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- header  -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_submit">  <?php echo $vars['cname'] ?></h4>
            </div>
            <!-- Body -->
            <div class="modal-body login">
                <h2 id="result"></h2>
                <p id="message"> 不做填写的项默认不变</p>
                <div class="login-form ">
                    <form class="form form-horizontal" role="form" id="proForm" action="<?php echo APP_URL."/contest/update"?>" method="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">比赛名称</label>
                            <div class="col-lg-10">
                                <input type="name" placeholder="2016 新生赛-1" class="form-control" name="cname" value="<?php echo $vars['cname'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">开始时间</label>
                            <div class="col-lg-10">
                                <input type="datetime-local" placeholder="" class="form-control" name="timeStart" value="<?php echo substr(str_replace(" ", "T", $vars['timeStart']), 0, -3); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">结束时间</label>
                            <div class="col-lg-10">
                                <input type="datetime-local" placeholder="" class="form-control" name="timeEnd" value="<?php echo substr(str_replace(" ", "T", $vars['timeEnd']),0, -3); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">密码</label>
                            <div class="col-lg-10">
                                <input type="" placeholder="不填写即无密码" class="form-control" name="password" value="<?php echo $vars['password'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">比赛说明</label>
                            <div class="col-lg-10">
                                <textarea type="text" class="form-control" style="height:150px" name="introduction" id="introduction" value="<?php echo $vars['introduction']; ?>"></textarea>
                            </div>
                        </div>
                        <input type="hidden" class="login-field" placeholder="" name="cid" value="<?php echo $vars['cid'] ?>" /> 
                        <div class="form-group login-pos">
                            <button id="" type="submit" class="btn btn-primary-alt btn-block">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

