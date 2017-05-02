<form action="<?php echo APP_URL ?>/test/add" method="post">

<input type='text' value='点击添加' onclick="this.value=''" name = 'value'>
<input type='submit' value='添加'>

</form>


<br/><br/>

<?php
  $number = 0;
    foreach($tests as $test){ ?>
    <a href="<?php echo APP_URL.'test/view/'.$test['id']; ?>" title='点击修改'>
        <span>
        <?php echo ++$number. "-> " . $test['name']."<br>" ?>
        </span>
    </a>

<?php } ?>
