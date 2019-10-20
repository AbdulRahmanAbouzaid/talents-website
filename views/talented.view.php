<?php 
$title = 'Home';
include 'layout/header.view.php';
?>
<link rel="stylesheet" href="/public/css/min-card.css" />

<div class="cards-list">
	<?php foreach($talented_users as $talented) : ?>
		<a href="profile?id=<?=$talented->user_id?>">
			<div class="card 1">
				<?php
					$user = $talented->user();
					$src = $user->photo ? 'data:image/png;base64,'.base64_encode($user->photo) : '/public/img/profile.png'
				?>
				<div class="card_image"> <img src="<?=$src?>" /> </div>
				<div class="card_title title-white">
					<p><?=$user->full_name?></p>
				</div>
			</div>
		</a>
	<?php endforeach; ?>

</div>

<?php include 'layout/footer.view.php'; ?>
