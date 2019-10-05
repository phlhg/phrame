<?php

    session_start();

    require_once($_SERVER["DOCUMENT_ROOT"]."/phrame/require.php");

    $_APP = new App();

    $_APP->run();

    $_APP->render();


?>