
<ul class="breadcrumb">
	<li><a href='<?php echo DIR;?>admin'>Admin</a> <span class="divider">></span></li>
	<li><a href='<?php echo DIR;?>admin/cats'>Categories</a> <span class="divider">></span></li>
	<li>Add Category</li>
</ul>	


<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>
<p>Title<br><input type='text' name='catTitle' value='<?php if(isset($error)){ echo $_POST['catTitle'];}?>'></p>
<p><input type='submit' name='submit' value='Submit'></p>
</form>