
<!-- Left Side -->
<div class="list">



    <ul class="menu-root">
        <li><h3><?php echo $cname?></h3></li>
        <li><a href="#title" class="sidebar-link current">题目：</a></li>
        <?php
                             if( isset($problems) )
                             foreach($problems as $key => $value){ ?>
                             <li><a href="<?php echo APP_URL?>/contest/showOne/<?php echo "pid=$key"?>"><?php echo $value ?></a></li>

                             <?php } ?>
                             <li><a href="#团队" class="sidebar-link ">比赛说明:</a></li>
                             <li><p> 待更改数据库</p></li>
    </ul>
</div>
</div>


<!-- Right Side -->
<div class="content guide with-sidebar index-guide">




    <h1 id="title" class="middle"><?php echo $cname ?></h1>    
    <ul>
        <li><strong>Time Start:    </strong> <?php echo $timeStart ?></li>
        <li><strong>Time End:  </strong><?php echo $timeEnd ?></li>
    </ul>
    <h2 id="">Discription</h2>
    <p> <?php echo "比赛说明" ?></p>                   

    <div class="container">
        <div class="row">
						<div class="lt-progress">
							<div class="progress">
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									<span>Default</span>
								</div>
							</div>
                </div>
            </div>
        </div>




    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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

