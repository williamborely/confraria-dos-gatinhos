<?php

/* FUNCTION LOGIN */

if (isset($_POST['entrar']) && $_POST['entrar'] == 'Entrar') {
    if($_POST['login'] != '' && $_POST['password'] != ''){
        try {
            $sql = $conn->prepare("SELECT * FROM `users` WHERE `email`= :email and `isActive`='Active'");
            $sql->bindValue(":email", $_POST['login']);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            if($result > 0){
                if (password_verify($_POST['password'], $result['password'])) {
                    $_SESSION['firstName'] = $result['firstName'];
                    $_SESSION['lastName'] = $result['lastName'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['role'] = $result['role'];
                    $_SESSION['imagePerfil'] = $result['imagePerfil'];
                    header("location: ".HOSTNAME."summary");
                } else {
                    echo 'Senha Inválida!';
                }
            }else {
                echo "Usuário não encontrado ou desativado!";
            }
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }else {
        echo "Preenche E-mail e Senha!";
    }
}

/* FUNCTION LOGIN END */

/* FUNCTION LOGOUT */
if (isset($_POST['logout']) && $_POST['logout'] == 'logout') {
    session_destroy();
    header("location: ".HOSTNAME);
}
/* FUNCTION LOGOUT END */

/* FUNCTION CADASTRAR ARTIGO */

if (isset($_POST['artigo']) && $_POST['artigo'] == 'Cadastrar') {
    $dataAtual = date("d/m/Y");
    try {
        $sql = $conn->query("INSERT INTO `articles`(`id`, `title`, `thumbnail`, `message`, `addedAtDate`, `lastUpdateDate`, `author`, `description`) 
                               VALUES (NULL,'$_POST[title]','$_POST[thumbnail]','$_POST[message]','$dataAtual','$dataAtual','$_SESSION[firstName] $_SESSION[lastName]','$_POST[description]')");
        if($sql){
            header("location:".HOSTNAME."articles");
        }
    } catch (PDOException $e) {
        throw new PDOException($e);
    }
}

/* FUNCTION CADASTRAR ARTIGO END */

/* FUNCTION EDITAR ARTIGO */

if (isset($_POST['artigo']) && $_POST['artigo'] == 'Editar') {
    $dataAtualizada = date("d/m/Y");
    try {
        $sql = $conn->query("UPDATE `articles` SET `title`='$_POST[title]',`thumbnail`='$_POST[thumbnail]',`message`='$_POST[message]',`lastUpdateDate`='$dataAtualizada',`author`='$_SESSION[firstName] $_SESSION[lastName]',`description`='$_POST[description]' WHERE `id`='$_POST[id]'");
        if($sql){
            header("location:".HOSTNAME."articles");
        }
    } catch (PDOException $e) {
        throw new PDOException($e);
    }
}

/* FUNCTION EDITAR ARTIGO END */

/* FUNCTION DELETAR ARTIGO */

if (isset($_POST['artigo']) && $_POST['artigo'] == 'Deletar') {
    $dataAtualizada = date("d/m/Y");
    try {
        $sql = $conn->query("DELETE FROM `articles` WHERE `id`='$_POST[id]'");
        if($sql){
            header("location:".HOSTNAME."articles");
        }
    } catch (PDOException $e) {
        throw new PDOException($e);
    }
}

/* FUNCTION DELETAR ARTIGO END */