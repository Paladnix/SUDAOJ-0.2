
<!-- Left Side -->
<div class="list">



    <ul class="menu-root">
        <li><h3></h3></li>
        <li><h4></h4></li>
        <li><a href="#title" class="sidebar-link current"></a></li>
        <li><a href="#团队" class="sidebar-link "></a></li>
    </ul>
</div>
</div>


<!-- Right Side -->
<div class="content guide with-sidebar index-guide">
    <p class="lead text-muted">比赛列表</p>
    <table >
        <thead>
            <tr>
                <th>#</th>
                <th>Contest</th>
                <th>Start</th>
                <th>End</th>
                <th>Password</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vars['row'] as $c) { ?>
            <tr>
                <td><?php echo $c['cid'] ?></td>
                <td><a href="<?php echo APP_URL ?>/contest/show/cid=<?php echo $c['cid']?>" ><?php echo $c['cname'] ?> </a></td>
                <td><?php echo $c['timeStart'] ?></td>
                <td><?php  echo $c['timeEnd'] ?></td>
                <td><?php if(isset($c['password']) && $c['password']!="") echo "Password"; else echo "Public" ?></td>
                <td><?php if(strtotime($c['timeStart']) > strtotime(date("y-m-d H:i:s"))) echo "Pending"; 
                    else if(strtotime($c['timeEnd']) > strtotime(date("y-m-d H:i:s")) ) echo "Running"; else echo "Ending"; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

