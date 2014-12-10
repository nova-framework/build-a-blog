<ul class="breadcrumb">
	<li><a href='<?php echo DIR;?>admin'>Admin</a> <span class="divider">></span></li>
	<li>Manage Users</li>
</ul>	

<h1>Users</h1>

<?php echo \helpers\session::pull('message');?>

<p><a href='<?php echo DIR;?>admin/users/add' class='btn btn-info'>Add User</a></p>

<table class='table table-striped table-hover table-bordered responsive'>
<tr>
	<th>Username</th>
	<th>Email</th>
	<th>Action</th>
</tr>
<?php
if($data['users']){
	foreach($data['users'] as $row){
		echo "<tr>";
		echo "<td>$row->username</td>";
		echo "<td>$row->email</td>";
		echo "<td><a href='".DIR."admin/users/edit/$row->memberID'>Edit</a></td>";
		echo "</tr>";
	}
}
?>
</table>