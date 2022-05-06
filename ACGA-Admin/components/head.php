<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ACGA, ONG, Confraria dos Gatinhos, Adoção, Animais sem lar" name="keywords">
    <meta content="ACGA - Confraria dos gatinhos, uma ONG que pega animais sem lar, cuida e lhe da um novo lar" name="description">
    
    <!-- Favicon -->
    <link href="assets/images/acga.ico" rel="icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FeatherIcons-->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- Main CSS -->
    <link href="assets/css/index.css" rel="stylesheet">

    <title>
        <?php 
            if ($tipo != '') {
                echo 'ACGA - Confraria dos Gatinhos &ndash; ' . ucwords(str_replace('-', ' ', $tipo));
            } else {
                echo "ACGA - Confraria dos Gatinhos";
            }
        ?>
    </title>
</head>