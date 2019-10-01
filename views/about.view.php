<?php 
$title = 'About Us';
include 'layout/header.view.php';
// $talents_link = $logged_user->isTalented() ? '/organizations' : '/talented'
?>

<style>
	.about-container {
		margin: 50px;
		background-color: #f5deb3b5;
	}

	.about-img {
		width: 100%;
	}
</style>

<link rel="stylesheet" href="/public/css/min-card.css" />

<div class="about-container">
	<div class="row">
		<div class="col-md-6">
			<img class="about-img" src="/public/img/show.jpg" alt="" width="500" height="500">
		</div>
		<div class="col-md-6">
			<h2>Show Your Talent</h2>
			<p>
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			</p>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-6">
			<h2>Looking for Talents</h2>
			<p>
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			</p>
		</div>

		<div class="col-md-6">
			<img class="about-img" src="/public/img/looking.jpg" alt="" width="500" height="500">
		</div>
	</div>
</div>
<?php include 'layout/footer.view.php'; ?>
