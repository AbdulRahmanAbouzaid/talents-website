<!DOCTYPE html>
<html>
<head>
	<title> Practitoner </title>
</head>
<body>
	<ul>
		<li> <a href="/about"> About Page</a> </li>
		<li> <a href="/contact"> Contact Page</a> </li>
	</ul>
	<ul>
		
		<?php foreach($tasks as $task) : ?>

			<li> 

				<?php if($task->completed) : ?>
					
					<strike> <?= $task->description ?> </strike>

				<?php else : ?>

					<?= $task->description ?>

				<?php endif; ?>
	
			</li>

		<?php endforeach; ?>

	</ul>

</body>
</html>