<?php  if (count($success) > 0) : ?>
	<div class="error">
		<?php foreach ($success as $x) : ?>
			<p><?php echo $x ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>