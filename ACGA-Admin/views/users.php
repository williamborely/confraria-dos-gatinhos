<?php
if (!$_SESSION['email'] && !$_SESSION['isActive']) {
    session_destroy();
    header("location: " . HOSTNAME);
}
?>
<h2>Usuários</h2>