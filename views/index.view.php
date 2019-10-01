<?php 
$title = 'Home';
include 'layout/header.view.php';
// $talents_link = $logged_user->isTalented() ? '/organizations' : '/talented'
?>

<link rel="stylesheet" href="/public/css/min-card.css" />


<div class="cards-list">
	<?php foreach($talents as $talent) : ?>
		<a href="talented?id=<?=$talent->id?>">
			<div class="card 1">
				<div class="card_image"> <img src="/public/uploads/talents/<?=$talent->icon?>" /> </div>
				<div class="card_title title-white">
					<p><?=$talent->name?></p>
				</div>
			</div>
		</a>
	<?php endforeach; ?>

</div>

<?php include 'layout/footer.view.php'; ?>
