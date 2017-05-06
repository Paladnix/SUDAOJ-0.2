

<!-- Left Side -->
<div class="list">


    <ul class="menu-root">
        <li><h2><?php echo $vars['cname']?></h2></li>
        <?php if( isset($_SESSION['username']) && $_SESSION['username'] == $vars['author'] ) { ?>
        <a  href="#createConModal" class="btn btn-primary-alt" data-toggle="modal" data-target="#createConModal" role="button" >更新比赛</a>
        <?php } ?>
        <li><h3><a  href="<?php echo APP_URL?>/contest/showRank/cid=<?php echo $vars['cid']; ?>" class="btn btn-primary-alt" role="button" >Rank</a></h3></li>
        <li><h3><a  href="<?php echo APP_URL?>/contest/showStatus/cid=<?php echo $vars['cid'];?>" class="btn btn-primary-alt" role="button" >Status</a></h3></li>
        <li><h3><a href="#title" class="sidebar-link ">Problems：</a></h3></li>
        <?php
                             if( isset($vars['problems']) )
                             foreach($vars['problems'] as $key => $value){ ?>
                             <li id="<?php echo $key."List"; ?>"><a  class="sidebar-link <?php if($var['pid'] == $key) echo "current"; ?>" href="<?php echo APP_URL ?>/contest/showProblem/<?php echo "pid=$key/cid=".$vars['cid']; ?>" ><?php echo $value ?></a></li>

                             <?php } ?>
                             <li><a href="#团队" class="sidebar-link ">比赛说明:</a></li>
                             <li><p> 待更改数据库</p></li>
    </ul>
</div>
</div>

