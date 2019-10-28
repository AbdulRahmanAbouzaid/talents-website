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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col"># Liked posts</th>
                        <th scope="col"># Comments</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($visitors as $visitor) {
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td><?= $visitor->full_name ?></td>
                            <td><?= $visitor->email ?></td>
                            <td> <?= count($visitor->getVisitorLikes())?></td>
                            <td> <?= count(Comment::where('user_id', '=', $visitor->id))?></td>
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