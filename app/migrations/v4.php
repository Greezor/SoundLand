<?php

\app\App::$app->db->pdo->exec("
    alter table user add avatar longtext null
");
