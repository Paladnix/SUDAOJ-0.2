


<!-- Right Side -->
<div class="content guide with-sidebar index-guide" id="rightSide">

    <h2>判题状态</h2>

    <div id="pros" class="form form-horizontal">

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
                                            <th style="width:10%;">User</th>
                                            <th style="width:5%;">Pro.</th>
                                            <th style="width:5%;">Language</th>
                                            <th style="width:15%;">Time</th>
                                            <th style="width:20%;">Result</th>
                                            <th style="width:20%;">RunTime</th>
                                            <th style="width:20%;">RunMemory</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





</div>


