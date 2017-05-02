<form action="<?php echo APP_URL.'/test/update'?>" method='post'>

<input type='text' anme='value' value="<?php echo $test['name']?>" />

<input type='hidden' name='id' value="<?php echo $test['id'] ?>"  />
<input type='submit' value='修改'>
</form>

<a href="<?php echo APP_URL.'/test/index' ?>">返回 </a>
