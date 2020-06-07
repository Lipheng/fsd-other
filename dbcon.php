<?php

    try {
        $pdo = new PDO("pgsql:host=localhost;dbname=fsd_test", "fsd_user", "fsd");
        //echo "Database Connected!" . "<br/>";
            
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

?>