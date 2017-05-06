
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
            <form id="CrtProForm" class="form-horizontal" method="POST" action="<?php if(isset($vars['cid'])) echo APP_URL."/problem/create"; else echo APP_URL."/problem/create";?>" enctype="multipart/form-data" onsubmit="return text_html()">

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
						<input type="name" placeholder="" class="form-control" name="author" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">题目类型</label>
					<div class="col-lg-10">
						<input type="name" placeholder="多个类型请用#隔开" class="form-control" name="tag" />
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
                <?php if(isset($vars['cid'])) { ?>
                    <input type="hidden" name="visable" value="0"/>
                    <input type="hidden" name="cid" value="<?php echo $vars['cid']?>"/>
                <?php } else {?>
                    <input type="hidden" name="visable" value="1"/>
                <?php } ?>
            <div class="form-group">
                <?php if(isset($vars['cid'])) { ?>
				    <!-- <button type="button" id="ConProSub" class="btn btn-primary-alt btn-block">Submit</button> -->
				    <button type="submit" id="" class="btn btn-primary-alt btn-block">Submit</button>
                <?php } else {?>
				    <button type="submit" id="" class="btn btn-primary-alt btn-block">Submit</button>
                <?php } ?>
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
