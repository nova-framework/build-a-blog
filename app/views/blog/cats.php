

<div class='row'>
	<div class='col-md-8'>

		<?php
		if($data['posts']){
			foreach($data['posts'] as $row){

				echo "<div class='post'>\n";

				echo "<h2><a href='".DIR."$row->postSlug'>$row->postTitle</a></h2>\n";

					echo "<div class='col-md-3'>";
						echo "<p><img src='".DIR."$row->postImg' class='img-responsive'></p>";
					echo "</div>";

					echo "<div class='col-md-9'>";
						echo "<p>Posted on ".date('jS M Y H:i:s', strtotime($row->postDate))." in <a href='".DIR."category/$row->catSlug'>$row->catTitle</a></p>";
						echo "<div class='content'>".stripslashes($row->postDesc)."</div>";
						echo "<p><a href='".DIR."$row->postSlug' class='btn btn-primary btn-sm'>Read More</a></p>";
					echo "</div>"; 

					
				echo "</div>\n";
			}
		}
		?>
	
	</div>

	<div class='col-md-4'>
		<ul>
		<?php
		if($data['cats']){
			foreach($data['cats'] as $crow){
				echo "<li><a href='".DIR."category/$crow->catSlug'>$crow->catTitle</a></li>";
			}
		}
		?>
		</ul>
	</div>
</div>

<div class='clearfix'></div>
<?php echo $data['page_links']; ?>