<ul class="breadcrumb">
	<li><a href='<?php echo DIR;?>admin'>Admin</a> <span class="divider">></span></li>
	<li><a href='<?php echo DIR;?>admin/posts'>Posts</a> <span class="divider">></span></li>
	<li>Edit Post</li>
</ul>	


<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>

<p>Title<br><input type='text' name='postTitle' value='<?php echo $data['row'][0]->postTitle;?>'></p>
<p>Description<br><textarea name='postDesc' rows='10' class='col-md-12'><?php echo stripslashes($data['row'][0]->postDesc);?></textarea></p>
<p>Content<br><textarea name='postCont' rows='10' class='col-md-12'><?php echo stripslashes($data['row'][0]->postCont);?></textarea></p>
<p>Image<br><input type='file' name='image' value=''></p>

<p>Category<br>
	<select name='catID'>
		<option>Select</option>
		<?php if($data['cats']){
			foreach($data['cats'] as $crow){
				if($data['row'][0]->catID == $crow->catID){
					$sel = "selected='selected'";
				} else {
					$sel = null;
				}
				echo "<option value='$crow->catID' $sel>$crow->catTitle</option>";
			}
		}
		?>
	</select>
</p>

<p><input type='submit' name='submit' value='Submit'></p>
</form>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
