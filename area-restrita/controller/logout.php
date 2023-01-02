<?php
    session_start();

    unset($_SESSION["pes_id"]);
    unset($_SESSION["pes_tip_id"]);

    header('Location: /Projeto_Papelaria/index.php');
?>