<?php
if (!$_SESSION['email'] && !$_SESSION['isActive']) {
    session_destroy();
    header("location: " . HOSTNAME);
}

/* FUNCTION PEGA ARTIGOS */

try {
    $sql = $conn->prepare("SELECT * FROM `articles`");
    $sql->execute();
} catch (PDOException $e) {
    throw new PDOException($e);
}

/* FUNCTION PEGA ARTIGOS END */

?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= HOSTNAME ?>summary">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">Artigos</li>
    </ol>
</nav>
<div class="container">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i data-feather="plus-circle" stroke-width='1.2'></i> Novo Artigo
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Artigo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input class="form-control" type="text" name="title" id="title" placeholder="Título">
                        <input class="form-control mt-1" type="text" name="thumbnail" id="thumbnail" placeholder="Link da Imagem">
                        <input class="form-control mt-1" type="text" name="description" id="description" placeholder="Descrição">
                        <textarea class="form-control mt-1" name="message" id="message" cols="30" rows="10" placeholder="Digite seu Artigo aqui"></textarea>
                        <button type="button" class="btn btn-danger mt-1" data-bs-dismiss="modal">Cancelar</button>
                        <button name="artigo" value="Cadastrar" type="submit" class="btn btn-success mt-1">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

</div>
<div class="row">
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Imagem</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Adicionado</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($resultArticles = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <th><?= "<img width='80px' height='80px' src='" . $resultArticles['thumbnail'] . "' alt='thumbnail'>"; ?></th>
                        <td><?= $resultArticles['title'] ?></td>
                        <td><?= $resultArticles['author'] ?></td>
                        <td><?= $resultArticles['lastUpdateDate'] ?></td>
                        <td>
                            <form action="" method="POST">
                                <button name="editar" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal<?= $resultArticles['id'] ?>">
                                    <i data-feather='edit'></i>
                                </button>
                            </form>
                            <form action="" method="POST">
                                <input type="hidden" name="id" id="id" value="<?= $resultArticles['id'] ?>">
                                <button class="btn" name="artigo" id="artigo" value="Deletar">
                                    <i data-feather='trash-2'></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?= $resultArticles['id'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Artigo #<?= $resultArticles['id'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <input class="form-control" type="text" name="title" id="title" placeholder="Título" value="<?= $resultArticles['title'] ?>">
                                        <input class="form-control mt-1" type="text" name="thumbnail" id="thumbnail" placeholder="Link da Imagem">
                                        <label class="ms-2" for="thumbnail"><small><b>Link da Imagem Atual:</b> <?= $resultArticles['thumbnail'] ?></small></label>
                                        <input class="form-control mt-1" type="text" name="description" id="description" placeholder="Descrição" value="<?= $resultArticles['description'] ?>">
                                        <textarea class="form-control mt-1" name="message" id="message" cols="30" rows="10" placeholder="Digite seu Artigo aqui">
                                            <?= $resultArticles['message'] ?>
                                        </textarea>
                                        <input type="hidden" name="id" id="id" value="<?= $resultArticles['id'] ?>">
                                        <button type="button" class="btn btn-danger mt-1" data-bs-dismiss="modal">Cancelar</button>
                                        <button name="artigo" value="Editar" type="submit" class="btn btn-success mt-1">Editar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal end -->
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>