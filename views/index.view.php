<?php 
$title = 'Home';
include 'layout/header.view.php';
// $talents_link = $logged_user->isTalented() ? '/organizations' : '/talented'
?>

<link rel="stylesheet" href="/public/css/min-card.css" />
<div class="main-body">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="
		margin: 50px;
		height: 250px;
		background-color: #b5a0a0db;
	">
	<ol class="carousel-indicators">
		<?php for($i = 0; $i < count($events); $i++) {?>
			<li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>" class="<?= $i == 0 ? 'active' : ''?>"></li>
		<?php }?>
	</ol>
	<div class="carousel-inner">
		<?php foreach($events as $key => $event){ ?>
			<div class="carousel-item <?= $key == 0 ? 'active' : ''?>">
				<center> 
					<h1 class="d-block w-100" style="padding-top:50px"> <b>Latest Events</b></h1> 
					<div class="" style="padding-top:30px">
						<h3><?=$event->title?></h3>
						<?php $organization = $event->getOrganization();?>
						<h5>BY: <a href="/profile?id=<?=$organization->id?>"><?=$organization->full_name?> </a></h5>
					</div>
				</center>
			</div>
		<?php } ?>
	</div>
	<a class="carousel-control-prev bg-beige" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next bg-beige" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	</div>

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
</div>

<?php include 'layout/footer.view.php'; ?>
