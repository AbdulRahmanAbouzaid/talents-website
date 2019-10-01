<?php 
$title = 'Home';
include 'layout/header.view.php';
?>
<link rel="stylesheet" href="/public/css/min-card.css" />

<div class="cards-list">
	<?php foreach($talented_users as $talented) : ?>
		<a href="profile?id=<?=$talented->user_id?>">
			<div class="card 1">
				<div class="card_image"> <img src="/public/img/profile.jpeg" /> </div>
				<div class="card_title title-white">
					<p><?=$talented->user()->full_name?></p>
				</div>
			</div>
		</a>
	<?php endforeach; ?>

</div>

<?php include 'layout/footer.view.php'; ?>
