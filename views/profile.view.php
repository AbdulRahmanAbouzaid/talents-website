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
<div>
    <?php foreach ($materials as $material) { ?>
        <div style="border:1px solid black" 
            data-material_id=<?= $material->id ?> 
            data-user_id=<?=$loggedUser?>
        >
            <?= $material->description ?>
        </div>
        <?php $label = $loggedUser->likedMaterial($material->id)?>
        <button id=<?=$class . '-btn' ?> ><?=$label?> </button>

    <?php } ?>

</div>

<?php include 'layout/footer.view.php'; ?>


<script>
    $('.like-btn').click(function(){

        var material_id = $(this).parent().data('material_id');
        var user_id = $(this).parent().data('user_id');

        $.ajax
        ({ 
            url: '/material/like?material_id='+ material_id,
            data: {"userID": user_id},
            type: 'post',
            success: function(result)
            {
                $($this).prev().text('unlike');
            }
            error: function() {
                alert('Some Error');
            }
        });
    });
</script>