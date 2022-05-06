<?php
    include_once('config/config.php');
    $geturl = explode("/", str_replace(strrchr($_SERVER["REQUEST_URI"], "?"), "", $_SERVER["REQUEST_URI"]));
    array_shift($geturl);
    $tipo = $geturl[1];
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('./components/head.php'); ?>

<body>

    <?php include_once('./components/header.php'); ?>

    <?php include_once('./components/navbar.php'); ?>
    <?php
    if ($tipo == '') {
        include_once("./views/home.php");
    } else if (file_exists("./views/$tipo.php")) {
        include_once("./views/$tipo.php");
    } else {
        include_once("./views/404.php");
    }
    ?>

    <?php include_once('./components/footer.php'); ?>

    <?php include_once('./components/toTopBtn.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script>
        feather.replace()
    </script>
    <script src="<?= HOSTNAME ?>assets/js/index.js"></script>

</body>

</html>