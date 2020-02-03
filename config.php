<?php

    //Hämtar alla klassfiler som används
    spl_autoload_register(function ($class) {
    include $class . '.class.php'; //Klassen i filen måste heta samma som filnamnet
    });

    //Databasanslutning live
    define("DBhost", "localhost");
    define("DBadmin", "mimmimi_cv");
    define("DBpassword", "cv1234%&/(");
    define("DBdatabase", "mimmimi_cv");

    ?>