
<!-- Left Side -->
<div class="list">


    <ul class="menu-root">
        <li><h2><?php echo $cname?></h2></li>
        <?php if( isset($_SESSION['username']) && $_SESSION['username'] == $author ) { ?>
        <a  href="#createConModal" class="btn btn-primary-alt" data-toggle="modal" data-target="#createConModal" role="button" >更新比赛</a>
        <?php } ?>
        <li><a href="#title" class="sidebar-link current">题目：</a></li>
        <?php
                             if( isset($problems) )
                                foreach($problems as $key => $value){ ?>
                             <li><a href="<?php echo APP_URL ?>/contest/showOne/<?php echo "pid=$key" ?>"><?php echo $value ?></a></li>

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
    <p> <?php echo $introduction; ?></p>                   

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

    <div id="pros" class="form form-horizontal">
        <h3> 题目: </h3>
        <?php if(isset($_SESSION['username']) && $author == $_SESSION['username']) { ?>
        <div class="form-group">
            <div class="col-lg-2">
                <a href="#createProModal" data-toggle="modal" data-target="#createProModal" id="plus" role="button" class="col-lg-3 btn btn-primary-alt btn-block" ><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <?php } ?>
        <?php if(isset($problems)) foreach($problems as $key => $value){ ?>
        <div class="form-group" id="<?php echo $key ?>">
            <?php if(isset($_SESSION['username']) && $author == $_SESSION['username']) { ?>
            <button id="" type="button" class="col-lg-1 btn btn-primary-alt" onclick="del("<?php echo $key?>")" ><i class="fa fa-times"></i></button>
            <?php } ?>
            <label type="" placeholder="" class="col-lg-1" > <?php echo $key ?> </label>
            <label class="col-lg-4 "><?php echo $value; ?></label>
        </div>
        <?php } ?>
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
</div>

<script>
/*
$(function(){
    $("#ConProSub").click(function(){
        var form = new FormData(document.getElementById("CrtProForm"));
        $.ajax({
        url: "<?php echo APP_URL ?>/problem/create/",
            type: "POST",
            data: form,
            contentType:false,
            processData:false,
            success: function(data){
                alert(data);
                var p = data.split('/');
                $("#problem").val(function(){
                    return $("#problem").val()+"#"+p[0];
                });
                $("#Pros").append("<div class=form-group id="+p[0]+"><button  type=button class=col-lg-1 btn btn-primary-alt btn-block onclick=del("+p[0]+") ><i class=fa fa-times></i></button><div class=col-lg-2><input class=form-control value="+p[0]+" ></input></div><label class=col-lg-9 control-label>"+p[1]+"</label></div>");
            },
            error: function(e){

                alert('Failed');

                $("$result").html = "连接错误，请刷新后重试";
            }
        });

    });
});
*/
</script>
