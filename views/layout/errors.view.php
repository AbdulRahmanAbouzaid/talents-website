<?php 
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $error) {
?>
        <p style="color:red"><?= $error ?></p>
<?php 
    }
    unset($_SESSION['errors']);
}
?> 