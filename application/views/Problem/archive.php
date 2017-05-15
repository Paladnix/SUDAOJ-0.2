

<!-- Left Side -->
<div class="list">


    <ul class="menu-root">
        <li><h3></h3></li>
        <li><h4></h4></li>
    </ul>
</div>
</div>


<!-- Right Side -->
<div class="content guide with-sidebar index-guide" id="rightSide">

        <h1>题目列表</h1>

                            <table>
                                <thead>
                                    <tr>
                                        <th style="width:1%;">#</th>
                                        <th style="width:30%;">Problem Name</th>
                                        <th style="width:40%">Tags</th>
                                        <th style="width:10%;">Ratio</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($vars['row'] as $p) { ?>
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
