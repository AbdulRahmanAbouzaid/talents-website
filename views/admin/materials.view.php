<?php require 'header.view.php'; ?>

<div class="wrapper">
    <!-- Sidebar  -->
    <?php require 'sidebar.view.php'; ?>

    <!-- Page Content  -->
    <div id="content">

        <?php require 'topnav.view.php'?>

        
        <div class="container">
            <div class="row">
                <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                        <th scope="col"># Liked posts</th>
                        <th scope="col"># Comments</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($materials as $material) {
                        $user = $material->user();
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td><a href="/profile?id=<?=$user->id?>" target="_blank"><?= $user->full_name ?></td>
                            <td><?= $material->created_at ?></td>
                            <td> <?= $material->likes?></td>
                            <td> <?= $material->comments?></td>
                        </tr>
                    <?php $count++; } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
</div>


<?php require 'footer.view.php'; ?>