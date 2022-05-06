<?php 
        /* FUNCTION PEGA ARTIGO POR ID */

        try {
            $sql = $conn->prepare("SELECT * FROM `articles` WHERE `id`='$geturl[2]'");
            $sql->execute();
            $resultArticleById = $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    
        /* FUNCTION PEGA ARTIGO POR ID END */

        /* FUNCTION PEGA ARTIGOS */

        try {
            $sql = $conn->prepare("SELECT * FROM `articles` WHERE `id`!='$geturl[2]' LIMIT 5");
            $sql->execute();
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    
        /* FUNCTION PEGA ARTIGOS END */
?>
<div class="container py-5">
    <div class="row pt-5">
        <div class="col-lg-8">
            <div class="d-flex flex-column text-left mb-4">
                <h1 class="mb-3"><?=$resultArticleById['title']?></h1>
                <div class="d-index-flex mb-2">
                    <span class="mr-3">
                        <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <path class="text-success" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle class="text-success" cx="12" cy="7" r="4"></circle>
                        </svg>
                        <?=$resultArticleById['author']?></span>
                    <!-- <span class="mr-3">
                        <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <path class="text-success" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline class="text-success" points="14 2 14 8 20 8"></polyline>
                            <line class="text-success" x1="16" y1="13" x2="8" y2="13"></line>
                            <line class="text-success" x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline class="text-success" points="10 9 9 9 8 9"></polyline>
                        </svg>
                        Categoria</span> -->
                </div>
            </div>

            <div class="mb-5">
                <img class="img-fluid w-100 mb-4" src="<?=$resultArticleById['thumbnail']?>" alt="Image">
                <p><?=$resultArticleById['message']?></p>
            </div>

        </div>

        <div class="col-lg-4 mt-5 mt-lg-0">
            <div class="mb-5">
                <h3 class="mb-4">Últimos Artigos</h3>
                <?php while ($resultArticles = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                    <a class="text-dark mb-2 text-decoration-none" href="<?=HOSTNAME?>artigo/<?=$resultArticles['id']?>/<?=$resultArticles['title']?>">
                        <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                            <img class="img-fluid" src="<?=$resultArticles['thumbnail']?>" style="width: 80px; height: 80px;" alt="">
                            <div class="d-flex flex-column pl-3">
                                <span class="text-dark mb-2 text-decoration-none">&nbsp;<?=$resultArticles['title']?></span>
                                <div class="d-flex">
                                    <small class="mr-3">
                                        <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <path class="text-success" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle class="text-success" cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        &nbsp;<?=$resultArticles['author']?>
                                    </small>
                                    <!-- <small class="mr-3">
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
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>