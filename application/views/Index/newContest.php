
<div class="modal fade " id="createConModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!-- header  -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php if(isset($vars['cid'])) echo $vars['cname']; else echo "Create New Contest"; ?></h4>
      </div>
      <!-- Body -->
      <div class="modal-body login">
          <div class="login-form">
            <form id="conForm" class="form-horizontal" method="POST" action="<?php if(isset($vars['cid'])) echo APP_URL."/contest/update/cid=".$vars['cid'] ; else echo APP_URL."/contest/create"?>" enctype="multipart/form-data" onsubmit="return text_html()">
				<div class="form-group">
					<label class="col-lg-2 control-label">比赛名称</label>
					<div class="col-lg-10">
                    <input type="name" placeholder="2016 新生赛-1" class="form-control" name="cname" value="<?php if(isset($vars['cid'])) echo $vars['cname'] ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">开始时间</label>
					<div class="col-lg-10">
						<input type="datetime-local" placeholder="" class="form-control" name="timeStart" value="<?php if(isset($vars['cid'])) echo substr(str_replace(" ", "T", $vars['timeStart']), 0, -3); ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">结束时间</label>
					<div class="col-lg-10">
						<input type="datetime-local" placeholder="" class="form-control" name="timeEnd" value="<?php if(isset($vars['cid'])) echo substr(str_replace(" ", "T", $vars['timeEnd']),0, -3); ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">密码</label>
					<div class="col-lg-10">
                    <input type="" placeholder="不填写即无密码" class="form-control" name="password" value="<?php if(isset($vars['cid'])) echo $vars['password']; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">比赛说明</label>
					<div class="col-lg-10">
						<textarea type="text" class="form-control" style="height:150px" name="introduction" id="introduction" value="<?php echo $vars['introduction']; ?>"></textarea>
					</div>
				</div>
                <input type="hidden" name="author" value="<?php echo $_SESSION['username'];?>"/>
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
