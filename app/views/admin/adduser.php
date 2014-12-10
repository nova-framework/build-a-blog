<ul class="breadcrumb">
	<li><a href='<?php echo DIR;?>admin'>Admin</a> <span class="divider">></span></li>
	<li><a href='<?php echo DIR;?>admin/users'>Users</a> <span class="divider">></span></li>
	<li>Add User</li>
</ul>	

<?php echo \core\error::display($error); ?>

<form action='' method='post'>

<p>Username<br><input type="text" name="username" value="<?php if(isset($error)){ echo $_POST['username']; }?>"></p>
<p>Password<br><input type="password" name="password" value=""></p>
<p>Email<br><input type="text" name="email" value="<?php if(isset($error)){ echo $_POST['email']; }?>"></p>
<p><input type="submit" name="submit" value="Add User"></p>

</form>