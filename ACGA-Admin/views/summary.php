<?php
if (!$_SESSION['email'] && !$_SESSION['isActive']) {
    session_destroy();
    header("location: " . HOSTNAME);
}

/* FUNCTION PEGA ARTIGOS */

try {
    $sql = $conn->prepare("SELECT * FROM `articles`");
    $sql->execute();
    $countArticles = $sql->rowCount();
} catch (PDOException $e) {
    throw new PDOException($e);
}

/* FUNCTION PEGA ARTIGOS END */
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Início</li>
  </ol>
</nav>
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize text-dark font-weight-bold">Artigos</p>
                            <h5 class="font-weight-bolder mb-0 counter-up" data-count-to="<?=$countArticles?>"></h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon p-2 bg-primary bg-gradient shadow text-center border-radius-md rounded-3">
                            <i stroke="#fff" data-feather="file-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize text-dark font-weight-bold">Usuários</p>
                            <h5 class="font-weight-bolder mb-0 counter-up" data-count-to="100"></h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon p-2 bg-primary bg-gradient shadow text-center border-radius-md rounded-3 ">
                        <i stroke="#fff" data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>