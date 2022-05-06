<div class="col-sm-auto bg-light sticky-top">
    <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
        <a href="<?= HOSTNAME ?>summary" class="d-block link-dark text-decoration-none m-0 p-0" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
            <span class="display-5 text-black fw-bold"><span class="display-5 text-primary fw-bold">AC</span>GA</span>
        </a>
        <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
            <li class="nav-item <?php if($tipo == 'summary'){ echo 'active';}?>">
                <a href="<?= HOSTNAME ?>summary" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                    <i stroke='black' data-feather="home"></i> <span class="d-none d-lg-block text-dark">Início</span>
                </a>
            </li>
            <li class="nav-item <?php if($tipo == 'articles'){ echo 'active';}?>">
                <a href="<?= HOSTNAME ?>articles" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                    <i stroke='black' data-feather="file-text"></i> <span class="d-none d-lg-block text-dark">Artigos</span>
                </a>
            </li>
            <li class="nav-item <?php if($tipo == 'users'){ echo 'active';}?>">
                <a href="<?= HOSTNAME ?>users" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                    <i stroke='black' data-feather="users"></i> <span class="d-none d-lg-block text-dark">Usuários</span>
                </a>
            </li>
        </ul>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                if (isset($_SESSION['imageProfile']) && $_SESSION['imageProfile'] != '') {
                    echo "<img width='15px' height='15px' src='" . $_SESSION['imageProfile'] . "' alt='Imagem do Perfil'>";
                } else {
                    echo "<i stroke='black' data-feather='user'></i>";
                }
                ?>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                <li>
                    <a class="dropdown-item" href="#">
                        <form action="" method="post">
                            <button id="logout" name="logout" value="logout" class="btn text-primary"><i stroke='pink' data-feather="log-out"></i> Sair</button>
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>