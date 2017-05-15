


<!-- Right Side -->
<div class="content guide with-sidebar index-guide" id="rightSide">


    <p class="lead text-muted">判题状态</p>
    <table>
            <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Pro.</th>
                                            <th>Compiler</th>
                                            <th>Time</th>
                                            <th>Result</th>
                                            <th>RunTime</th>
                                            <th>RunMemory</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($vars['result'])) foreach($vars['result'] as $row){ ?>

                                        <tr id="<?php echo $row['rid']?>">
                                            <td><?php echo $row['username']?></td>
                                            <td><label  class="btn btn-primary-alt"><?php echo $row['pid']?></label></td>
                                            <td><?php echo $row['compiler']?></td>
                                            <td><?php echo str_replace('T', ' ', $row['submitTime']);?></td>
                                            <td><?php echo $row['status']?></td>
                                            <td><?php echo $row['rtime']?> ms</td>
                                            <td><?php echo $row['rmemory']?> KB</td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>




</div>


