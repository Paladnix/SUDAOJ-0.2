
<!-- Big Modal -->
<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_submit">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <!-- header  -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_submit">Submit code for Pro : <?php echo $vars['pname'] ?></h4>
            </div>
            <!-- Body -->
            <div class="modal-body login">
                <h2 id="result"></h2>
                <p id="message"></p>
                <div class="login-form ">
                <form role="form" id="proForm"   enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="pos">
                                <select name="compiler">
                                    <option value="g++" selected="selected">g++ 5.4</option>
                                    <option value="javac">javac 1.8</option>
                                    <option value="python3">python3 </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pos">
                                <input type="file" class="login-field"  placeholder="" name="file" />
                                <input type="hidden" class="login-field" placeholder="" name="pid" id="p" value="<?php echo $vars['pid'] ?>" />
                                <input type="hidden" class="login-field" placeholder="" name="username" value="<?php echo $_SESSION['username'] ?>" />
                                <?php if(isset($vars['cid']) && $vars['cid']!=0){ ?>
                                    <input type="hidden" class="login-field" placeholder="" name="cid" value="<?php echo $vars['cid'] ?>" /> 
                                <?php } ?> 
                            </div>
                        </div>
                        <div class="form-group login-pos">
                            <button id="submit" type="button" class="btn btn-primary-alt btn-block">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
    $("#submit").click(function(){
        var form = new FormData(document.getElementById("proForm"));

        $.ajax({
        url: "<?php echo APP_URL ?>/problem/submit/",
            type: "POST",
            data: form,
            contentType:false,
            processData:false,
            success: function(data){
                //alert(data);
                $("#result").html(data);
            },
            error: function(e){
                alert('Failed');
                $("#result").html = "连接错误，请刷新后重试";
            }
        });
  });
});
</script>
