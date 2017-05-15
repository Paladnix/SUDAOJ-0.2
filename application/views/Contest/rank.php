
<!-- Right Side -->
<div class="content guide with-sidebar index-guide">
    <p class="lead text-muted">Rank</p>
    <table >
        <thead>
            <tr>
                <th>Rank</th>
                <th>User</th>
                <th>Cost</th>
<?php
                $Alp = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I','J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'Y', 'V', 'W', 'X', 'Y', 'Z');
                $cnt = 0;
                foreach($vars['problems'] as $pro) {
                    echo "<th>".$Alp[$cnt]."</th>";
                    $cnt++;
                }?>
            </tr>
        </thead>
        <tbody>
<?php 
                $rankCnt = 1;
                foreach($vars['Sum'] as $key => $user) { ?>
            <tr>
                <td><?php echo $rankCnt++ ?></td>
                <td><?php echo $key ?></td>
                <td><?php echo $user['cost'] ?></td>
                <?php foreach($vars['problems'] as $pid => $pname){ 
                            if(isset($user[$pid])){
                                if($user[$pid]['status'] == 'YES'){
                                    if($vars['FirstBlood'][$pid] == $key)
                                        echo "<td class='firstBlood' >".$user[$pid]['submitTime']."/".$user[$pid]['submitCount']."</td>";
                                    else 
                                        echo "<td class='yes' >".$user[$pid]['submitTime']."/".$user[$pid]['submitCount']."</td>";

                                }
                                else 
                                    echo "<td class='no' >".$user[$pid]['submitTime']."/".$user[$pid]['submitCount']."</td>";
                            }
                            else{
                                echo "<td>0</td>";
                            }          
                    } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>


