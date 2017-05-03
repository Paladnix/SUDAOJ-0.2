

<!-- Left Side -->
<div class="list">



    <ul class="menu-root">
        <li><h3></h3></li>
        <li><h4></h4></li>
        <li><a href="#title" class="sidebar-link current">首页</a></li>
        <li><a href="#团队" class="sidebar-link ">制作团队</a></li>
    </ul>
</div>
</div>


<!-- Right Side -->
<div class="content guide with-sidebar index-guide">

        <h1>题目列表</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="lt-tables">
                    <p class="lead text-muted"></p>
                    <div class="lt-box">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width:10%;">#</th>
                                        <th style="width:30%;">Problem Name</th>
                                        <th style="width:40%">Tags</th>
                                        <th style="width:10%;">Ratio</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($row as $p) { ?>
                                    <tr>
                                        <td><?php echo $p['pid'] ?></td>
                                        <td><a href="<?php echo APP_URL ?>/problem/show/pid=<?php echo $p['pid']?>" ><?php echo $p['pname'] ?> </a></td>
                                        <td><?php echo $p['tag'] ?></td>
                                        <td><?php echo $p['ratio'] ?></td>
                                        <td class="actions-hover actions-fade">
                                            <a href=""><i class="fa fa-pencil"></i></a>
                                            <a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
