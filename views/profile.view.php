<?php 
    $title = "Profile";
    include 'layout/header.view.php'; 
?>

<h1>Hello <?= $user->full_name?></h1>

<form action="/add-material" method="post" enctype="multipart/form-data">
    <textarea name="description" id="desc" cols="30" rows="10"></textarea>
    <input type="file" name="file">
    <input type="submit" value="Post">
</form>

<?php include 'layout/footer.view.php'; ?>