

<!-- Left Side -->
<div class="list">


        <h4><?php echo $vars['cname']?></h4>
        <?php if( isset($_SESSION['username']) &&  $_SESSION['username'] == $vars['author'] ) { ?>
        <div class="time"><a  href="#createConModal" class="btn btn-primary-alt" data-toggle="modal" data-target="#createConModal" role="button" >更新比赛</a></div>
        <?php } ?>
        <div class="block">
            <a  href="<?php echo APP_URL?>/contest/showRank/cid=<?php echo $vars['cid']; ?>" class="btn btn-primary-alt">Rank</a>
            <a  href="<?php echo APP_URL?>/contest/showStatus/cid=<?php echo $vars['cid'];?>" class="btn btn-primary-alt">Status</a>
        </div>

        <h3><a href="<?php echo APP_URL?>/contest/show/cid=<?php echo $vars['cid'];?>" class="sidebar-link" >Problems</a></h3>
        <div class="block">
        <?php
if( isset($vars['problems']) ){
    if(strtotime(date("y-m-d H:i:s")) < strtotime($vars['timeStart']))
    {
        echo "Waiting";
    }
    else{

                $Alp = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I','J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'Y', 'V', 'W', 'X', 'Y', 'Z');
                $cnt = 0;
                             foreach($vars['problems'] as $key => $value){ ?>
                             <a  id="<?php echo $key?>" class="btn btn-primary-alt " href="<?php echo APP_URL ?>/contest/showProblem/<?php echo "pid=$key/cid=".$vars['cid']; ?>" ><?php echo $Alp[$cnt++]; ?></a>
                                
                             <?php if($cnt%3 == 0) echo "<br><br>"; } } }?>
        </div>
</div>
</div>

