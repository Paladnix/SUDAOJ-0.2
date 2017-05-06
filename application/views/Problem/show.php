
<!-- Left Side -->
<div class="list">

    <br>
    <br>

    <ul class="menu-root">
        <li><h3><?php echo $vars['pid'].". ". $vars['pname'] ?></h3></li>
        <li>All Accepted: <?php echo $vars['accepted']?></li>
        <li>All Submited: <?php echo $vars['submited']?></li>
        <li>Pass Ratio: <?php echo $vars['ratio']?></li>
        <!--        <li><a href="#" class="sidebar-link ">somethings_2</a></li>
            <li><a href="#" class="sidebar-link current">something_1</a></li>
        -->
    </ul>
    <br>
    <br>
    <!-- Tags about this problem -->
    <div style="margin: 5px 70px 5px -10px; width=80%;">
        <?php $Tags = explode("#", $vars['tag']);
         $colors = array("btn-primary","btn-danger", "btn-success","btn-info", "btn-warning");
         foreach($Tags as $tags) {
         ?>
         <button class="btn btn-radius <?php echo $colors[rand(0,4)] ?> btn-list"><?php echo $tags?></button>
         <?php }?>
    </div>
</div>
</div>

