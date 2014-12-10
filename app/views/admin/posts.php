<h1>Posts</h1>

<ul class="breadcrumb">
	<li><a href='<?php echo DIR;?>admin'>Admin</a> <span class="divider">></span></li>
	<li>Manage Posts</li>
</ul>	

<?php echo \helpers\session::pull('message');?>

<p><a href='<?php echo DIR;?>admin/posts/add' class='btn btn-info'>Add Post</a></p>

<table class='table table-striped table-hover table-bordered responsive'>
<tr>
	<th>Title</th>
	<th>Category</th>
	<th>Date</th>
	<th>Action</th>
</tr>
<?php
if($data['posts']){
	foreach($data['posts'] as $row){
		echo "<tr>";
		echo "<td>$row->postTitle</td>";
		echo "<td>$row->catTitle</td>";
		echo "<td>".date('jS M Y H:i:s', strtotime($row->postDate))."</td>";
		echo "<td>
		<a href='".DIR."admin/posts/edit/$row->postID'>Edit</a>
		<a href=\"javascript:delpost('$row->postID','$row->postTitle');\">Delete</a>
		</td>";
		echo "</tr>";
	}
}
?>
</table>