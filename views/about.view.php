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
		padding: 10px;
	}

	.benefit .content {
		top: 70px;
		font-size: 24px;
		/* margin: 10px; */
		text-align: center
	}


</style>

<link rel="stylesheet" href="/public/css/min-card.css" />

<div class="about-container">
	<div class="row benefit">
		<div class="col-md-6">
			<img class="about-img" src="/public/img/show.jpg" alt="" width="500" height="500">
		</div>
		<div class="col-md-6 content">
			<h2>Show Your Talent</h2>
			<p>
			One of the best path to a successful life is to discover your talents, develop it, and then deploy it. But before you can deploy your talent and serve others with it, you have to know that talent matters, believe that you are talented, be curious to know what talents you have, be disciplined enough to develop them, and be wise enough to use it to improve the lives of others and your own life. I know it takes more than talent to be successful , but talent is still important
			</p>
		</div>
	</div>

	<hr>

	<div class="row benefit">
		<div class="col-md-6 content">
			<h2>Looking for Talents</h2>
			<p>
			support the talented people , Facilitate communication between talented people and supporting organizations, Providing assistance in the discovery of talent and show support to be known in the community, Organizations provide opportunities for people to invest and publicize their talents at the same time, An opportunity to form relationships and gain experience from other talents.
			</p>
		</div>

		<div class="col-md-6">
			<img class="about-img" src="/public/img/looking.jpg" alt="" width="500" height="500">
		</div>
	</div>
</div>
<?php include 'layout/footer.view.php'; ?>
