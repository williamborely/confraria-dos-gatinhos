<?php
include_once('config/config.php');
$geturl = explode("/", str_replace(strrchr($_SERVER["REQUEST_URI"], "?"), "", $_SERVER["REQUEST_URI"]));
array_shift($geturl);
$tipo = $geturl[1];

include_once('config/actions.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('./components/head.php'); ?>

<body>

    <?php
    if ($tipo == '') {
        include_once("./views/home.php");
    } else if (file_exists("./views/$tipo.php")) {
    ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once('./components/sidebar.php'); ?>
                <div class="col-sm p-3 min-vh-100">
                    <?php include_once("./views/$tipo.php");?>
                </div>
            </div>
        </div>
    <?php
    } else {
        include_once("./views/404.php");
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="./assets/js/index.js"></script>
    <script>
        feather.replace()
    </script>


</body>

</html>