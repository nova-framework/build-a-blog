
</div>

<!-- JS -->
<?php
	helpers\assets::js(array(
		helpers\url::admin_template_path() . 'js/jquery.js',
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js',
	))
?>
<?php echo $data['js'];?>
</body>
</html>