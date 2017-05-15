

<!-- Right Side -->
<div class="content guide with-sidebar index-guide" id="rightSide">

    <h1 id="title" class="middle"><?php echo $vars['pname'] ?></h1>    
    <div class="list">
        <ul class="menu-root">
            <li><strong>Time:    </strong> <?php echo $vars['timeLimit'] ?> ms</li>
            <li><strong>Memory:  </strong><?php echo $vars['memoryLimit'] ?>MB </li>
        </ul>
    </div>
    <h2 id="">Discription</h2>
    <p> <?php echo $vars['discription'] ?></p> 


    <h2 id="">Input</h2>
    <p> <?php echo $vars['input'] ?></p>                   


    <h2 id="">Output</h2>
    <p> <?php echo $vars['output'] ?></p>                   



    <h2 id="">Sample Input</h2>
    <p> <?php echo $vars['inputCase'] ?></p>                   


    <h2 id="">Sample Output</h2>
    <p> <?php echo $vars['outputCase'] ?></p>                   


    <br>
    <br>
    <a href="<?php if(isset($_SESSION['username'])) echo "#submitModal"; else echo "#loginModal"; ?>" class="btn btn-primary-alt " data-toggle="modal" role="button">Submit</a>
 

</div>

