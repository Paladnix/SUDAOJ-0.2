

<!-- Right Side -->
<div class="content guide with-sidebar index-guide">

    <h1 id="title" class="middle"><?php echo $pname ?></h1>    
    <div class="list">
        <ul class="menu-root">
            <li><strong>Time:    </strong> <?php echo $timeLimit ?> ms</li>
            <li><strong>Memory:  </strong><?php echo $memoryLimit ?>MB </li>
        </ul>
    </div>
    <h2 id="">Discription</h2>
    <p> <?php echo $discription ?></p>                   


    <h2 id="">Input</h2>
    <p> <?php echo $input ?></p>                   


    <h2 id="">Output</h2>
    <p> <?php echo $output ?></p>                   



    <h2 id="">Sample Input</h2>
    <p> <?php echo $inputCase ?></p>                   


    <h2 id="">Sample Output</h2>
    <p> <?php echo $outputCase ?></p>                   


    <br>
    <br>
    <a href="<?php if(isset($_SESSION['username'])) echo "#submitModal"; else echo "#loginModal"; ?>" class="button" data-toggle="modal" role="button">Submit</a>

    <br>
    <br>
    <br>
    <br>

    <hr>
    <blockquote id="company">
        <p id="团队"><strong>苏州大学微软学生俱乐部 SUMSC</strong></p>
    </blockquote>
    <hr>

    <!-- guide links -->
    <!--                <div class="guide-links">
        <span>← <a href="installation.html">安装</a></span>
        <span style="float:right"><a href="instance.html">Vue 实例</a> →</span>
        </div>
    -->


</div>
</div>


<!-- Big Modal -->
<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_submit">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <!-- header  -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_submit">Submit code for Pro : <?php echo $pname ?></h4>
            </div>
            <!-- Body -->
            <div class="modal-body login">
                <div class="login-form ">
                    <form role="form" action="<?php echo APP_URL."/problem/submit"?>" method="post" enctype="multipart/form-data">
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
                                <input type="file" class="login-field" value="" placeholder="" name="file" />
                                <input type="hidden" class="login-field" placeholder="" name="pid" value="<?php echo $pid ?>" />
                                <input type="hidden" class="login-field" placeholder="" name="username" value="<?php echo $_SESSION['username'] ?>" />
                                <?php if(isset($cid)){ ?>
                                    <input type="hidden" class="login-field" placeholder="" name="cid" value="<?php echo $cid ?>" /> 
                                <?php } ?> 
                            </div>
                        </div>
                        <div class="form-group login-pos">
                            <button type="submit" class="btn btn-primary-alt btn-block">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
