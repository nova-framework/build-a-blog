<ul class="breadcrumb">
	<li><a href='<?php echo DIR;?>admin'>Admin</a> <span class="divider">></span></li>
	<li><a href='<?php echo DIR;?>admin/cats'>Categories</a> <span class="divider">></span></li>
	<li>Edit Category</li>
</ul>		


<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>

<p>Title<br><input type='text' name='catTitle' value='<?php echo $data['row'][0]->catTitle;?>'></p>
<p><input type='submit' name='submit' value='Submit'></p>
</form>
