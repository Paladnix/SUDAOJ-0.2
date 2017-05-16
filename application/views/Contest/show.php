




<!-- Right Side -->
<div class="content guide with-sidebar index-guide" id="rightSide">


    <h2 id="title" class="middle"><?php echo $vars['cname'] ?></h2>    
    <div class="time">
        <span id="timeStart" class="left"> <?php echo $vars['timeStart'] ?></span>
        <span id="timeEnd" class="right"><?php echo $vars['timeEnd'] ?></span>
    </div>
    <div class="progress">
        <div id="progress" class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
        </div>
    </div>


    <h3> 题目列表: </h3>

    <table >
        <thead>
            <tr>
                <?php if(isset($_SESSION['username']) && $vars['author'] == $_SESSION['username']) { ?>
                    <th style="width:3%;"></th>
                <?php } ?>
                <th style="width:1%;">Statistic</th>
                <th style="width:1%;">Status</th>
                <?php if(strtotime(date("y-m-d H:i:s")) > strtotime($vars['timeEnd'])) echo "<th style='width:5%;'>PID</th>"; ?>
                <th style="width:1%;">#</th>
                <th style="width:40%;">Problem</th>
            </tr>
        </thead>
        <tbody>
            <?php 
        if(isset($vars['problems'])){ 
                $Alp = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I','J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'Y', 'V', 'W', 'X', 'Y', 'Z');
                $cnt = 0;
            foreach($vars['problems'] as $key => $value){ ?>

            <tr id="<?php echo $key?>">
                <?php if(isset($_SESSION['username']) && $vars['author'] == $_SESSION['username']) { ?>
                    <td class="xx" ><label  class="btn btn-danger-alt"><i class="fa fa-times"></i></label></td>
                <?php } ?>
                <td><?php echo $value['accepted']."/".$value['submited']; ?></td>
                <td><?php if($value['status'] == "accepted") echo "<i class='fa fa-check' style='color:green;'></i>"; else if($value['status']=="submited") echo "<i class='fa fa-close' style='color:red;'></i>" ?></td>
                <?php if(strtotime(date("y-m-d H:i:s")) > strtotime($vars['timeEnd'])) {  ?>
                <td ><a href="<?php  echo APP_URL ?>/contest/showProblem/<?php echo "pid=$key"; ?>" ><?php echo "Pro.".$key; ?></a> </td>
                <?php } ?>
                <td ><?php echo $Alp[$cnt++]; ?>. </td>
                <td ><a href="<?php  echo APP_URL ?>/contest/showProblem/<?php echo "pid=$key/cid=".$vars['cid']; ?>" ><?php echo $value['pname']; ?></a> </td>
            </tr>
            <?php }} ?>

        </tbody>
    </table>

    <?php if(isset($_SESSION['username']) && $vars['author'] == $_SESSION['username']) { ?>
            <span style="margin:0px 2%;"><a href="#createProModal" data-toggle="modal" data-target="#createProModal" id="plus" role="button" class="btn btn-primary-alt" ><i class="fa fa-plus"></i></a></span>
    <?php } ?>
   
    <h3 id="">Discription</h3>
    <p> <?php echo $vars['introduction']; ?></p>                   

</div>








<script>
$(function(){
    $(".xx").click(function(e){
        var id = $(e.target).parent().attr('id');
        $(e.target).parent().remove();
        $(".list a[id="+id+"]").remove();

        $.ajax({
            url:"<?php echo APP_URL ?>/contest/rmProblem/cid=<?php echo $vars['cid'];?>/pid="+id ,
            type: "POST",
            contentType:false,
            processData:false,
            success: function(data){
                alert(data);
            },
            error:function(e){
                alert(e);
            }
        });
    });
});

</script>
