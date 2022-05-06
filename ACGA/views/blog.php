<?php 
    /* FUNCTION PEGA ARTIGOS */

    try {
        $sql = $conn->prepare("SELECT * FROM `articles`");
        $sql->execute();
    } catch (PDOException $e) {
        throw new PDOException($e);
    }

    /* FUNCTION PEGA ARTIGOS END */
?>
<div class="container pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h1 class="display-5 m-0">Últimos <span class="display-5 text-primary">Artigos</span></h1>
    </div>
    <div class="row pb-3">

    <?php while ($resultArticles = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col-lg-4 mb-4">
            <div class="card border-0 mb-2">
                <img class="card-img-top" src="<?=$resultArticles['thumbnail']?>" alt="">
                <div class="card-body bg-light p-4">
                    <h4 class="card-title text-truncate"><?=$resultArticles['title']?></h4>
                    <div class="d-flex mb-3">
                        <small class="mr-2">
                            <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path class="text-success" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle class="text-success" cx="12" cy="7" r="4"></circle>
                            </svg>
                            <?=$resultArticles['author']?>
                        </small>
                        <!-- <small class="mr-2">
                            <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path class="text-success" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline class="text-success" points="14 2 14 8 20 8"></polyline>
                                <line class="text-success" x1="16" y1="13" x2="8" y2="13"></line>
                                <line class="text-success" x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline class="text-success" points="10 9 9 9 8 9"></polyline>
                            </svg>
                            Categoria
                        </small> -->
                    </div>
                    <p><?=$resultArticles['description']?></p>
                    <a class="text-primary fw-bold" href="<?=HOSTNAME?>artigo/<?=$resultArticles['id']?>/<?=$resultArticles['title']?>">Leia mais</a>
                </div>
            </div>
        </div>
    <?php } ?>

    </div>
</div>