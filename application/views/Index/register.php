
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
              <input type="email" class="login-field" value="" placeholder="Enter your E-mail" name="email" required="required"/>
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
