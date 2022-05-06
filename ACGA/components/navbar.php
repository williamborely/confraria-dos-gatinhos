<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 sticky-top">
        <div class="container">
            <a class="navbar-brand d-block d-lg-none" href="#">
                <h1 class="m-0 display-5 text-capitalize"><span class="display-5 text-primary">AC</span><span class="display-5 text-light">GA</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item <?php if($tipo == ''){ echo 'active';}?>" id="home">
                        <a href="<?= HOSTNAME ?>" class="nav-link text-center">Início</a>
                    </li>
                    <li class="nav-item <?php if($tipo == 'blog'){ echo 'active';}?>" id="blog">
                        <a href="<?= HOSTNAME ?>blog" class="nav-link text-center">Blog</a>
                    </li>
                    <li class="nav-item <?php if($tipo == 'contato'){ echo 'active';}?>" id="contato">
                        <a href="<?= HOSTNAME ?>contato" class="nav-link text-center">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>